<?php

namespace App\Models;

use CodeIgniter\Model;

class Poliklinik extends Model
{
    protected $table = 'poliklinik'; 
    protected $primaryKey = 'id'; 
    protected $useAutoIncrement = true;

    protected $allowedFields = [
        'nama_poliklinik', 
        'lokasi', 
    ];

    protected $useTimestamps = false; 
}

