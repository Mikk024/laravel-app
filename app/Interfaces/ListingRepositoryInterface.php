<?php

namespace App\Interfaces;

interface ListingRepositoryInterface
{
    public function getAllListings();
    public function getListingById($listingId);
    public function createListing($listingDetails);
    public function getUserListings($userId);
    public function deleteListing($listingId);
    public function updateListing($listingId, $listingDetails);
}


?>