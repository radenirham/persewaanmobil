<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengembalian extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "pengembalian";
    public $incrementing = true;
    protected $fillable = [
        'id',
        'id_platnomor',
        'total_harga_sewa',
    ];

    public function mobil() {
        return $this->belongsTo(Mobil::class, "id_platnomor","id");
    }
}
