<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    
    use HasFactory;
    use softDeletes;
    
    public $table = "employee";

    protected $guarded = ['id'];
    public static $rules = [ 
    'lname'=>'required',
    'fname'=>'required',
    'phone'=>'digits_between:3,8',
    ];

}
