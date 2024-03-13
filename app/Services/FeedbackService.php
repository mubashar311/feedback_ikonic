<?php

namespace App\Services;

use App\Models\Feedback;
use Illuminate\Support\Facades\Auth;

class FeedbackService{

    public function getAllPaginated()
    {
        return Feedback::paginate(10);
    }

    public function userFeedbacks()
    {
        return Auth::user()->feedbacks()->with('comments', 'votes')->paginate(10);
    }

    public function store($request)
    {
        $user = Auth::user();
        return $user->feedbacks()->create($request);
    }

    public function showOne($feedback)
    {
        return $feedback;
    }

    public function commentStatus($feedback)
    {
        $feedback->commenting = $feedback->commenting == 'enabled' ? 'disabled' : 'enabled';
        return $feedback->update();      
    }

    public function userFeedbackList($user){
        return Feedback::where('user_id',$user)->paginate(10);
    }

    public function delete($feedback)
    {
        return $feedback->delete();
    }
}