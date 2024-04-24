<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomOrder extends Model
{
    use HasFactory;
    protected $fillable = [
        'customer_uuid',
        'height',
        'weight',
        'shoulder',
        'bust',
        'waist',
        'hips',
        'thigh',
        'leg_opening',
        'phone',
        'description',
        'status',
        'uuid'
    ];
}
