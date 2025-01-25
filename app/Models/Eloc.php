<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eloc extends Model
{
    // Specify custom table name
    protected $table = 'email_locations';

    protected $fillable = ['id', 'email', 'lat', 'lon'];
}
