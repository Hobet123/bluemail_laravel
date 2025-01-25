<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapAddress extends Model
{
    use HasFactory;

    protected $fillable = ['lat', 'lng', 'address', 'ip', 'email'];
}