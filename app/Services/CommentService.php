<?php

namespace App\Services;

use Illuminate\Support\Facades\Auth;

class CommentService{

    public function store($request, $feedback)
    {
        $user = Auth::user();
        return $user->comments()->create([
            'feedback_id' => $feedback->id,
            'content' => $request['content']
        ]);
    }
}