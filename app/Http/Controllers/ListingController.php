<?php

namespace App\Http\Controllers;

use App\Enums\CarBody;
use App\Enums\CarColor;
use App\Enums\CarFuel;
use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
class ListingController extends Controller
{
    public function create()
    {
        $fuel = CarFuel::getValues();

        $body = CarBody::getValues();

        $currentYear = Carbon::now()->format('Y');

        $color = CarColor::getValues();

        return view('listings.create', [
            'fuel' => $fuel,
            'body' => $body,
            'currentYear' => $currentYear,
            'color' => $color
        ]);
    }

    public function store(StoreListingRequest $request)
    {        
       $validated = $request->validated();

       $validated['user_id'] = 1;

       if ($request->has('images')) {
        $randomString = Str::random();
        foreach ($request->file('images') as $image) {
            $path[] = $image->store('listings/' . $randomString);
        }
        $validated['images'] = $path;
       }

       Listing::create($validated);

       return redirect('/');
    }
}
