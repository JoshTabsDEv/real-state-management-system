<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AgentApplication extends Model
{
    protected $table = 'agent_application';

    // Fillable fields (or guarded to prevent mass-assignment vulnerabilities)
    protected $fillable = [
        'user_id', 
        'agency_name', 
        'license_number', 
        'experience', 
        'is_approved'
    ];

    // Cast fields (if necessary)
    protected $casts = [
        'is_approved' => 'boolean', // Ensure `is_approved` is treated as a boolean
    ];

    // Relationship with the User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
