<?php

namespace App\Livewire;

use Livewire\Component;

class Post extends Component
{
    #[\Livewire\Attributes\Layout('layouts.app')]
    public $active = 'dashboard';

    protected $listeners = ['navigate' => 'changePage'];

    public function changePage($page)
    {
        $this->active = $page;
    }

    public function render()
    {
        return view('livewire.post');
    }
}
