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
use Illuminate\Support\Facades\Gate;

class ListingController extends Controller
{
    public function create()
    {
        $this->authorize('create', Listing::class);

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
        $this->authorize('create', Listing::class);

       $validated = $request->validated();

       $validated['user_id'] = auth()->id();

       if ($request->has('images')) {
        $randomString = Str::random();
        foreach ($request->file('images') as $image) {
            $path[] = $image->store($randomString, 'public');
        }
        $validated['images'] = $path;
       }

       Listing::create($validated);

       return redirect('/');
    }

    public function show($id)
    {
        $listing = Listing::with(['make', 'model', 'user'])->find($id);

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
        $listing = Listing::find($id);

        $this->authorize('delete', $listing);

        Listing::destroy($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $listing = Listing::with(['make', 'model'])->find($id);

        $this->authorize('update', $listing);

        $fuel = CarFuel::getValues();

        $body = CarBody::getValues();

        $currentYear = Carbon::now()->format('Y');

        $color = CarColor::getValues();

        return view('listings.edit',[
            'listing' => $listing,
            'fuel' => $fuel,
            'body' => $body,
            'currentYear' => $currentYear,
            'color' => $color
        ]);
    }

    public function update(StoreListingRequest $request, $id)
    {
        $data = $request->validated();

        Listing::find($id)->update($data);

        return redirect('/');
    }
}
