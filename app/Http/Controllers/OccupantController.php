<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Occupant;

//   GET|HEAD        occupants ................... occupants.index › OccupantController@index
//   POST            occupants ................... occupants.store › OccupantController@store
//   GET|HEAD        occupants/create .......... occupants.create › OccupantController@create
//   GET|HEAD        occupants/{room} .............. occupants.show › OccupantController@show
//   PUT|PATCH       occupants/{room} .......... occupants.update › OccupantController@update
//   DELETE          occupants/{room} ........ occupants.destroy › OccupantController@destroy
//   GET|HEAD        occupants/{room}/edit ......... occupants.edit › OccupantController@edit

class OccupantController extends Controller
{
    public function index() {
        $occupants = Occupant::all()->sortBy('name');
        return view('pages.occupants.index', [
            'occupants' => $occupants,
            'resource' => 'occupants'
        ]);
    }
    
    public function create() {
        return view('pages.occupants.form');
    }

    public function show($id) {
        $occupant = Occupant::find($id);
        return view('pages.occupants.detail', [
            'occupant' => $occupant
        ]);
    }

    public function store(Request $request) {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => '',
            'birth_date' => '',
            'origin_place' => '',
            'education' => '',
            'occupation' => '',
            'phone_number' => '',
        ]);

        Occupant::create($validatedData);
        return redirect('/occupants')->with(['success' => 'Penghuni telah dibuat']);
    }

    public function edit($id) {
        $occupant = Occupant::find($id);
        return view('pages.occupants.edit', [
            'occupant' => $occupant
        ]);
    }

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'name' => 'required',
            'gender' => 'required',
            'birth_place' => '',
            'birth_date' => '',
            'origin_place' => '',
            'education' => '',
            'occupation' => '',
            'phone_number' => '',
        ]);
        Occupant::where('id', $id)->update($validatedData);
        return redirect('/occupants')->with(['success' => 'Penghuni telah diubah']);

    }

    public function destroy($id) {
        Occupant::destroy($id);
        return redirect('/occupants')->with(['success' => 'Penghuni telah dihapus']);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $occupants = Occupant::where('name', 'like', "%$keyword%")
                    ->orWhere('phone_number', 'like', "%$keyword%")
                    ->get();

        return view('pages.occupants.index', [
            'occupants' => $occupants,
            'resource' => 'occupants'
        ]);
    }
}
