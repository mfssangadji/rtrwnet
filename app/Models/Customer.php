<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
    	'packet_id',
    	'name',
    	'address',
    	'phone',
    	'status',
    ];

    public function packet()
    {
    	return $this->belongsTo(Packet::class);
    }

    public function invoice()
    {
    	return $this->hasOne(Invoice::class)->latest();
    }
}
