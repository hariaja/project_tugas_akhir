<?php

use App\Pengiriman;
use App\Pengemudi;
use App\Depot;

function jumlahPermintaan()
{
  return Pengiriman::count();
}

function jumlahSupir()
{
  return Pengemudi::count();
}

function permintaanPending()
{
  $pending = Pengiriman::where('status', '=', 'Proses')->count();
  return $pending;
}

function jumlahDepot()
{
  return Depot::count();
}
