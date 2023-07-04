<?php

namespace App\Http\Livewire\user;

use App\Models\Book;
use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class SearchComponent extends Component
{
    public Collection $books;
    public string $term='';


    public function render()
    {
        return view('livewire.user.search-component');
    }

    public function submit()
    {
        return redirect()->route('show_search', $this->term);

    }
}
