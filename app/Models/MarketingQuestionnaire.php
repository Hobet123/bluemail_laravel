<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MarketingQuestionnaire extends Model
{
    protected $table = 'marketing_questionnaire';
    protected $fillable = [
        'name',
        'age_range',
        'gender',
        'email',
        'phone',
        'country',
        'city',
        'occupation',
        'industry',
        'interests',
        'products',
        'communication_preference',
        'frequency',
        'feedback',
    ];
}
