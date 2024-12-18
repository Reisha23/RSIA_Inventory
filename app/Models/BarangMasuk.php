<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    protected $table = 'incoming_item';
    protected $primaryKey = 'id_incoming';

    protected $fillable = [
        'users_id_username',
        'incoming_date',
        'total_incoming',
        'item_id_item'
    ];

    public $timestamps = false;

    // Relasi dengan model Item
    public function item()
    {
        return $this->belongsTo(Item::class, 'item_id_item', 'id_item');
    }
}
