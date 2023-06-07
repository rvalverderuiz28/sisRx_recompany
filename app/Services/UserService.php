<?php

namespace App\Services;
 
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Stmt\Return_;

class UserService 
{
    public function getSessionID()
    {
        $session_id = session()->getId();

        return $session_id;
    }

    public function getUserByUsername($username)
    {
        $user = User::where('email', $username)
                        ->first();

        return $user; 
    }

    public function updateSession()
    {
        $session_id = session()->getId();
        $user_update = User::where('id', Auth::user()->id)->first();
        $user_update->update([
            'sessionID' => $session_id,
        ]);
    }

    public function getUserBySession($sessionID)
    {
        $user = User::where('sessionID', $sessionID)
                        ->first();

        return $user; 
    }

    public function updateConnection($connectionID)
    {
        $user_update = User::where('id', Auth::user()->id)->first();
        $user_update->update([
            'connectionID' => $connectionID,
        ]);
    }
}