<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pengiriman extends Model
{
    protected $table = 'pengiriman';
    protected $primaryKey = 'id_pengiriman';
    protected $fillable = [
        'id_depot', 'rit', 'm3', 'keterangan', 'status'
    ];

    public function depot()
    {
        return $this->belongsTo(Depot::class, 'id_depot');
    }

    public function pengiriman()
    {
        return $this->hasMany(DetailKirim::class, 'id_pengiriman');
    }
}
