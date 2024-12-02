<?php

namespace App\Http\Controllers;

use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ProgressBelajar extends Controller
{
    public function index()
    {
        $dosen_id = Auth::user()->id;

        $students = DB::select(
            "SELECT DISTINCT 
                        users.id AS student_id,
                        users.name AS student_name,
                        courses.id AS course_id,
                        courses.course_name AS course_name
                    FROM users
                    JOIN progress ON users.id = progress.mahasiswa_id
                    JOIN courses ON progress.course_id = courses.id
                    JOIN dosen_courses ON courses.id = dosen_courses.course_id
                    WHERE dosen_courses.dosen_id = ?",
            [$dosen_id]

        );
        return view('pages.progressbelajar.index', compact('students'));
    }


    public function editProgressMhs(string $studentId, string $courseId)
    {
        $progress = Progress::where('mahasiswa_id', $studentId)
        ->where('course_id', $courseId)
        ->first();

        return view('pages.progressbelajar.edit', compact('progress'));
    }

    public function updateProgressMhs(Request $request, string $id)
    {
        $request->validate([
            "progress_detail" => "required",
        ]);

        $progress = Progress::findOrFail($id);

        $progress->progress_detail = $request->progress_detail;
        $progress->save();

        return redirect()->route('progressbelajarmhs')
        ->with('success', 'Data berhasil diperbarui.');
        
    }
}
