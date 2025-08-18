<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\User; // Eloquent model
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
class UsersSystem extends Component
{
public $name;
public $email;
public $userType=null;
public $showModal;
public $user_id = null;
    #[\Livewire\Attributes\Layout('layouts.app')]
    public $active = 'users.index';

    protected $listeners = ['navigate' => 'changePage'];

    public function changePage($page)
    {
        $this->active = $page;
        
    }
    public function render()
    {
        return view('livewire.users-system', [
        'users' => User::get(), 
    ]);
    }
public function deleteUser($id)
{
    try {
        $user = User::findOrFail($id);
        $user->forceDelete(); 
        session()->flash('success', 'User permanently deleted!');
    } catch (\Exception $e) {
        session()->flash('error', 'Something went wrong: ' . $e->getMessage());
    }
}

    public function openEditModal($id)
    {
        $this->resetForm();
        $user = User::findOrFail($id);
        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->userType = $user->userType;
        $this->showModal = true;
    }

 public function closeModal()
    {
        $this->showModal = false;
        $this->resetForm();
    }
    private function resetForm()
    {
        $this->user_id = null;
        $this->name = null;
        $this->email = null;
        $this->userType = null;
    }

public function save()
{
    $this->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email,' . $this->user_id,
        'userType' => 'required|string|in:admin,user',
    ]);

    try {
        $user = User::findOrFail($this->user_id);
        $user->update([
            'name' => $this->name,
            'email' => $this->email,
            'userType' => $this->userType,
        ]);

        $this->closeModal();
        session()->flash('success', 'User updated successfully!');
    } catch (\Exception $e) {
        $this->closeModal();
        session()->flash('error', 'Something went wrong: ' . $e->getMessage());
    }
}

}