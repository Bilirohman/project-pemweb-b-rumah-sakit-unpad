<?php

namespace App\Models;

use CodeIgniter\Model;

class PesananObat extends Model
{
    protected $table = 'pesanan_obat';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'no_rawat',
        'nama_obat',
        'dosis',
        'jumlah',
        'satuan',
        'tanggal_masuk',
        'jam_masuk',
        'keterangan',
        'status',
        'created_at',
        'updated_at'
    ];

    // Optional: Auto-manage timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}


