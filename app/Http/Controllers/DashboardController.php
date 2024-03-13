<?php

namespace App\Http\Controllers;

use App\Services\DashboardService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function __construct(protected DashboardService $dashboardService) {
        
    }

    public function dashboard()
    {
        try {
            if (Auth::user()->role == 'Admin') {
                $countAllUsers = $this->dashboardService->countAllUsers();
                $countAllFeedback = $this->dashboardService->countAllFeedback();
                $countAllVotes = $this->dashboardService->countAllVotes();
                $data = [
                    'countAllUsers' => $countAllUsers,
                    'countAllFeedback' => $countAllFeedback,
                    'countAllVotes' => $countAllVotes,
                ];
            }else {
                $countFeedbackComments = $this->dashboardService->countAllComments(Auth::user()->id);
                $countAllFeedback = $this->dashboardService->countUserFeedback(Auth::user()->id);
                $countAllVotes = $this->dashboardService->countAllVotes(Auth::user()->id);
                $data = [
                    'countFeedbackComments' => $countFeedbackComments,
                    'countAllFeedback' => $countAllFeedback,
                    'countAllVotes' => $countAllVotes,
                ]; 
            }
            return view('dashboard',['data'=>$data]);
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }
}
