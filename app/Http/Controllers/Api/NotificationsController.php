<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Transformers\NotificationTransformer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationsController extends Controller
{

    public function stats()
    {
        return $this->response->array([     
            'unread_count' => $this->user()->notification_count,
        ]);
    }

    //
    public function index()
    {
        $notifications = $this->user->notifications()->paginate(20);
        return $this->response->paginator($notifications, new NotificationTransformer());
    }
}
