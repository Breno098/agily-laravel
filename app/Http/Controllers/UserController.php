<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function timelogs()
    {
        $users = User::all();
        $users->append(['user_id', 'seconds_logged']);

        return response()->json($users);
    }
}
