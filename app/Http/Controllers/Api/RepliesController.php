<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\Api\ReplyRequest;
use App\Models\Reply;
use App\Models\Topic;
use App\Models\User;
use App\Transformers\ReplyTransformer;
use Illuminate\Http\Request;

class RepliesController extends Controller
{

    public function userIndex(User $user)
    {
        $replies = $user->replies()->paginate();
        return $this->response->paginator($replies,new ReplyTransformer());
    }

    public function index(Topic $topic)
    {
        $replies = $topic->replies()->paginate(5);
        return $this->response->paginator($replies,new ReplyTransformer());
    }

    public function destory(Topic $topic, Reply $reply)
    {
        if ( $reply->topic_id != $topic->id ) {
            return $this->response->errorBadRequest();
        }
        $this->authorize('destory',$reply);
        $reply->delete();

        return $this->response->noContent();

    }

    //
    public function store(ReplyRequest $request, Topic $topic, Reply $reply)
    {
        $reply->content = $request->content;
        $reply->topic_id = $topic->id;
        $reply->user_id = $this->user()->id;
        $reply->save();
        $user = User::find(1);
        $notifications = $user->notifications()->paginate();
        $reply->notifications = $notifications;
        $reply->user = $user;
        return $this->response->item($reply,new ReplyTransformer())->setStatusCode(201);
    }
}
