<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alamat extends Model
{
    use HasFactory;

    public $fillable = [
        'user_id', 'nama_penerima', 'no_hp', 'alamat_lengkap', 'provinsi', 'kota', 'kode_pos', 'utama'
    ];
    public $visible = [
        'id', 'user_id', 'nama_penerima', 'no_hp',
        'alamat_lengkap', 'kode_pos', 'kota', 'provinsi',
    ];
    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
