<?php

namespace App\Http\Controllers;


use App\User;
use App\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

class NotificationController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Return notifications for the current user, in json format
    * @return json
    */
    public function getNotifications(){
        $user_notifications = Auth::user()->notifications;
       	return response()->json($user_notifications, 200);
    }

    public function deleteNotification(Request $request){
        $notification_id = $request->id;
        Notification::destroy($notification_id);
    }
}
