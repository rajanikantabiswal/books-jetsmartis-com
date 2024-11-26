<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankDetails extends Model
{
    protected $fillable = [
        'client_id',
        'bank_name',
        'account_number',
        'ifsc',
        'beneficiary',
    ];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
