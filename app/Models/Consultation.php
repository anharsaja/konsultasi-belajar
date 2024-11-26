<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consultation extends Model
{
    use HasFactory;


    protected $primaryKey = 'id'; // Custom primary key
    protected $fillable = [
        'mahasiswa_id', 'course_id', 'dosen_id', 'issue', 'status', 'reason_rejected', 'scheduled_time', 'note'
    ];

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
