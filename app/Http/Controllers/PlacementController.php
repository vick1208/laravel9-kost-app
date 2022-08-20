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

    public function show($id) {
        $placement = Placement::find($id);
        return view('pages.placements.detail', [
            'placement' => $placement
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'occupant_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'nullable|date',
            'check_out_date' => 'nullable|date',
        ]);
        Placement::create($validatedData);
        return redirect('/placements')->with(['success' => 'Penempatan telah dibuat']);
    }

    public function edit($id) {
        $placement = Placement::find($id);
        $occupants = Occupant::all()->sortBy('name');
        $rooms = Room::all()->sortBy('code');
        return view('pages.placements.edit',[
            'placement' => $placement,
            'occupants' => $occupants,
            'rooms' => $rooms,
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'occupant_id' => 'required',
            'room_id' => 'required',
            'check_in_date' => 'nullable|date',
            'check_out_date' => 'nullable|date',
        ]);
        Placement::where('id', $id)->update($validatedData);
        return redirect('/placements')->with(['success' => 'Penempatan telah diubah']);
    }

    public function destroy($id) {
        Placement::destroy($id);
        return redirect('/placements')->with(['success' => 'Penempatan telah dihapus']);
    }
}
