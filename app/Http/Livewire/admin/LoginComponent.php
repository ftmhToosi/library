<?php

namespace App\Http\Livewire\admin;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginComponent extends Component
{
    public string $email = '';
    public string $password = '';

    protected $rules=[
        'email'=>'required|',
        'password'=>'required',
//        'password' => [
//                'required',
//                'string',
//                'min:10',             // must be at least 10 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/', // must contain a special character
//            ],
    ];
    public function render()
    {
        return view('livewire.admin.login-component');
    }

    public function submit()
    {
        $this->validate($this->rules);
            if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
                $user = User::whereEmail($this->email)->first();
                auth()->loginUsingId($user->id);
                return redirect()->route('manage-library');
            } else
                return redirect()->route('register');
    }
}
