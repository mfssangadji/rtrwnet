<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;
    protected $table = 'invoice';
    protected $fillable = ['customer_id', 'invoice_number', 'status'];

    public function customer()
    {
    	return $this->belongsTo(Customer::class);
    }

    public function payment()
    {
    	return $this->hasOne(Payment::class)->latest();
    }
}
