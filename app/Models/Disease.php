<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disease extends Model
{
    use HasFactory;

    public $table = "disease";
    public $timestamps = false;
    protected $guarded = ['id'];    
}
