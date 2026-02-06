<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index()
    {
        // Marcar TODAS como leídas
        auth()->user()->unreadNotifications->markAsRead();

        return view('notifications.index');
    }
}
