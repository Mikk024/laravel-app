<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Listing;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $this->authorize('admin-level');
        
        return view('admin.index', [
            'listings' => Listing::with(['make', 'model', 'user'])->paginate(10)
        ]);
    }
}
