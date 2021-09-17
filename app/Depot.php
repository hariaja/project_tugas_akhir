<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Depot extends Model
{
    protected $table = 'depot';
    protected $primaryKey = 'id_depot';
    protected $fillable = [
        'user_id', 'nama_depot', 'alamat_depot'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function pengiriman()
    {
        return $this->hasMany(Pengiriman::class, 'id_depot');
    }
}
