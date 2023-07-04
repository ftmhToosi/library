<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Livewire\Component;

class UserUpdateComponent extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public ?object $user;

    protected $listeners = [
        'edit_user' => 'edit_user'
    ];

    protected array $rules = [
        'name' => 'nullable|min:3|max:20',
        'email' => 'nullable',
        'password' => 'nullable',
//        'password' => [
//            'nullable',
//            'string',
//            'min:10',             // must be at least 10 characters in length
//            'regex:/[a-z]/',      // must contain at least one lowercase letter
//            'regex:/[A-Z]/',      // must contain at least one uppercase letter
//            'regex:/[0-9]/',      // must contain at least one digit
//            'regex:/[@$!%*#?&]/', // must contain a special character
//        ],
    ];

    public function render()
    {
        return view('livewire.admin.user-update-component');
    }

    public function edit_user($id)
    {
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->email = $this->user->email;
//        $this->password = $this->user->password;
    }

    public function submit()
    {
        $this->validate($this->rules);
        $this->user->name = $this->name == null ? $this->user->name : $this->name;
        $this->user->email = $this->email == null ? $this->user->email : $this->email;
        $this->user->password = bcrypt($this->password) == null ? $this->user->password : bcrypt($this->password);
        $this->user->save();
        return redirect()->route('manage_user');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
