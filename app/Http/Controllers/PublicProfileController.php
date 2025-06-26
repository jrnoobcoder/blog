<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PublicProfileController extends Controller
{
    public function show(User $user)
    {
        $posts = $user->posts()->latest()->simplePaginate(10);
        return view('profile.show', [
            'user' => $user,
            'posts' => $posts,
        ]);
    }
}
