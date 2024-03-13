<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreFeedbackRequest;
use App\Models\User;
use App\Models\Feedback;
use Illuminate\Http\Request;
use App\Services\FeedbackService;


class UserFeedbackController extends Controller
{

    const BASE_PATH = 'feedbacks.';

    public function __construct(protected FeedbackService $feedbackService)
    {
    }

    public function index()
    {
        return view(self::BASE_PATH . 'index', ['feedbacks' => $this->feedbackService->userFeedbacks()]);
    }

    public function create()
    {
        return view(self::BASE_PATH . 'create');
    }

    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', ['feedback' => $this->feedbackService->showOne($feedback)]);
    }

    public function store(StoreFeedbackRequest $request)
    {
        $this->feedbackService->store($request->all());
        return redirect()->route('feedbacks.index');
    }

    
}
