<?php

namespace App\Http\Livewire\user;

use App\Models\Profile;
use Livewire\Component;
use Livewire\WithFileUploads;

class ProfileUpdateComponent extends Component
{
    use WithFileUploads;

    public ?object $profile;
    public $image;
    public string $name = '';
    public string $phone = '';
    public string $username = '';
    public string $bio = '';

    protected array $rules = [
        'image' => 'nullable',
        'name' => 'nullable|min:3|max:40',
        'phone' => 'nullable|min:11|max:11',
        'username' => [
            'nullable',
            'string',
            'min:5',             // must be at least 10 characters in length
            'regex:/[a-z]/',      // must contain at least one lowercase letter
            'regex:/[@]/',
            'unique:profiles',
        ],
        'bio' => 'nullable'
    ];

    public function mount()
    {
        $this->profile = Profile::whereUserId(auth()->user()->id)->first();
        $this->name = $this->profile->name ?? '';
        $this->phone = $this->profile->phone ?? '';
        $this->username = $this->profile->username ?? '';
        $this->bio = $this->profile->bio ?? '';
//        $this->image = $this->profile->image;
    }

    public function render()
    {
        return view('livewire.user.profile-update-component');
    }

    public function submit()
    {
        if ($this->profile == null)
            $this->profile = new Profile();
        $this->validate($this->rules);
        $this->profile->name = $this->name == null ? $this->profile->name : $this->name;
        $this->profile->phone = $this->phone == null ? $this->profile->phone : $this->phone;
        $this->profile->username = $this->username == null ? $this->profile->username : $this->username;
        $this->profile->bio = $this->bio == null ? $this->profile->bio : $this->bio;
        $this->profile->image = $this->image == null ? $this->profile->image : $this->image->store('profiles', 'public');
        $this->profile->save();

        return redirect()->route('show_profile');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
