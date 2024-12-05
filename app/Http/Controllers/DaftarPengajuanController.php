<?php

namespace App\Http\Controllers;

use App\Models\Consultation;
use App\Models\Notification;
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
        try {
            DB::beginTransaction();
            $consultation = Consultation::findOrFail($id);

            $consultation->status = $request->status;

            if ($request->status == 'rejected') {
                $consultation->reason_rejected = $request->reason_rejected;
                Notification::updateOrCreate(
                    ['consultation_id' => $id],
                    [
                        'consultation_id' => $id,
                        'title' => "Ditolak",
                        'message' => 'Konsultasi anda ditolak karena ' . $request->reason_rejected,
                        'is_read' => false,
                    ]
                );
            } elseif ($request->status == 'rescheduled') {
                $consultation->scheduled_time = $request->scheduled_time;
                Notification::updateOrCreate(
                    ['consultation_id' => $id],
                    [
                        'consultation_id' => $id,
                        'title' => "Dijadwalkan Ulang",
                        'message' => 'Konsultasi anda dijadwalkan ulang pada tanggal ' . Carbon::parse($request->scheduled_time)->format('Y-m-d'),
                        'is_read' => false,
                    ]
                );
                $consultation->reason_rejected = '';
            } else {
                Notification::updateOrCreate(
                    ['consultation_id' => $id],
                    [
                        'consultation_id' => $id,
                        'title' => "Disetujui",
                        'message' => 'Konsultasi anda dijadwalkan pada tanggal ' . Carbon::parse($request->scheduled_time)->format('Y-m-d'),
                        'is_read' => false,
                    ]
                );
            }
            $consultation->save();

            DB::commit();
            return redirect()->route('daftar-pengajuan.index')
                ->with('success', 'Data berhasil diperbarui.');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
