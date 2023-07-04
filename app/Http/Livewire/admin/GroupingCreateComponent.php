<?php

namespace App\Http\Livewire\admin;

use App\Models\Grouping;
use Livewire\Component;

class GroupingCreateComponent extends Component
{
    public string $title='';

    protected array $rules=[
        'title'=>'required|min:3|max:20'
    ];
    public function render()
    {
        return view('livewire.admin.grouping-create-component');
    }

    public function submit()
    {
        $this->validate($this->rules);
        $data = new Grouping();
        $data->title = $this->title;
        $data->save();

        $this->emit('_new_book_created');
        $this->title='';
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
