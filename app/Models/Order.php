<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'transactioninfo';
	protected $primaryKey = 'id';
	public $timestamps = false;
	protected $fillable = ['customer_id','transaction_placed','status'];
}
