<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKirim extends Model
{
    protected $table = 'detail_pengiriman';
    protected $primaryKey = 'id_detail';
    protected $fillable = [
        'id_pengiriman', 'id_pengemudi'
    ];

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function pengemudi()
    {
        return $this->belongsTo(Pengemudi::class, 'id_pengemudi');
    }
}
