<?php

namespace App\Http\Livewire\admin;

use App\Models\Book;
use App\Models\Grouping;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookCreateComponent extends Component
{
    use WithFileUploads;
    public array $grouping_id = [];
    public string $name = '';
    public string $writer = '';
    public string $description = '';
    public $image;

    protected array $rules = [
        'name' => 'required|min:3|max:20',
        'writer' => 'required',
        'image' => 'nullable|image|max:1024',
    ];
    public Collection $groups;

    public function mount()
    {
        $this->groups = Grouping::all();
        $this->grouping_id =$this->groups->map(function ($value){
            return $value->id;
        })->toArray();
    }

    public function render()
    {
        return view('livewire.admin.book-create-component');
    }

    public function submit()
    {
        if (auth()->user()->can('create_book')) {
            $this->validate($this->rules);
            $data = new Book();
//        $data->grouping_id =$this->grouping_id;
            $data->name = $this->name;
            $data->writer = $this->writer;
            $data->description = $this->description;
            $data->image = $this->image->store('books', 'public');
            $data->save();

            $data->group()->attach($this->grouping_id);

            $this->emit('_new_library_created');
            $this->name = '';
            $this->writer = '';
            $this->description = '';
        }
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
