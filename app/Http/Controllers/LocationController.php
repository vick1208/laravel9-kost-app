<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index() {
        $locations = Location::all()->sortBy('name');
        return view('pages.locations.index', [
            'locations' => $locations
        ]);
    }

    public function create() {
        return view('pages.locations.form');
    }
}
