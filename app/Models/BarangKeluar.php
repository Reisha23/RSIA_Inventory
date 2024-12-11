<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangKeluar extends Model
{
    protected $table = 'out_item';
    protected $primaryKey = 'id_out';

    protected $fillable = [
        'users_id_username',
        'out_date',
        'total_out',
        'item_id_item'
    ];

    public $timestamps = false;

    // Relasi dengan model Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id_item', 'id_item');
    }
}
