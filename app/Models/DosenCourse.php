<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DosenCourse extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Custom primary key
    protected $fillable = ['dosen_id', 'course_id'];

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
}
