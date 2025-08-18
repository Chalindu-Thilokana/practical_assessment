<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use App\Models\Post;

class BlogSite extends Component
{
    use WithPagination;

    public $filterTitle = '';
    public $filterUsername = '';

    protected $queryString = ['filterTitle', 'filterUsername'];

    protected $paginationTheme = 'tailwind';

    public function updatingFilterTitle()
    {
        $this->resetPage();
    }

    public function updatingFilterUsername()
    {
        $this->resetPage();
    }

    public function resetFilters()
    {
        $this->filterTitle = '';
        $this->filterUsername = '';
        $this->resetPage();
    }

    #[Layout('layouts.guest')]
    public function render()
    {
        $postsQuery = Post::with('user');

        if ($this->filterTitle) {
            $postsQuery->where('title', 'like', '%' . $this->filterTitle . '%');
        }

        if ($this->filterUsername) {
            $postsQuery->whereHas('user', function ($q) {
                $q->where('name', 'like', '%' . $this->filterUsername . '%');
            });
        }

        $posts = $postsQuery->latest()->paginate(2
    );

        return view('livewire.blogsite', [
            'posts' => $posts
        ]);
    }
}
