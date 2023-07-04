<?php

namespace App\Http\Livewire\user;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class ProfileShowComponent extends Component
{
    public ?object $profiles;
    public ?object $user;

    protected $listeners = [
        '_new_library_created'=>'reload_library'
    ];

    public function mount()
    {
        $this->_reload();
    }

    public function render()
    {
        return view('livewire.user.profile-show-component');
    }

    public function reload_library()
    {
        $this->_reload();
    }

    public function _reload()
    {
        if (auth()->check()) {
            $this->profiles = Profile::whereUserId(auth()->user()->id)->first();
            $this->user = User::whereId(auth()->user()->id)->first();
        }
    }

    public function open_edit_profile_modal($id)
    {
        $this->dispatchBrowserEvent('show-my-edit');
    }

    public function open_request_admin_modal($id)
    {
        $this->dispatchBrowserEvent('show-request');
        $this->emit('request_admin', $id);
    }

}
