<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $fillable = ['hotspot_id', 'qty', 'cost', 'description'];

    public function hotspot()
    {
    	return $this->belongsTo(Hotspot::class);
    }
}
