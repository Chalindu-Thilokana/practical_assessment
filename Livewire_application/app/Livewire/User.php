<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
    #[\Livewire\Attributes\Layout('layouts.app')]
    public $active = 'users.index';

    protected $listeners = ['navigate' => 'changePage'];

    public function changePage($page)
    {
        $this->active = $page;
    }

    public function render()
    {
        return view('livewire.user');
    }
}
