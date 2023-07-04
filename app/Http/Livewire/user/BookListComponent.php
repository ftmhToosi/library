<?php

namespace App\Http\Livewire\user;

use App\Models\Book;
use App\Models\Profile;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class BookListComponent extends Component
{
    public Collection $books;
    public ?object $users;
    public ?object $user;
    public ?object $profile;
    public int $selec_id;

    protected $listeners = [
        '_new_library_created' => 'reload_library'
    ];

    public function mount()
    {
        $this->_reload();
    }

    public function render()
    {
        return view('livewire.user.book-list-component');
    }

    public function reload_library()
    {
        $this->_reload();
    }

    public function _reload()
    {
//        $this->books = Book::all();
        $this->books = Book::with('user')->get();
        $this->user = User::with('profile')->first();
        if (auth()->check()) {
            $this->users = User::with('book')->whereId(auth()->user()->id)->first();
            $this->profile = Profile::whereUserId(auth()->user()->id)->first();
        }
    }

    public function open_return_book_modal($id)
    {
        $this->selec_id = $id;
        $this->reload_library();
        $this->dispatchBrowserEvent('show-return');
    }

    public function return_book()
    {
        dd('dddd');
        DB::table('borrow')->where([
            'user_id', '=', $this->users,
            'book_id', '=', $this->selec_id
        ])->delete();

//        Book::find($this->selec_id)->delete();
        $this->dispatchBrowserEvent('hide-return');
    }

}
