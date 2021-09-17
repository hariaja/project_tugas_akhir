<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengemudi extends Model
{
    protected $table = 'pengemudi';
    protected $primaryKey = 'id_pengemudi';
    protected $fillable = [
        'nip', 'nama_pengemudi', 'no_kendaraan', 'alamat'
    ];

    public function pengemudi()
    {
        return $this->hasMany(DetailKirim::class, 'id_pengemudi');
    }
}
