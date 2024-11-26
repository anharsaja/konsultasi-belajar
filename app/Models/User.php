<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primayKey = 'id';
    protected $fillable = ['name','username', 'password', 'email', 'role'];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function dosenCourses()
    {
        return $this->hasMany(DosenCourse::class, 'dosen_id', 'id');
    }

    /**
     * Relasi ke tabel Consultations.
     * Jika user adalah mahasiswa.
     */
    public function studentConsultations()
    {
        return $this->hasMany(Consultation::class, 'mahasiswa_id', 'id');
    }

    /**
     * Relasi ke tabel Consultations.
     * Jika user adalah dosen.
     */
    public function lecturerConsultations()
    {
        return $this->hasMany(Consultation::class, 'dosen_id', 'id');
    }

    /**
     * Relasi ke tabel Progress.
     * Jika user adalah mahasiswa.
     */
    public function progress()
    {
        return $this->hasMany(Progress::class, 'mahasiswa_id', 'id');
    }
}
