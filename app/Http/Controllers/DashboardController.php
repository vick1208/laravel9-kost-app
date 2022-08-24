<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Placement;

class DashboardController extends Controller
{
    public function index() {
        $rooms = Room::all();
        $latest_placements = Placement::whereNotNull('check_in_date')
            ->whereNull('check_out_date')
            ->latest()
            ->limit(5)
            ->get();
        $active_occupants = Placement::selectRaw('occupant_id, count(*) as placement_num')
            ->groupBy('occupant_id')
            ->whereNotNull('check_in_date')
            ->whereNull('check_out_date')
            ->get();
        $placements_not_available = Placement::selectRaw('room_id, count(*) as placement_num')
            ->groupBy('room_id')
            ->whereNotNull('check_in_date')
            ->whereNull('check_out_date')
            ->get();

        return view('pages.index', [
            'latest_placements' => $latest_placements,
            'num_of_rooms' => $rooms->count(),
            'num_of_rooms_unavailable' => count($placements_not_available),
            'num_of_occupants' => count($active_occupants),
        ]);
    }
}
