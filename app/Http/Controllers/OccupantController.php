<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupant;

class OccupantController extends Controller
{
    public function index() {
        $occupants = Occupant::all()->sortBy('name');
        return view('pages.occupants.index', [
            'occupants' => $occupants
        ]);
    }
    
    public function create() {
        return view('pages.occupants.form');
    }
}
