<?php

namespace App\Http\Livewire\admin;

use App\Models\Book;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class LibraryList extends Component
{
    public Collection $books;

    protected $listeners = [
        '_new_library_created'=>'reload_library'
    ];
    public int $selected_id;

    public function mount()
    {
        $this->_reload();
    }
    public function render()
    {
//        if (auth()->check())
        return view('livewire.admin.library-list');
//        return redirect()->route('login');
    }

    public function reload_library()
    {
        $this->_reload();
    }

    public function _reload()
    {
        $this->books = Book::with('group')->get();
    }

    public function open_delete_book_modal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function open_edit_book_modal($id)
    {
        $this->dispatchBrowserEvent('show-edit');
        $this->emit('edit_book', $id);
    }

    public function delete_book()
    {
        Book::find($this->selected_id)->delete();
        $this->reload_library();
        $this->dispatchBrowserEvent('hide-delete');
    }

}
