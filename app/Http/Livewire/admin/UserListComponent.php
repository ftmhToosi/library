<?php

namespace App\Http\Livewire\admin;

use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class UserListComponent extends Component
{
    public Collection $users;
    public int $select_id;
    public int $select_id2;
    public int $select_id3;

    public function mount()
    {
        $this->_reload();
    }

    public function render()
    {
        return view('livewire.admin.user-list-component');
    }

    public function reload_library()
    {
        $this->_reload();
    }

    public function _reload()
    {
        $this->users = User::with('roles')->get();

    }

    public function open_edit_user_modal($id)
    {
        $this->dispatchBrowserEvent('show-edit');
        $this->emit('edit_user', $id);
    }

    public function open_delete_user_modal($id)
    {
        $this->select_id3 = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function delete_user()
    {
        User::find($this->select_id3)->delete();
        $this->reload_library();
        $this->dispatchBrowserEvent('hide-delete');
    }

    public function open_assign_admin_modal($id)
    {
        $this->select_id = $id;
        $this->dispatchBrowserEvent('show-assign');
    }

    public function assign()
    {
        $user = User::find($this->select_id);
        $user->assignRole('Admin');
        $user->save();
        $this->reload_library();
        $this->dispatchBrowserEvent('hide-assign');
        Message::whereUserId($user->id)->delete();

    }

    public function open_expel_admin_modal($id)
    {
        $this->select_id2 = $id;
        $this->dispatchBrowserEvent('show-expel');
    }

    public function expel()
    {
        $user = User::find($this->select_id2);
        $user->removeRole('Admin');
        $user->assignRole('User');
        $user->save();
        $this->reload_library();
        $this->dispatchBrowserEvent('hide-expel');
    }
}
