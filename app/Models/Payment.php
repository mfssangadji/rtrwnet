<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;
    protected $table = 'payment';
    protected $fillable = ['customer_id', 'invoice_id', 'bill_cost'];

    public function invoice()
    {
    	return $this->belongsTo(Invoice::class);
    }
}
