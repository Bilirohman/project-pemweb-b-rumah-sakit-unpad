<?php

namespace App\Models;

use CodeIgniter\Model;

class JadwalPraktek extends Model
{
    protected $table = 'jadwal_praktek';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'nip',
        'hari',
        'jam',
        'created_at',
        'updated_at'
    ];

    // Optional: Auto-manage timestamps
    protected $useTimestamps = true;
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
}
