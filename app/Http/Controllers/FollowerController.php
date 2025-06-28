<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Follower;
class FollowerController extends Controller
{
    public function followUnfollow(User $user)
    {
        $user->followers()->toggle(auth()->user());
        
        return response()->json([
            'followersCount' => $user->followers()->count(),
        ]);
    }
}
