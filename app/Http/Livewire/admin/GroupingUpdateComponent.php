<?php

namespace App\Http\Livewire\admin;

use App\Models\Grouping;
use Livewire\Component;

class GroupingUpdateComponent extends Component
{
    public string $title='';
    public ?object $grouping;

    protected array $rules=[
        'title'=>'nullable|min:3|max:20'
    ];

    protected $listeners = [
      'edit_category' =>'edit_category'
    ];

    public function mount($id=null)
    {
        if ($id!=null)
        {
            $this->grouping = Grouping::findOrFail($id);
            $this->title = $this->grouping->title;
        }
    }

    public function render()
    {
        return view('livewire.admin.grouping-update-component');
    }

    public function edit_category($id)
    {
        $this->grouping = Grouping::findOrFail($id);
        $this->title = $this->grouping->title;
    }

    public function submit()
    {
        $this->validate($this->rules);
        $this->grouping->title = $this->title == null ? $this->grouping->title: $this->title;
        $this->grouping->save();
        return redirect()->route('manage_grouping');
    }

    public function updated($field)
    {
        $this->validateOnly($field);
    }
}
