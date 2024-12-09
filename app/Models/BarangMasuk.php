<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BarangMasuk extends Model
{
    use HasFactory;

    protected $table = 'barang_masuk'; // Nama tabel
    protected $primaryKey = 'id_incoming'; // Primary key

    // Kolom yang bisa diisi secara massal
    protected $fillable = ['item_name', 'total_incoming', 'username', 'incoming_date'];

}
