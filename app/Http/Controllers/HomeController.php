<?php

namespace App\Http\Controllers;

use App\Enums\CarBody;
use App\Enums\CarFuel;
use App\Models\Listing;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $carBody = CarBody::getValues();

        $carFuel = CarFuel::getValues();

        return view('home',[
            'body' => $carBody,
            'fuel' => $carFuel
        ]);
    }

    public function search(Request $request)
    {
        $hasBody = $request->filled('body');

        $hasFuel = $request->filled('fuel');

        $hasModel = $request->filled('model');

        $hasMake = $request->filled('make');

        $make = $request->input('make');

        $model = $request->input('model');

        $body = $request->input('body');

        $fuel = $request->input('fuel');

        $listings = Listing::query()->with(['make', 'model'])
            ->when($hasBody, function ($query) use ($body) {
                $query->where('body', $body);
            })
            ->when($hasMake, function ($query) use ($make) {
                $query->where('make_id', $make);
            })
            ->when($hasModel, function ($query) use ($model) {
                $query->where('model_id', $model);
            })
            ->when($hasFuel, function ($query) use ($fuel) {
                $query->where('fuel', $fuel);
            })
            ->paginate(2);
            
            
        return view('search', [
            'listings' => $listings
        ]);

    }

}