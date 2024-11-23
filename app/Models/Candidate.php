<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Candidate extends Model
{
  use HasFactory;
  protected $fillable = [
    'first_name',
    'last_name',
    'country_code',
    'phone',
    'email_id',
    'company_id',
    'exam_id',
    'vendor_id',
    'conducted_date',
    'conducted_by',
    'client_id',
    'status',
    'remark'
  ];

  public function company()
  {
    return $this->belongsTo(Company::class);
  }
  public function client()
  {
    return $this->belongsTo(Client::class);
  }
  public function exam()
  {
    return $this->belongsTo(Exam::class);
  }
  public function vendor()
  {
    return $this->belongsTo(Vendor::class);
  }
  public function conducted_user()
  {
      return $this->belongsTo(User::class, 'conducted_by');
  }

 
}
