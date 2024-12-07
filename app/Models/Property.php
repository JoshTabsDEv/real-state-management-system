<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{

    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'price',
        'street',
        'state',
        'city',
        'postal_code',
        'country',
        'type',
        'status',
        'bedroom',
        'bathrooms',
        'size',
        'is_published',
        'owner_id',
        'agent_id'
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function images()
    {
        return $this->belongsTo(PropertyImage::class);
    }
}
