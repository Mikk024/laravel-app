<?php

namespace App\Http\Controllers;

use App\Enums\CarBody;
use App\Enums\CarColor;
use App\Enums\CarFuel;
use App\Interfaces\ListingRepositoryInterface;
use App\Http\Requests\StoreListingRequest;
use App\Models\Listing;
use Illuminate\Support\Str;
use Carbon\Carbon;

class ListingController extends Controller
{

    private ListingRepositoryInterface $listingRepository;
    public function __construct(ListingRepositoryInterface $listingRepository)
    {
        $this->listingRepository = $listingRepository;
    }


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

       $this->listingRepository->createListing($validated);

       return redirect('/');
    }

    public function show($id)
    {
        return view('listings.show',[
            'listing' => $this->listingRepository->getListingById($id)
        ]);
    }

    public function manage()
    {
        $userId = auth()->id();

        return view('listings.manage', [
            'listings' => $this->listingRepository->getUserListings($userId)
        ]);
    }

    public function destroy($id)
    {
        $listing = $this->listingRepository->getListingById($id);

        $this->authorize('delete', $listing);

        $this->listingRepository->deleteListing($id);

        return redirect()->back();
    }

    public function edit($id)
    {
        $listing = $this->listingRepository->getListingById($id);

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

        $this->listingRepository->updateListing($id, $data);

        return redirect('/');
    }
}
