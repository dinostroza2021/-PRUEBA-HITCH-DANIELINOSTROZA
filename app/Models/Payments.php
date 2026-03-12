<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{
    use HasFactory;

       protected $fillable = [
        'id',
        'description',
        'price',
        'created_at',
        'updated_at',
        
    ];
}
