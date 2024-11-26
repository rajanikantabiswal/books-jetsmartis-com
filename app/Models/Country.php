<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $fillable = [
        'country_code',
        'country_name',
        'country_display_name'
    ];
}
