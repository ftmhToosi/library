<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Livewire\Component;

class SidebarComponent extends Component
{
    public ?object $user;

    public function mount()
    {
        if (auth()->check())
            $this->user = User::whereId(auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.admin.sidebar-component');
    }
}
