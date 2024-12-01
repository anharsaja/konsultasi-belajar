<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Consultation extends Model
{
    use HasFactory;


    protected $primaryKey = 'id'; // Custom primary key
    protected $fillable = [
        'mahasiswa_id', 'course_id', 'dosen_id', 'issue', 'status', 'reason_rejected', 'scheduled_time', 'note'
    ];

    public function setScheduledTimeAttribute($value)
    {
        // Menggunakan Carbon untuk memformat hanya tanggalnya
        $this->attributes['scheduled_time'] = Carbon::parse($value)->toDateString(); // Format menjadi 'Y-m-d'
    }

    /**
     * (Optional) Accessor jika ingin mengembalikan format yang lebih user-friendly saat ditampilkan.
     */
    public function getScheduledTimeAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d'); // Menampilkan 'Y-m-d'
    }

    /**
     * Relasi ke tabel User (mahasiswa).
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }

    /**
     * Relasi ke tabel User (dosen).
     */
    public function lecturer()
    {
        return $this->belongsTo(User::class, 'dosen_id', 'id');
    }

    /**
     * Relasi ke tabel Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Relasi ke tabel ConsultationNotes.
     */
}
