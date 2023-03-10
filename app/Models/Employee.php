<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $table = 'employee';
  protected $fillable = ['name','department_id','address','employee_no'];

    public $primaryKey = 'id';

  public function departmentRelation()
    {

       return $this->belongsTo(EmpDepartment::class,'department_id');
    }

  public function employeeMultipleProfile()
    {
    
      return $this->hasMany(EmpProfile::class,'employee_id');
    }




    // public function empProfile()
    // {
    //   return $this->hasMany(Employee::class,'id');
    // }

    // public function getImageAttribute($user = '')
    // {
    //     if (!empty($user)) {
    //         return asset('/uploads/' . $user);
    //     }
    //     return asset('/images/default-profile.jpg');
    // }
}
