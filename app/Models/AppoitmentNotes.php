<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppoitmentNotes extends Model
{
    /** @use HasFactory<\Database\Factories\AppoitmentNotesFactory> */
    use HasFactory;

    protected $fillable = [
        'appointment_id',
        'note',
    ];

    public function appointment()
    {
        return $this->belongsTo(Appointment::class);
    }
}
