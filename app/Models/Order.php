<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Produk;
use App\Models\User;
use App\Models\Transaksi;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'produk_id', 'alamat', 'kota', 'kode_pos', 'phone', 'email', 'metode_pembayaran', 'status', 'total'];

    protected $visible = ['id', 'user_id', 'produk_id', 'alamat', 'kota', 'kode_pos', 'phone', 'email', 'metode_pembayaran', 'status', 'total'];

    public $timestamps = true;

    public function Order()
    {
        return $this->hasMany(Transaksi::class);
    }

    public function Produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    public function User()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function Transaksi()
    {
        return $this->hasMany(Transaksi::class, 'user_id');
    }
}
