<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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
    public function candidates()
    {
        return $this->hasMany(Candidate::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function state(): BelongsTo
    {
        return $this->belongsTo(State::class);
    }
    public function city(): BelongsTo
    {
        return $this->belongsTo(City::class);
    }

    public function bankDetails()
    {
        return $this->hasOne(BankDetails::class);
    }
}
