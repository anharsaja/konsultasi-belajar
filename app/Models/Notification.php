<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
        /**
     * Relasi ke model Consultation.
     */
    public function consultation()
    {
        return $this->belongsTo(Consultation::class);
    }

    /**
     * Relasi tidak langsung ke user melalui Consultation.
     */
    public function user()
    {
        return $this->consultation->student();
    }
}
