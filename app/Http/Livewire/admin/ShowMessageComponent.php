<?php

namespace App\Http\Livewire\admin;

use App\Models\Message;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class ShowMessageComponent extends Component
{
    public Collection $mes;
    public int $select_id;

    public function mount()
    {
        $this->_reload();
    }

    public function reload_library()
    {
        $this->_reload();
    }

    public function _reload()
    {
        $this->mes = Message::with('user')->get();
    }
    public function render()
    {
        return view('livewire.admin.show-message-component');
    }

    public function open_delete_message_modal($id)
    {
        $this->select_id = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function delete_message()
    {
        Message::find($this->select_id)->delete();
        $this->reload_library();
        $this->dispatchBrowserEvent('hide-delete');
    }
}
