<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Progress extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Custom primary key
    protected $fillable = ['mahasiswa_id', 'course_id', 'progress_detail'];

    /**
     * Relasi ke tabel User (mahasiswa).
     */
    public function student()
    {
        return $this->belongsTo(User::class, 'mahasiswa_id', 'id');
    }

    /**
     * Relasi ke tabel Course.
     */
    public function course()
    {
        return $this->belongsTo(Course::class, 'course_id', 'id');
    }

    /**
     * Relasi ke tabel User (dosen yang memperbarui progress).
     */
    // public function updatedBy()
    // {
    //     return $this->belongsTo(User::class, 'updated_by', 'user_id');
    // }
}
