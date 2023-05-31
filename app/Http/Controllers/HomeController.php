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

        // No inputs
        if (!$hasMake && !$hasModel && !$hasFuel && !$hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->paginate(2);
        }

        // One input
        if ($hasMake) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->get();
        }

        if ($hasModel) {
            $listing = Listing::with(['make', 'model'])
                ->where('model_id', $model)
                ->get();
        };

        if ($hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->where('body', $body)
                ->get();
        }

        if ($hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('fuel', $fuel)
                ->get();
        }

        // Two inputs

        if ($hasMake && $hasModel) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->get();
        }

        if ($hasMake && $hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('body', $body)
                ->get();
        }

        if ($hasMake && $hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('fuel', $fuel)
                ->get();
        }

        if ($hasModel && $hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ->get();
        }

        if ($hasModel && $hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ->get();
        }

        if ($hasFuel && $hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->where('fuel', $fuel)
                ->where('body', $body)
                ->get();
        }

        // Three Inputs

        if  ($hasMake && $hasModel && $hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->where('fuel', $fuel)
                ->get();
        }

        if ($hasMake && $hasModel && $hasBody) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('model_id', $model)
                ->where('body', $body)
                ->get();
        }

        if ($hasModel && $hasBody && $hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('model_id', $model)
                ->where('body', $body)
                ->where('fuel', $fuel)
                ->get();
        }


        // Four inputs
        if ($hasMake && $hasModel && $hasBody && $hasFuel) {
            $listing = Listing::with(['make', 'model'])
                ->where('make_id', $make)
                ->where('model', $model)
                ->where('body', $body)
                ->where('fuel', $fuel)
                ->get();
        }

        return view('search', [
            'listings' => $listing
        ]);

    }

}