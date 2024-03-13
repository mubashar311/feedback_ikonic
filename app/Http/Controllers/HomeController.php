<?php

namespace App\Http\Controllers;

use App\Services\FeedbackService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(protected FeedbackService $feedbackService)
    {
        $this->middleware('auth');
    }

   
    public function index()
    {
        return view('home', ['feedbacks' => $this->feedbackService->getAllPaginated()]);
    }
}
