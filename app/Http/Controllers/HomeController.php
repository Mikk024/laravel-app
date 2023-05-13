<?php

namespace App\Http\Controllers;

use App\Enums\CarBody;
use App\Enums\CarFuel;
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
}
