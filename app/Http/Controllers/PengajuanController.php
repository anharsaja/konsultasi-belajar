<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\DosenCourse;
use App\Models\Consultation;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $consultations = Consultation::where('mahasiswa_id', Auth::user()->id)->get();
        return view('pages.pengajuan.index', compact('consultations'));
    }

    public function getDosenByCourse($courseId)
    {
        // Ambil dosen berdasarkan course_id
        $dosencourses = DosenCourse::where('course_id', $courseId)->with('lecturer')->get();

        // Kembalikan sebagai JSON
        return response()->json($dosencourses);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $courses = Course::all(); // Mengambil semua data dari tabel courses
        $dosencourses = DosenCourse::all();
        return view('pages.pengajuan.create', compact('courses', 'dosencourses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            "course_id" => "required",
            "dosen_id" => "required",
            "scheduled_time" => "required|date"
        ]);

        $consultations = Consultation::where([
            ["course_id" , "=", $request->course_id],
            ["dosen_id", "=", $request->dosen_id],
            ["status", "=", "pending"]
        ])->count();
        if ($consultations > 0) {
            return back()->with("error", "Pengajuan sebelumnya belum di selesaikan");
        }
        Consultation::create($request->all());

        $existingProgress = Progress::where('mahasiswa_id', Auth::user()->id)
            ->where('course_id', $request->course_id)
            ->exists();

        if (!$existingProgress) {
            // Jika progress belum ada, maka buat entri baru
            Progress::create([
                'mahasiswa_id' => Auth::user()->id,
                'course_id' => $request->course_id,
            ]);
        }
        return redirect()->route("pengajuan.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
