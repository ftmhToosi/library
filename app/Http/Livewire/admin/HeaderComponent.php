<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderComponent extends Component
{
    public ?object $user;
    public int $select_id;

    public function mount()
    {
        if (auth()->check())
            $this->user = User::whereId(auth()->user()->id)->first();
    }
    public function render()
    {
        return view('livewire.admin.header-component');
    }

    public function open_logout_admin_modal($id)
    {
        $this->select_id = $id;
        $this->dispatchBrowserEvent('show-delete-admin');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login_admin');
    }
}
