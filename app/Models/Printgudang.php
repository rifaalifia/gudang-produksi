<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printgudang extends Model
{
    protected $table = 'gudang';
    use HasFactory;
    protected $fillable=[
        "namabarang", "jumlah", "satuan", "tanggalmasuk", "tanggalkeluar"
    ];
}
