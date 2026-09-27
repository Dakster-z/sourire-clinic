<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    use HasFactory;

    protected $fillable = [
        'reference_code',
        'name',
        'phone',
        'email',
        'treatment',
        'preferred_slot',
        'preferred_date',
        'message',
        'ip_address',
        'notification_preview',
        'status',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];
}
