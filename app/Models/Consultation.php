<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Consultation extends Pivot
{
    //
    use HasFactory;
    public $table = "consultation";
    protected $guarded = ['id'];

}
