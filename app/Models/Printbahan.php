<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Printbahan extends Model
{
    protected $table = 'produksi';
    use HasFactory;
    protected $fillable=[
        "namabarang", "spesifikasi", "quantity", "untukmesin", "keterangan", "tanggalpengajuan", "status",
    ];
}
