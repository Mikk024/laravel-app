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






}


?>
