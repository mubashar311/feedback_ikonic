<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\VoteService;
use Illuminate\Http\Request;

class UserVoteController extends Controller
{

    public function __construct(protected VoteService $voteService)
    {

    }

    public function vote(Request $request, Feedback $feedback)
    {
        $this->voteService->store($request->all(), $feedback);
        return back();
    }
}
