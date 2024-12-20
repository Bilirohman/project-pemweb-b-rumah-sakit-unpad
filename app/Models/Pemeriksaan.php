<?php

namespace App\Models;

use CodeIgniter\Model;

class Pemeriksaan extends Model
{
    protected $table = 'pemeriksaan';
    protected $primaryKey = 'no_rawat';
    protected $allowedFields = [
        'no_rawat',
        'age', 'gender', 'blood_pressure', 'heart_rate', 
        'body_temperature', 'examination_date', 'symptoms', 'diagnosis', 
        'laboratory_results', 'notes', 'treatment', 'next_action'
    ];
    protected $useTimestamps = true; 
}


