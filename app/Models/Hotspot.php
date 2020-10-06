<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotspot extends Model
{
    use HasFactory;
    protected $table = 'hotspot';
    protected $fillable = ['name','agent_point','phone'];

    public function stock()
    {
    	return $this->hasMany(Stock::class);
    }
}
