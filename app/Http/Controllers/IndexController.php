<?php

namespace App\Http\Controllers;

use App\Models\Feedback;

class IndexController extends Controller
{
    public function feedback () {

        $feedback = Feedback::with('user')->orderBy('created_at', 'desc');
        
        return view ('welcome', 
            ['feedbacks' => $feedback->paginate(3)]
        );
    }
}
