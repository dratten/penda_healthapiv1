<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications;

class NotificationsController extends Controller
{
    public function getNotifications()
    {
        $notifications = Notifications::all()->sortBy("time");
        return response()->json([
            'notifications' => $notifications
        ]);
    }
}
