<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use App\Services\FeedbackService;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function __construct(protected FeedbackService $feedbackService)
    {

    }

    public function index()
    {
        return view('feedbacks.all-feedbacks', ['feedbacks' => $this->feedbackService->getAllPaginated()]);
    }

    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', ['feedback' => $this->feedbackService->showOne($feedback)]);
    }
}
