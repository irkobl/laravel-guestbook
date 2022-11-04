<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Mail\MailFeedback;
use App\Models\Feedback;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class CreateReviewController extends Controller
{   

    public function show () {                
        return view('create');
    }

    public function create (Request $request) {        

        $data = new Feedback();
        $data->raiting = $request->input('raiting');
        $data->name = $request->input('name');
        $data->feedback = $request->input('feedback');
        
        $user = User::find($request->user()->id); 
               
        if ($user->feedbacks()->save($data)) { 

            $dateForView = $user->feedbacks()->orderBy('created_at', 'desc')->take(1)->get();

            Mail::to($user->email)->send(new MailFeedback($dateForView, $user));

            return redirect()->route('dashboard');
        }     
    }
}