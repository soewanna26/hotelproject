<?php

namespace App\Http\Controllers;

use App\Models\Gallery;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $rooms = Room::orderBy('created_at','Desc')->take(4)->get();
        $gallaries = Gallery::orderBy('created_at', 'DESC')->take(8)->get();
        return view('account.dashboard',[
            'rooms' => $rooms,
            'gallaries' => $gallaries
        ]);
    }
}
