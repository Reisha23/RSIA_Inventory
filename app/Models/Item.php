<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = 'item';
    protected $primaryKey = 'id_item';

    protected $fillable = [
        'id_type',
        'item_name',
        'total_stock'
    ];

    public $timestamps = false;

    // Relasi dengan model ItemType
    public function itemType()
    {
        return $this->belongsTo(ItemType::class, 'id_type', 'id_type');
    }

    // Relasi dengan incoming items
    public function incomingItems()
    {
        return $this->hasMany(BarangMasuk::class, 'item_id_item', 'id_item');
    }

    // Relasi dengan out items
    public function outItems()
    {
        return $this->hasMany(BarangKeluar::class, 'item_id_item', 'id_item');
    }
}
