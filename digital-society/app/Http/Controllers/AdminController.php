<?php

namespace App\Http\Controllers;
use app\Models\societymember;
use app\Models\event;
use app\Models\notice;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        // Fetch data using Eloquent ORM
        $totalMembers = societymember::count(); // Get total society members
        $upcomingEvents = event::where('event_date', '>=', now())->get(); // Get upcoming events
        $latestNotices = notice::latest()->limit(5)->get(); // Get latest 5 notices

        // Pass data to the view
        return view('dashboard', [
            'totalMembers' => $totalMembers,
            'upcomingEvents' => $upcomingEvents,
            'latestNotices' => $latestNotices,
        ]);
    }
}
