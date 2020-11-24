<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setor extends Model
{
    use HasFactory;
    protected $table = 'setor';
    protected $fillable = [
    	'stock_id',
    	'jumlah_setor',
    	'tanggal_setor',
    ];

    public function stock()
    {
    	return $this->belongsTo(Stock::class);
    }
}
