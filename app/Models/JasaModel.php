<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JasaModel extends Model
{
    use HasFactory;
    protected $table = 'jasa';
    //protected $primarykey = 'id';
    //protected $keyType = 'int';
    protected $fillable = [
        'kode_jasa',
        'jenis_jasa',
        'nama_jasa',
        'harga'
    ];
}