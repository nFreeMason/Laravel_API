<?php

namespace App\Policies;

use App\User;
use App\Models\Topic;

class TopicPolicy extends Policy
{
    public function update( User $user, Topic $topic)
    {
        return $user->id === $topic->user_id;
//        return true;
    }

    public function destroy(User $user, Topic $topic)
    {
        return $user->isAuthorOf($topic);
//        return true;
    }
}