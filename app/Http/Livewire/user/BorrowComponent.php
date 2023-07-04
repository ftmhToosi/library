<?php

namespace App\Http\Livewire\user;

use App\Models\Book;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Date;
use Livewire\Component;

class BorrowComponent extends Component
{
    public int $user_id=0;
    public int $book_id=0;
    public ?object $user;
    public ?object $book;
    public Carbon $borrow;
    public Carbon $delivery;

    protected $listeners=[
        'borrow' => 'borrow'
    ];


    public function render()
    {
        return view('livewire.user.borrow-component');
    }

    public function borrow($id)
    {

        $this->user = User::with('book')->whereId(auth()->user()->id)->first();
        $this->book = Book::with('user')->findOrFail($id);

    }

    public function submit()
    {
        $this->user_id = $this->user->id;
        $this->book_id = $this->book->id;
        $this->borrow = Carbon::now();
        $this->book->user()->attach($this->user_id);
        return redirect()->route('app');
//        $this->user()->attach($this->user_id);
    }
}
