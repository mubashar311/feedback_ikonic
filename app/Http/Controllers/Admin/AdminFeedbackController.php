<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use App\Services\FeedbackService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminFeedbackController extends Controller
{
    const BASE_PATH = 'feedbacks.';
    public function __construct(protected FeedbackService $feedbackService)
    {
    }

    public function index($user)
    {
        return view(self::BASE_PATH . 'index', ['feedbacks' => $this->feedbackService->getAllPaginated()]);
    }

    public function show(Feedback $feedback)
    {
        return view('feedbacks.show', ['feedback' => $this->feedbackService->showOne($feedback)]);
    }

    public function commentStatus(Feedback $feedback)
    {
        $this->feedbackService->commentStatus($feedback);
        return back();
    }

    public function delete($feedback)
    {
        try {
            $this->feedbackService->delete($feedback);
            return redirect()->back();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }
}
