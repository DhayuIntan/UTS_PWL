<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;
    protected $table = 'transaksis';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'mobil',
        'plat',
        'tanggal_transaksi',
    ];
}
