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

    public function store(Request $request) {
        $validatedData = $request->validate([
            'code' => 'required|unique:rooms',
            'location_id' => 'required',
            'capacity' => ''
        ]);
        Room::create($validatedData);
        return redirect('/rooms')->with(['success' => 'Data kamar telah dibuat']);
    }

    public function edit() {
        
    }   

    public function update() {
        
    }

    public function delete() {
        
    }
}
