<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Company extends Model
{
    protected $fillable = [
      'company_name',
      'display_name',
      'is_active'
  ];

  public function candidates(){
    return $this->hasMany(Candidate::class);
  }
}
