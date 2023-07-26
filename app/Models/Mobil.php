<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $table = "mobil";
    public $incrementing = true;
    protected $fillable = [
        'id',
        'merek',
        'model',
        'platnomor',
        'tarifsewa',
    ];
}
