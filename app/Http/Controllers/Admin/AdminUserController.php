<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\UserService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    const BASE_PATH = 'users.';
    public function __construct(protected UserService $userService)
    {
    }

    public function index()
    {
        try {
            return view(self::BASE_PATH . 'index', ['users' => $this->userService->getAllUsers()]);
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }

    public function destroy($user)
    {
        try {
            $this->userService->delete($user);
            return redirect()->back();
        } catch (Exception $exception) {
            DB::rollback();
            Log::error($exception->getMessage() . ' ' . $exception->getLine());
            return redirect()->back()->withInput();
        }
    }
}
