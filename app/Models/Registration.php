<?php

namespace App\Models;

use CodeIgniter\Model;

class Registration extends Model
{
    protected $table = 'registrations'; 
    protected $primaryKey = 'id'; 
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'no_registrasi', 
        'no_rawat', 
        'cara_masuk', 
        'tanggal_daftar', 
        'doctor_nip', 
        'poliklinik_id', 
        'jenis_bayar', 
        'asal_rujukan', 
        'no_rekam_medis'
    ];

    protected $useTimestamps = false; 
}
