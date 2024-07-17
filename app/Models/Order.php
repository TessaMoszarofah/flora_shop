<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'user_id', 'produk_id', 'jumlah', 'tanggal', 'status'];

    protected $visible = ['id', 'user_id', 'produk_id', 'jumlah', 'tanggal', 'status'];

    protected $timetamps = true;

    public function Order()
    {
        return $this->hasMany(App\Http\Models\Transaksi::class);
    }

    public function Produk()
    {
        return $this->belongsTo(App\Models\Produk::class, 'produk_id');
    }

    public function User()
    {
        return $this->belongsTo(App\Models\User::class, 'user_id');
    }
}
