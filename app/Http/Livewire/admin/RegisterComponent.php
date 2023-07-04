<?php

namespace App\Http\Livewire\admin;

use App\Models\Profile;
use App\Models\User;
use Livewire\Component;

class RegisterComponent extends Component
{
    public string $name='';
    public string $email='';
    public string $password='';

    protected array $rules=[
        'name'=>'required|min:3|max:20',
        'email'=>'required|unique:users',
        'password' => 'required',
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
        return view('livewire.admin.register-component');
    }

    public function submit()
    {
        $this->validate($this->rules);
        $data = new User();
        $data->name = $this->name;
        $data->email = $this->email;
        $data->password = bcrypt($this->password);
        $data->assignRole('User');
        $data->save();
        $prof = new Profile();
        $prof->user_id = $data->id;
        $prof->name = 'None';
        $prof->phone = 'None';
        $prof->username = 'None';
        $prof->bio = 'None';
        $prof->save();
        return redirect()->route('login');

    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
