<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Packet extends Model
{
    use HasFactory;
    protected $table = 'packet';
    protected $fillable = ['packet_name', 'price'];

    public function customers()
    {
    	return $this->hasMany(Customer::class);
    }
}
