<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GroomService extends Model
{
    use HasFactory;
    use softDeletes;

    public $table = "groom_service";

    protected $guarded = ['id'];
    public static $rules = [ 
    'groom_name'=>'required',
    'price'=>'required|numeric',
    ];
}
