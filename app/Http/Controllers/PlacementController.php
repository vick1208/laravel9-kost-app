<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Placement;
use App\Models\Occupant;
use App\Models\Room;

class PlacementController extends Controller
{
    public function index() {
        $placements = Placement::orderBy('id', 'desc')->get();
        return view('pages.placements.index', [
            'placements' => $placements,
            'resource' => 'placements'
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
            'check_in_date' => 'date',
            'check_out_date' => 'date|after_or_equal:check_in_date',
        ]);
        $occupied = Placement::where('occupant_id', $validatedData['occupant_id'])
            ->whereNull('check_out_date');
        if ($occupied->count() > 0) {
            return back()->with(['error' => 'Penghuni masih aktif']);
        }
        Placement::create($validatedData);
        return back()->with(['success' => 'Penempatan telah dibuat']);
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

    public function search(Request $request) {
        $keyword = $request->keyword;
        $placements = Placement::whereHas('occupant', function($query) use ($keyword) {
            $query->where('name', 'like', "%$keyword%");
        });
        return view('pages.placements.index', [
            'placements' => $placements,
            'resource' => 'placements'
        ]);
    }

    public function checkout(Request $request, $id) {
        $placement = Placement::find($id);
        $validatedData = $request->validate([
            'check_out_date' => 'required|date|after_or_equal:check_in_date'
        ]);
        $placement->update($validatedData);
        return back()->with(['success' => 'Penghuni telah keluar dari penempatan']);
    }
}
