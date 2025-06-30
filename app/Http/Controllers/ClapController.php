<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clap;
use App\Models\Post;
use App\Models\User;
class ClapController extends Controller
{
    public function clap(Post $post){
        $post->claps()->create([
            'user_id' => auth()->id(),
        ]);
        return response()->json([
            'message' => 'Clap added successfully',
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
