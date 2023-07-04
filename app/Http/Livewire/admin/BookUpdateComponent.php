<?php

namespace App\Http\Livewire\admin;

use App\Models\Book;
use App\Models\Grouping;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;
use Livewire\WithFileUploads;

class BookUpdateComponent extends Component
{
    use WithFileUploads;
    public array $grouping_id = [];
    public string $name='';
    public string $writer='';
    public string $description='';
    public ?object $book;
    public $image;
    public Collection $groups;

    protected array $rules = [
        'name' => 'nullable|min:3|max:20',
        'writer' => 'nullable',
        'image' => 'nullable|image|max:1024',
    ];

    protected $listeners = [
        'edit_book' =>'edit_book'
    ];

    public function mount($id=null)
    {
        $this->groups = Grouping::all();
        $this->grouping_id =$this->groups->map(function ($value){
            return $value->id;
        })->toArray();
        if ($id != null) {
            $this->book = Book::findOrFail($id);
            $this->name = $this->book->name;
            $this->writer = $this->book->writer;
            $this->description = $this->book->description;
            $this->groups = Grouping::all();
            $this->grouping_id =$this->book->group->map(function ($value){
                return $value->id;
            })->toArray();
//            $this->image = $this->book->image;
//            $this->groups = $this->book->grouping_id;
        }
    }

    public function render()
    {
        return view('livewire.admin.book-update-component');
    }

    public function edit_book($id)
    {
        $this->book = Book::findOrFail($id);
        $this->name = $this->book->name;
        $this->writer = $this->book->writer;
        $this->description = $this->book->description;
//        $this->groups = Grouping::all();
//        $this->grouping_id =$this->groups->map(function ($value){
//            return $value->id;
//        })->toArray();
    }
    public function submit()
    {
        $this->validate($this->rules);
//        $this->book->grouping_id = $this->grouping_id == null ? $this->book->grouping_id: $this->grouping_id;
        $this->book->name = $this->name == null ? $this->book->name: $this->name;
        $this->book->writer = $this->writer == null ? $this->book->writer: $this->writer;
        $this->book->description = $this->description == null ? $this->book->description: $this->description;
        $this->book->image = $this->image->store('books', 'public') == null ? $this->book->image: $this->image->store('books', 'public');;
        $this->book->save();
        $this->book->group()->sync($this->grouping_id);
        return redirect()->route('manage-library');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
