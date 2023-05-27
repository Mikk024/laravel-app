<?php

namespace App\Http\Livewire;

use App\Enums\CarBody;
use App\Enums\CarColor;
use App\Enums\CarFuel;
use Livewire\Component;
use App\Models\Listing;
use App\Models\CarModel;
use App\Models\Make;
use Carbon\Carbon;

class EditForm extends Component
{
    public $makes;
    public $models;

    public $listing;

    public $selectedMake;

    public function mount($id)
    {
        $this->listing = Listing::with(['make', 'model'])->find($id);
        $this->makes = Make::all();
        $this->models = collect();
        $this->selectedMake = $this->listing->make_id;
    }
    public function render()
    {
        return view('livewire.edit-form');
    }

    public function updatedSelectedMake($make) {
        if (!is_null($make)) {
            $this->models = CarModel::where('make_id', $make)->get();
        }
    }
}