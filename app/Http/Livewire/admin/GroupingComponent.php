<?php

namespace App\Http\Livewire\admin;


use App\Models\Grouping;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Arr;
use Livewire\Component;

class GroupingComponent extends Component
{
    public Collection $groupings;
    public string $title = '';
    public ?object $grouping;

    protected $listeners = [
        '_new_book_created' => 'reload_books'
    ];
    public int $selected_id;

    public function mount()
    {
        $this->_reload();
    }

    public function render()
    {
        return view('livewire.admin.grouping-list-component');
    }

    public function reload_books()
    {
        $this->_reload();
    }

    public function _reload()
    {
        $this->groupings = Grouping::all();
    }

    public function open_delete_category_modal($id)
    {
        $this->selected_id = $id;
        $this->dispatchBrowserEvent('show-delete');
    }

    public function open_edit_category_modal($id)
    {
        $this->dispatchBrowserEvent('show-edit');
        $this->emit('edit_category', $id);
    }

    public function delete_category()
    {
        Grouping::find($this->selected_id)->delete();
        $this->reload_books();
        $this->dispatchBrowserEvent('hide-delete');
    }

}
