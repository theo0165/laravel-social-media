<?php

namespace App\Policies;

use App\Models\Post;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Auth\Access\Response;

class PostPolicy
{
    use HandlesAuthorization;

    public function create(User $user)
    {
        return true;
    }

    public function delete(User $user, Post $post)
    {
        return ($post->user->id == $user->id || $user->is_admin) ?
            Response::allow() :
            Response::deny("Unauthorized");
    }
}
