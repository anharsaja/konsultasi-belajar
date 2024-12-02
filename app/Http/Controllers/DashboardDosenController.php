<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardDosenController extends Controller
{
    public function index()
    {
      $dosenId = Auth::user()->id;
      $role = Auth::user()->role;
      $user = User::where([
        ["id","=", $dosenId],
        ["role", "=", $role],
      ])->firstOrFail(); 

      $courses = DB::table('dosen_courses')
      ->join('courses', 'dosen_courses.course_id', '=', 'courses.id')
      ->where('dosen_courses.dosen_id', $dosenId)
      ->select('courses.*')
      ->get()->count();


      $consultations = Consultation::where('dosen_id', $dosenId)->count();

      return view('pages.dashboard.dosen', compact('user', 'courses', 'consultations'));
    }

}
