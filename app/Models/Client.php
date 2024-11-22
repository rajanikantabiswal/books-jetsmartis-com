<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    protected $fillable = [
        'is_individual',
        'client_name',
        'country_code',
        'phone',
        'email',
        'whatsapp',
        'address',
        'country_id',
        'state_id',
        'city_id',
        'zip_code',
        'registration_type',
        'gst_no',
        'state_code',
        'pan_card',
        'is_active',
        'first_name',
        'last_name'
    ];
}
