<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpDepartment extends Model
{
    use HasFactory;

    protected $table = 'department';
    //Primary Key
   public $primaryKey = 'id';
}
