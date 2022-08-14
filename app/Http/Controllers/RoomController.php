<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all()->sortBy('code');
        return view('pages.rooms.index', [
            'rooms' => $rooms
        ]);
    }

    public function create() {
        $locations = Location::all()->sortBy('name');
        return view('pages.rooms.form', [
            'locations' => $locations
        ]);
    }
}
