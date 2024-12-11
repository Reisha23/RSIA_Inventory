<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ItemType extends Model
{
    protected $table = 'item_type';
    protected $primaryKey = 'id_type';

    protected $fillable = [
        'item_type'
    ];

    public $timestamps = false;

    // Relasi dengan model Item
    public function items()
    {
        return $this->hasMany(Item::class, 'id_type', 'id_type');
    }
}
