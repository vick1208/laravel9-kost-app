<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Location;

class LocationController extends Controller
{
    public function index() {
        $locations = Location::all()->sortBy('name');
        return view('pages.locations.index', [
            'locations' => $locations,
            'resource' => 'locations'
        ]);
    }

    public function create() {
        return view('pages.locations.form');
    }

    public function show($id) {
        $location = Location::find($id);
        return view('pages.locations.detail', [
            'location' => $location
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        Location::create($validatedData);
        return redirect('/locations')->with(['success' => 'Lokasi telah dibuat']);
    }

    public function edit($id) {
        $location = Location::find($id);
        return view('pages.locations.edit',[
            'location' => $location,
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required'
        ]);
        Location::where('id', $id)->update($validatedData);
        return redirect('/locations')->with(['success' => 'Lokasi telah diubah']);
    }

    public function destroy($id) {
        Location::destroy($id);
        return redirect('/locations')->with(['success' => 'Lokasi telah dihapus']);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $locations = Location::where('name', 'like', "%$keyword%")->get();

        return view('pages.locations.index', [
            'locations' => $locations,
            'resource' => 'locations'
        ]);
    }
}
