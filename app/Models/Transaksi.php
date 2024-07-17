<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'order_id', 'total', 'status'];

    protected $visible = ['id', 'order_id', 'total', 'status'];

    protected $timetamps = true;

    public function Order()
    {
        return $this->belongsTo(App\Models\Order::class, 'order_id');
    }
}
