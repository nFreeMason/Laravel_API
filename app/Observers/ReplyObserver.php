<?php

namespace App\Observers;

use App\Models\Reply;
use App\Notifications\TopicReplied;

class ReplyObserver
{
    public function deleted(Reply $reply)
    {
        $reply->topic->decrement('reply_count',1);
    }

    public function created(Reply $reply)
    {
        $topic = $reply->topic;
        dump($topic);
        $topic->title = 'test';
        $topic->save();
        dd($reply->topic);
        $reply->topic->increment('reply_count',1);
        // 广播
//        broadcast(new RepliesEvent($reply));
        // 通知作者话题被回复了
        if ( ! $reply->user->isAuthorOf($topic) ) {
            $topic->user->notify(new TopicReplied($reply));
        }
    }

    public function creating(Reply $reply)
    {
        //
        $reply->content = $reply->content.'user_topic_body';
    }

    public function updating(Reply $reply)
    {
        //
    }
}
