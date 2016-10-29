<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Events;
use Illuminate\Http\Request;

use App\Http\Requests;

class Dashboard extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $events = Events::all();
        $preferences = Events::preferences()->get();

//        dd( \App\Helpers\Events::userConfirmed(1) );

        return view('pages.dashboard', [
            'categories' => $categories,
            'events' => $events,
            'preferences' => $preferences
        ]);
    }
}
