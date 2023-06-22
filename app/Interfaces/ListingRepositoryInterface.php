<?php

namespace App\Interfaces;

interface ListingRepositoryInterface
{
    public function getAllListings();
    public function getListingById($listingId);
}


?>