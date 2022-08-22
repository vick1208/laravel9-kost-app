<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Location;

//   GET|HEAD        rooms ................... rooms.index › RoomController@index
//   POST            rooms ................... rooms.store › RoomController@store
//   GET|HEAD        rooms/create .......... rooms.create › RoomController@create
//   GET|HEAD        rooms/{room} .............. rooms.show › RoomController@show
//   PUT|PATCH       rooms/{room} .......... rooms.update › RoomController@update
//   DELETE          rooms/{room} ........ rooms.destroy › RoomController@destroy
//   GET|HEAD        rooms/{room}/edit ......... rooms.edit › RoomController@edit

class RoomController extends Controller
{
    public function index() {
        $rooms = Room::all()->sortBy('code');
        return view('pages.rooms.index', [
            'rooms' => $rooms,
            'resource' => 'rooms'
        ]);
    }

    public function show($id) {
        $room = Room::find($id);
        return view('pages.rooms.detail', [
            'room' => $room
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

    public function edit($id) {
        return view('pages.rooms.edit', [
            'room' => Room::find($id),
            'locations' => Location::all()
        ]);
    }   

    public function update(Request $request, $id) {
        $validatedData = $request->validate([
            'code' => 'required',
            'location_id' => 'required',
            'capacity' => ''
        ]);
        Room::where('id', $id)->update($validatedData);
        return redirect('/rooms')->with(['success' => 'Data kamar telah diubah']);
    }
    
    public function destroy($id) {
        Room::destroy($id);
        return redirect('/rooms')->with(['success' => 'Data kamar telah dihapus']);
    }

    public function search(Request $request) {
        $keyword = $request->keyword;

        $rooms = Room::where('code', 'like', "%$keyword%")->get();

        return view('pages.rooms.index', [
            'rooms' => $rooms,
            'resource' => 'rooms'
        ]);
    }
}
