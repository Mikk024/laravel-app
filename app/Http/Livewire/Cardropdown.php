<?php

namespace App\Http\Livewire;

use App\Models\CarModel;
use App\Models\Make;
use Livewire\Component;

class Cardropdown extends Component
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
        return view('livewire.cardropdown');
    }

    public function updatedSelectedMake($make) {
        if (!is_null($make)) {
            $this->models = CarModel::where('make_id', $make)->get();
        }
    }
}
