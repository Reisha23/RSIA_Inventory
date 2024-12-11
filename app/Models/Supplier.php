<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    // Nama tabel sesuai dengan nama di database
    protected $table = 'suppliers';

    // Primary key
    protected $primaryKey = 'id_suppliers';

    // Kolom yang dapat diisi
    protected $fillable = [
        'suppliers',
        'contact',
        'suppliers_address'
    ];

    // Nonaktifkan timestamp jika tidak digunakan
    public $timestamps = false;
}
