<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Livewire\Attributes\Layout;
use Livewire\WithPagination;    

class Posts extends Component
{
    public $showModal = false;
    public $post_id = null;
    public $title = '';
    public $content = '';
    // public $filterTitle = '';
    // public $filterUsername = '';
    public $dates = [];
    public $postCounts = [];

    #[Layout('layouts.app')]
    public $active = 'dashboard';

    protected $listeners = ['navigate' => 'changePage ' ];

    
     public $filterTitle = '';
    public $filterUsername = '';

    protected $queryString = ['filterTitle', 'filterUsername']; // Optional: keep filters in URL

    public function updatingFilterTitle() { $this->resetPage(); }
    public function updatingFilterUsername() { $this->resetPage(); }



    public function resetFilters()
    {
        $this->reset(['filterTitle', 'filterUsername']);
         $this->prepareChartData();

    }

    public function changePage($page)
    { 
        $this->active = $page;
       
        $this->resetFilters();
         

    }

    public function openCreateModal()
    {

        if (!Auth::check() || Auth::user()->userType !== 'user') {
        $this->resetForm();
        $this->showModal = true;
        } else {
            session()->flash('error', 'You do not have permission to create posts.');
        }
       

    }

    public function openEditModal($id)
    {
        $this->resetForm();
        $post = Post::findOrFail($id);
        $this->post_id = $post->id;
        $this->title = $post->title;
        $this->content = $post->content;
        $this->showModal = true;
        


    }

    public function save()
    {
        $this->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
        ]);

        try {
            if ($this->post_id) {
                $post = Post::findOrFail($this->post_id);
                $post->update([
                    'title' => $this->title,
                    'content' => $this->content,
                ]);
                $message = 'Post updated successfully!';
            } else {
                Post::create([
                    'title' => $this->title,
                    'content' => $this->content,
                    'user_id' => Auth::id(),
                ]);
                $message = 'Post created successfully!';
            }

            $this->closeModal();
            session()->flash('success', $message);
            $this->prepareChartData();
        } catch (\Exception $e) {
            $this->closeModal();
            session()->flash('error', 'Operation failed. Please try again.');
        }
    }

    public function softdelete($id)
    {
        try {
            $post = Post::findOrFail($id);
            $post->delete();
            session()->flash('success', 'Post deleted successfully!');
            $this->prepareChartData();
        } catch (\Exception $e) {
            session()->flash('error', 'Failed to delete post.');
        }
    }

    // public function resetFilters()
    // {
    //     $this->filterTitle = '';
    //     $this->filterUsername = '';
    // }

    public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
        $this->reset();  
       

    }

    public function resetForm()
    {
        $this->reset(['post_id', 'title', 'content']);
         $this->prepareChartData();

    }

    private function prepareChartData()
    {
        $startDate = Carbon::now()->subDays(6);
        $endDate = Carbon::now();

        $chartQuery = Post::whereBetween('created_at', [$startDate, $endDate]);

        if (auth()->user()->userType !== 'admin') {
            $chartQuery->where('user_id', auth()->id());
        }

        $chartData = $chartQuery
            ->select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as count'))
            ->groupBy('date')
            ->orderBy('date')
            ->get();

        $dates = collect();
        $currentDate = $startDate->copy();
        while ($currentDate <= $endDate) {
            $dateString = $currentDate->format('Y-m-d');
            $found = $chartData->firstWhere('date', $dateString);
            $dates->push([
                'date' => $dateString,
                'count' => $found ? $found->count : 0
            ]);
            $currentDate->addDay();
        }

        $this->dates = $dates->pluck('date')->map(fn($d) => Carbon::parse($d)->format('M d'))->toArray();
        $this->postCounts = $dates->pluck('count')->toArray();

        $this->dispatch('chartUpdated', [
            'dates' => $this->dates,
            'postCounts' => $this->postCounts,
        ]);
    }

    public function render()
    {
      
        $query = Post::query()->with('user');

        // Filter by title
        if ($this->filterTitle) {
            $query->where('title', 'like', '%'.$this->filterTitle.'%');
        }

        // Filter by username
        if ($this->filterUsername) {
            $query->whereHas('user', function($q) {
                $q->where('name', 'like', '%'.$this->filterUsername.'%');
            });
        }

        // Admin sees all posts, user sees only their own
        if (auth()->user()->userType !== 'admin') {
            $query->where('user_id', auth()->id());
        }

        $posts = $query->latest()->paginate(10);
        $this->prepareChartData();

        return view('livewire.post', [
            'posts' => $posts,
            'dates' => $this->dates,
            'postCounts' => $this->postCounts
        ]);
        
    }
}
