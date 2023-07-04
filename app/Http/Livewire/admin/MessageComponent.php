<?php

namespace App\Http\Livewire\admin;

use App\Models\Message;
use Illuminate\Http\RedirectResponse;
use JetBrains\PhpStorm\NoReturn;
use Livewire\Component;

class MessageComponent extends Component
{
//    public ?object $message;
    public int $user_id=0;

    protected $listeners= [
      'request_admin' => 'request_admin'
    ];

    public function render()
    {
        return view('livewire.admin.message-component');
    }

    public function request_admin($id)
    {
        $this->user_id = $id;
//        $data = new Message();
//        $data->user_id = $id;
//        $data->save();
    }

    public function request()
    {
        $data = new Message();
        $data->user_id = $this->user_id;
        $data->save();
        $this->dispatchBrowserEvent('hide-request');
    }
}
