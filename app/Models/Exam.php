<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Exam extends Model
{
    protected $fillable = [
      'exam_code',
      'exam_name',
      'vendor_id'
  ];

  public function vendor(): BelongsTo
    {
        return $this->belongsTo(Vendor::class);
    }
}
