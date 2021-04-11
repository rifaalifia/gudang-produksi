<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListBahanBaku extends Model
{
    protected $table = 'listbahanbaku';
    use HasFactory;
    protected $fillable=[
        "namabarang", "spesifikasi", "quantity", "untukmesin", "keterangan", "tanggalpengajuan", "status"
    ];
}
