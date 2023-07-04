<?php

namespace App\Http\Livewire\user;

use App\Models\Profile;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HeaderComponent extends Component
{
    public ?object $profile;
    public int $selected_id;
    public ?object $user;

    public function mount()
    {
        if (auth()->check()) {
            $this->profile = Profile::with('user')->first();
            $this->user = User::whereId(auth()->user()->id)->first();
        }
    }
    public function render()
    {
        return view('livewire.user.header-component');
    }

    public function open_logout_modal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
