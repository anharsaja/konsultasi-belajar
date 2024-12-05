<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AuthenticatedSessionController extends Controller
{
   public function create()
    {
        // return view('pages.auth.login');
            // Cek apakah user sudah login
        if (auth()->check()) {
        // Redirect ke home jika sudah login
            return redirect()->route('home');
    }

        // Tampilkan halaman login jika belum login
        return view('pages.auth.login');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
        ]);

        $credentials = $request->only('email', 'password');

        $user = Auth::attempt($credentials);

        if ($user) {
            $request->session()->regenerate();

            if (Auth::user()->role == 'mahasiswa') {
                $hasUnreadNotifications = DB::table('notifications')
                ->join('consultations', 'notifications.consultation_id', '=', 'consultations.id')
                ->where('consultations.mahasiswa_id', Auth::user()->id)
                ->where('notifications.is_read', false)
                ->exists();

                session(['unread_notifications' => $hasUnreadNotifications]);
                return redirect()->route('home');
                
            } else {
                return redirect()->route('dashboard');
                
            }

        }

        return back()->withErrors([
            'email' => 'Email dan Password tidak cocok',
        ]);
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
