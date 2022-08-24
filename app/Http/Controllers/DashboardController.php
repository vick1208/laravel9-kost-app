<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Occupant;
use App\Models\Placement;

class DashboardController extends Controller
{
    public function index(Request $request) {
        $rooms = Room::all();
        $occupants = Occupant::all();
        $placements = Placement::all();
        $placements_not_available = Placement::selectRaw('room_id, count(*) as placement_num')
            ->groupBy('room_id')
            ->whereNotNull('check_in_date')
            ->whereNull('check_out_date')
            ->get();

        return view('pages.index', [
            'latest_occupants' => Occupant::latest()->limit(5)->get(),
            'latest_placements' => Placement::latest()->limit(5)->get(),
            'num_of_rooms' => $rooms->count(),
            'num_of_rooms_unavailable' => count($placements_not_available),
            'num_of_occupants' => $occupants->count(),
        ]);
    }
}
