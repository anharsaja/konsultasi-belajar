<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $primaryKey = 'id'; // Custom primary key
    protected $fillable = ['course_name', 'course_code'];


    public function lecturerCourses()
    {
        return $this->hasMany(DosenCourse::class, 'course_id', 'id');
    }

    /**
     * Relasi ke tabel Consultations.
     */
    public function consultations()
    {
        return $this->hasMany(Consultation::class, 'course_id', 'id');
    }

    /**
     * Relasi ke tabel Progress.
     */
    public function progress()
    {
        return $this->hasMany(Progress::class, 'course_id', 'id');
    }
}
