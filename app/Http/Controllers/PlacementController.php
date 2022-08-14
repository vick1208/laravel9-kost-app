<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placement;
use App\Models\Occupant;
use App\Models\Room;

class PlacementController extends Controller
{
    public function index() {
        $placements = Placement::all();
        return view('pages.placements.index', [
            'placements' => $placements
        ]);
    }

    public function create() {
        $occupants = Occupant::all()->sortBy('name');
        $rooms = Room::all()->sortBy('code');
        return view('pages.placements.form',[
            'occupants' => $occupants,
            'rooms' => $rooms,
        ]);
    }
}
