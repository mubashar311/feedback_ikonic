<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\CommentService;
use Illuminate\Http\Request;

class UserCommentController extends Controller
{

    public function __construct(protected CommentService $commentService)
    {

    }
    public function comment(Request $request, Feedback $feedback)
    {
        $this->commentService->store($request->all(), $feedback);
        return back();
    }

}
