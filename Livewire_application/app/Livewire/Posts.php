<?php

namespace App\Livewire;

use Livewire\Component;
use Exception;
use App\Models\Post;
use App\Models\User;
 use Illuminate\Support\Facades\auth;
use Illuminate\Support\Facades\Log;

class Posts extends Component



{


      public $showModal = false;
    public $post_id = null;
    public $title = '';
    public $content = '';


    #[\Livewire\Attributes\Layout('layouts.app')]
    public $active = 'dashboard';

    protected $listeners = ['navigate' => 'changePage'];

    public function changePage($page)
    {
        $this->active = $page;
    }

      public function openCreateModal()
    {
        $this->resetForm();
        $this->showModal = true;
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
            // Update existing post
            $post = Post::findOrFail($this->post_id);
            $post->update([
                'title' => $this->title,
                'content' => $this->content,
                
                
            ]);
            $this->closeModal();
            session()->flash('success', 'Post updated successfully!');
        } else {
            // Create new post
            Post::create([
                'title' => $this->title,
                'content' => $this->content,
                
                 'user_id' => Auth::id(), // Assuming the user is authenticated
            ]);
            $this->closeModal();
             session()->flash('success', 'Post created successfully!');
        }

        // Close modal
        $this->closeModal();

    } catch (\Exception $e) {
        $this->closeModal();
        

        // Send error message to frontend
        session()->flash('error', 'Something went wrong: ' . $e->getMessage());
    }
}




     public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }

    // Reset form fields
    public function resetForm()
    {
        $this->reset(['post_id', 'title', 'content']);
    }

    public function render()
    {
        return view('livewire.post');
    }
}
