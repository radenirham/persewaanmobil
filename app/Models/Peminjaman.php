<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "peminjaman";
    public $incrementing = true;
    protected $fillable = [
        'id',
        'id_merek',
        'awal_sewa',
        'akhir_sewa',
    ];

    public function mobil() {
        return $this->belongsTo(Mobil::class, "id_merek","id");
    }
}
