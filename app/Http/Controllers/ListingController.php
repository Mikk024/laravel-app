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

       $validated['user_id'] = auth()->id();

       if ($request->has('images')) {
        $randomString = Str::random();
        foreach ($request->file('images') as $image) {
            $path[] = $image->store('public/listings/' . $randomString);
        }
        $validated['images'] = $path;
       }

       Listing::create($validated);

       return redirect('/');
    }

    public function show($id)
    {
        $listing = Listing::with(['make', 'model', 'user'])->find($id);

        //dd($listing);

        return view('listings.show',[
            'listing' => $listing
        ]);
    }

    public function manage()
    {
        $userId = auth()->id();

        $data = Listing::with(['make', 'model', 'user'])->where('user_id', $userId)->get();

        return view('listings.manage', [
            'listings' => $data
        ]);
    }

    public function destroy($id)
    {
        Listing::destroy($id);

        return redirect()->back();
    }
}
