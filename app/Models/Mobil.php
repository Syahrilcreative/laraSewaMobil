<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    use HasFactory;
    protected $fillable = [
        'merek',
        'model',
        'nmrPlat',
        'tarif',
        'image'
    ];
    public function transaksis()
    {
        return $this->hasMany(Transaksi::class);
    }
}
