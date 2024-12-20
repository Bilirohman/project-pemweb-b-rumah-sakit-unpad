<?php

namespace App\Models;

use CodeIgniter\Model;

class Patient extends Model
{
    protected $table = 'patients'; 
    protected $primaryKey = 'no_rekam_medis'; 

    protected $allowedFields = [
        'no_rekam_medis',
        'nama_pasien', 
        'tanggal_lahir', 
        'nama_penanggung_jawab', 
        'hubungan_penanggung_jawab', 
        'alamat_penanggung_jawab', 
    ];

    protected $useTimestamps = false; 
}

