<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Paket extends Model
{
    protected $table = 'paket';
    protected $primaryKey = 'id_paket';
    protected $fillable = ['nama', 'harga_total', 'id_paket_makanan'];

    protected $casts = [
        'id_makanan' => 'array',
    ];



    public function PaketMakanan()
    {
        return $this->belongsToMany(paketMakanan::class, 'id_paket_makanan');
    }

    public function hargaTotal()
    {
        $totalHarga = 0;
        $totalHarga += $this->PaketMakanan->harga_total;
        $paketMakananIds = is_array($this->id_paket_makanan) ? $this->id_paket_makanan : json_decode($this->id_paket_makanan, true);

        foreach ($paketMakananIds as $paketMakananId) {
            $paketMakanan = paketMakanan::find($paketMakananId);
            if ($paketMakanan) {
                $totalHarga += $paketMakanan->harga_total;
            }
        }

        return $totalHarga;
    }
}