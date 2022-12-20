<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpProfile extends Model
{
    use HasFactory;
    protected $table = 'employee_profile';
    //Primary Key
   public $primaryKey = 'id';

   public function employee()
    {
        return $this->hasMany(EmpProfile::class,'employee_id');
    }
    public function getImageAttribute($user = '')
    {
        if (!empty($user)) {
            return asset('/uploads/' . $user);
        }
        return asset('/images/default-profile.jpg');
    }
    
}
