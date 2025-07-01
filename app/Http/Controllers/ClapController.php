<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clap;
use App\Models\Post;
use App\Models\User;
class ClapController extends Controller
{
    public function clap(Post $post){

        $hasClapped = auth()->user()->hasClapped($post);
        if ($hasClapped) {
            $post->claps()->where('user_id', auth()->id())->delete();
        }else {
            // If the user has not clapped, create a new clap
            $post->claps()->create([
                'user_id' => auth()->id(),
            ]);
        }

        return response()->json([
            'status'=> 'success',
            'clapsCount' => $post->claps()->count(),
        ]);
    }
}
