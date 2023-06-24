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

        $listings = Listing::query()->with(['make', 'model']);

        // One input

        if ($hasMake) {
            $listings->where('make_id', $make);
        }

        if ($hasModel) {
            $listings->where('model_id', $model);
        }

        if ($hasBody) {
            $listings->where('body', $body);
        }

        if ($hasFuel) {
            $listings->where('fuel', $fuel);
        }

        // Two inputs

        if ($hasMake && $hasModel) {
            $listings
                ->where('make_id', $make)
                ->where('model_id', $model)
                ;
        }

        if ($hasMake && $hasFuel) {
            $listings
                ->where('make_id', $make)
                ->where('fuel', $fuel)
                ;
        }

        if ($hasModel && $hasFuel) {
            $listings
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ;
        }

        if ($hasModel && $hasBody) {
            $listings
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ;
        }

        if ($hasFuel && $hasBody) {
            $listings
                ->where('fuel', $fuel)
                ->where('body', $body)
                ;
        }

        // Three Inputs

        if  ($hasMake && $hasModel && $hasFuel) {
            $listings
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ;
        }

        if ($hasMake && $hasModel && $hasBody) {
            $listings
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->where('body', $body)
                ;
        }

        if ($hasModel && $hasBody && $hasFuel) {
            $listings
                ->where('model_id', $model)
                ->where('body', $body)
                ->where('fuel', $fuel)
                ;
        }

        // Four inputs
        
        if ($hasMake && $hasModel && $hasBody && $hasFuel) {
            $listings
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->where('body', $body)
                ->where('fuel', $fuel)
                ;
        }

        $listings = $listings->paginate(2);

        return view('search', [
            'listings' => $listings
        ]);

    }

}