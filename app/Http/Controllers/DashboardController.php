<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function show (Request $request) { 
        $user = User::find($request->user()->id);        
        return view('dashboard', 
            ['dates' => $user->feedbacks()->paginate(3)]
        );
    }
}
