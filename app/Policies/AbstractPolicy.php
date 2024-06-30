<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use Illuminate\Support\Facades\Auth;

abstract class AbstractPolicy
{
    public function before(User $user, Post $post): ?Response
    {
        if(in_array(Auth::user()->email, config('settings.roots', []))){
            return Response::allow();
        }
    }
}
