<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\EventHistory;

class ActivityController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $history = EventHistory::select()->orderby('created_at','desc')->paginate(8);
        return view('activity',compact('history'));
    }
}
