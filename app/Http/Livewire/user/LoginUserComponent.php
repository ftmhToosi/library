<?php

namespace App\Http\Livewire\user;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginUserComponent extends Component
{
    public string $email = '';
    public string $password = '';

    protected $rules=[
        'email'=>'required|',
        'password'=>'required'
    ];

    public function submit()
    {
        $this->validate($this->rules);
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            $user = User::whereEmail($this->email)->first();
            auth()->loginUsingId($user->id);
            return redirect()->route('app');
        } else
            return redirect()->route('register');
    }
    public function render()
    {
        return view('livewire.user.login-user-component');
    }
}
