<?php


namespace App\Services;

use App\Models\Comment;
use App\Models\Vote;
use Illuminate\Support\Facades\Auth;

class VoteService{

    public function store($request, $feedback)
    {
        $user = Auth::user();
        $comment = Vote::where('feedback_id', $feedback->id)->where('user_id', $user->id)->first();
        if($comment)
        {
            $comment->status = !$comment->status;
            $comment->update();
        }
        else{           
            $feedback->votes()->create([
                'user_id' => $user->id
            ]);
        }

        
    }    
}