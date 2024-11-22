<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Vendor extends Model
{
    protected $fillable = [
        'vendor_name',
        'is_active'
    ];

    public function exams(): HasMany
    {
        return $this->hasMany(Exam::class);
    }
}
