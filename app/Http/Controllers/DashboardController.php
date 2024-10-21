<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\RequestInventory;
use App\Http\Controllers\Controller;
use App\Models\RequestRoom;

class DashboardController extends Controller
{
    public function index(Request $request)
    {   
        $users = User::count();
        $request_inventories = RequestInventory::count();
        $request_rooms = RequestRoom::count();
        if($request->has('search')){
            $announcements = Announcement::where('title', 'LIKE', '%' . $request->search . '%')->paginate(5);
        }else{
            $announcements = Announcement::orderBy('created_at', 'desc')->paginate(5);
        }
        return view('pages.dashboard.main', compact('users', 'request_inventories', 'request_rooms', 'announcements'));
    }
}
