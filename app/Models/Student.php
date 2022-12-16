<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

  protected $table = 'students';
  protected $fillable = ['name','class','rollno'];
    //Primary Key
  public $primaryKey = 'id';

  public function studentAddress()
  {
    return $this->hasMany(Student::class,'id');
  }
  public function studentSingleAddress()
  {
    
    return $this->hasOne(StudentAddress::class,'user_id');
  }
}
