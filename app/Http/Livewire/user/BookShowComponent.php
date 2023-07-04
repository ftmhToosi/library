<?php

namespace App\Http\Livewire\user;

use App\Models\Book;
use Livewire\Component;

class BookShowComponent extends Component
{
    public ?object $book;
    public ?object $group;

    public function mount($id)
    {
        $this->_reload($id);

    }
    public function render()
    {
        return view('livewire.user.book-show-component');
    }

    public function _reload($id)
    {
        if (auth()->check()) {
            $this->book = Book::with('group')->findOrFail($id);
        }
        else
            return redirect()->route('login');
    }

    public function open_borrow_modal($id)
    {
        $this->dispatchBrowserEvent('show-edit');
        $this->emit('borrow', $id);
        $this->emit('reports', $id);
    }
}
