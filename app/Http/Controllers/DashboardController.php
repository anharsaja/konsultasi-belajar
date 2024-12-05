<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $consultations = Consultation::where('mahasiswa_id', Auth::user()->id)->get();


        // Hitung total dari kolom 'course' (asumsi kolom course berisi nilai numerik)
        $courses = Consultation::where('mahasiswa_id', Auth::user()->id)->count('course_id');

        // Ambil status terakhir dari konsultasi yang sedang login
        $lastest_status = Consultation::where('mahasiswa_id', Auth::user()->id)
            ->latest()  // Ambil yang terbaru berdasarkan waktu atau ID
            ->value('status');  // Ambil nilai status

        // Tentukan warna badge berdasarkan status
        $status_class = '';
        if ($lastest_status == 'approved') {
            $status_class = 'badge bg-success';
        } elseif ($lastest_status == 'rejected') {
            $status_class = 'badge bg-danger';
        } elseif ($lastest_status == 'pending') {
            $status_class = 'badge bg-warning';
        } elseif ($lastest_status == "rescheduled") {
            $status_class = "badge bg-primary";
        }
        return view('pages.dashboard.index', compact('consultations', 'courses', 'status_class', 'lastest_status'));
    }
}
