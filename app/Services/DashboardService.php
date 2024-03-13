<?php

namespace App\Services;

use App\Models\Comment;
use App\Models\Feedback;
use App\Models\User;
use App\Models\Vote;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardService{

    public function countAllUsers()
    {
        try {
            return User::where('role','User')->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function countAllFeedback()
    {
        try {
            return Feedback::all()->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function countAllVotes()
    {
        try {
            return Vote::all()->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function countAllComments($user)
    {
        try {
            return Comment::where('user_id',$user)->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function countUserFeedback($user)
    {
        try {
            return Feedback::where('user_id',$user)->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function countUserVotes($user)
    {
        try {
            return Vote::where('user_id',$user)->count();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }
   
   
}