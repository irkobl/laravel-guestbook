<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
    public function show (Request $request) { 
        $user = User::find($request->user()->id);
        $feedback = $user->feedbacks()->orderBy('created_at', 'desc');               
        return view('dashboard', 
            ['dates' => $feedback->paginate(3)]
        );
    }
}
