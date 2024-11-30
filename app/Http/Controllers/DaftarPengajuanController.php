<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DaftarPengajuanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $dosen_id = Auth::user()->id;

        try {
            $consultations = DB::select(
                "SELECT 
                            consultations.id,
                            consultations.issue,
                            consultations.status,
                            consultations.scheduled_time,
                            consultations.note,
                            students.name AS student_name,
                            students.id AS student_id,
                            courses.course_name
                        FROM consultations
                        INNER JOIN courses ON consultations.course_id = courses.id
                        INNER JOIN dosen_courses ON courses.id = dosen_courses.course_id
                        INNER JOIN users AS students ON consultations.mahasiswa_id = students.id
                        WHERE dosen_courses.dosen_id = ? 
                        ORDER BY consultations.created_at DESC",
                [$dosen_id]
            );

            foreach ($consultations as $consultation) {
                $consultation->preferred_time = Carbon::parse($consultation->scheduled_time)->format('Y-m-d');
                $consultation->issue = Str::limit($consultation->issue, 50, '...');
            }

            
            return view("pages.daftarpengajuan.index", compact("consultations"));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function catatanKonsultasi(string $id)
    {
       
        try {
            $consultation = collect(DB::select(
                "SELECT 
                            consultations.id,
                            consultations.issue,
                            consultations.status,
                            consultations.note
                        FROM consultations
                        WHERE consultations.id = ?",
                [$id]
            ))->first();
            return view("pages.daftarpengajuan.catatanhasil", compact("consultation"));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    public function storeCatatanHasil(Request $request, string $id)
    {

        $request->validate([
            "note" => "required|string",
        ]);

        try {
        $consultation = Consultation::findOrFail($id);

        $consultation->note = $request->note;
        $consultation->save();


        return redirect()->route('daftar-pengajuan.index')
        ->with('success', 'Catatan berhasil ditambahkan.');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }


    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $consultation = collect(DB::select(
                "SELECT 
                            consultations.id,
                            consultations.issue,
                            consultations.status,
                            consultations.scheduled_time,
                            consultations.note,
                            consultations.reason_rejected,
                            students.name AS student_name,
                            courses.course_name
                        FROM consultations
                        INNER JOIN courses ON consultations.course_id = courses.id
                        INNER JOIN users AS students ON consultations.mahasiswa_id = students.id
                        WHERE consultations.id = ? 
                        ORDER BY consultations.created_at DESC",
                [$id]
            ))->first();
            // dd($consultation);
            return view("pages.daftarpengajuan.detail", compact("consultation"));
        } catch (\Exception $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id) 
    {
        $consultation = Consultation::findOrFail($id);

        $consultation->status = $request->status;

        if ($request->status == 'rejected') {
            $consultation->reason_rejected = $request->reason_rejected;
        } elseif ($request->status == 'rescheduled') {
            $consultation->scheduled_time = $request->scheduled_time;
            $consultation->reason_rejected = '';
        }

        $consultation->save();

        return redirect()->route('daftar-pengajuan.index')
        ->with('success', 'Data berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
