<?php

namespace App\Livewire;

use Livewire\Component;

class AddPost extends Component
{
    #[\Livewire\Attributes\Layout('layouts.app')]
    public $active = 'posts.index';

    protected $listeners = ['navigate' => 'changePage'];

    public function changePage($page)
    {
        $this->active = $page;
    }

    public function render()
    {
        return view('livewire.add-post');
    }
}
