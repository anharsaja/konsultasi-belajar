<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Notification;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class NotificationController extends Controller
{
  public function pageNotification()
  {
    $mahasiswa_id = Auth::user()->id;
    $notifications = DB::select(
      "SELECT 
                  notifications.id,
                  notifications.title,
                  notifications.consultation_id,
                  notifications.message,
                  notifications.is_read,
                  notifications.created_at
              FROM notifications
              INNER JOIN consultations ON notifications.consultation_id = consultations.id
              INNER JOIN users AS students ON consultations.mahasiswa_id = students.id
              WHERE students.id = ?
              ORDER BY notifications.created_at DESC",
      [$mahasiswa_id]
    );

    $hasUnreadNotifications = DB::table('notifications')
      ->join('consultations', 'notifications.consultation_id', '=', 'consultations.id')
      ->where('consultations.mahasiswa_id', $mahasiswa_id)
      ->where('notifications.is_read', false)
      ->exists();

    return view("pages.notification.index", compact("notifications", "hasUnreadNotifications"));
  }

  public function markAsRead()
  {
    $mahasiswa_id = Auth::user()->id;
    $notifications = Notification::join('consultations', 'notifications.consultation_id', '=', 'consultations.id')
      ->join('users as students', 'consultations.mahasiswa_id', '=', 'students.id')
      ->where('students.id', $mahasiswa_id)
      ->where('notifications.is_read', false)
      ->orderBy('notifications.created_at', 'DESC')
      ->select('notifications.*')
      ->get();

    // Perbarui semua menjadi is_read = true
    foreach ($notifications as $notification) {
      $notification->is_read = true;
      $notification->save();
    }

    session(['unread_notifications' => false]);

    return redirect()->route('notification');
  }
}
