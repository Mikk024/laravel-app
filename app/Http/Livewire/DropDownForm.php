<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\CarModel;
use App\Models\Make;

class DropDownForm extends Component
{
    public $makes;
    public $models;

    public $selectedMake;

    public function mount()
    {
        $this->makes = Make::all();
        $this->models = collect();
    }
    public function render()
    {
        return view('livewire.drop-down-form');
    }

    public function updatedSelectedMake($make) {
        if (!is_null($make)) {
            $this->models = CarModel::where('make_id', $make)->get();
        }
    }
}
