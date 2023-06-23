<?php

namespace App\Repositories;

use App\Interfaces\ListingRepositoryInterface;
use App\Models\Listing;

class ListingRepository implements ListingRepositoryInterface
{
    public function getAllListings()
    {
        return Listing::all();
    }

    public function getListingById($listingId)
    {
        return Listing::with(['make', 'model', 'user'])->findOrFail($listingId);
    }

    public function createListing($listingDetails)
    {
        return Listing::create($listingDetails);
    }

    public function getUserListings($userId)
    {
        return Listing::with(['make', 'model', 'user'])->where('user_id', $userId)->paginate(10);
    }

    public function deleteListing($listingId)
    {
        return Listing::destroy($listingId);
    }

    public function updateListing($listingId, $listingDetails)
    {
        return Listing::find($listingId)->update($listingDetails);
    }



}


?>
