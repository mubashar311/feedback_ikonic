<?php


namespace App\Services;

use App\Models\User;

class UserService
{

    public function getAllUsers()
    {
        return User::where('role','User')->paginate(10);
    }

    public function delete($user)
    {
        return User::find($user)->delete();
    }
}
