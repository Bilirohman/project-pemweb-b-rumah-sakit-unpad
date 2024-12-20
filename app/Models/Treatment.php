<?php

namespace App\Models;

use CodeIgniter\Model;

class Treatment extends Model
{
    protected $table = 'treatments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['patient_id', 'doctor_id', 'diagnosis', 'treatment_plan', 'treatment_date', 'created_at'];
    protected $returnType = 'array';

    // Validation rules
    protected $validationRules = [
        'patient_id' => 'required|integer',
        'doctor_id' => 'required|integer',
        'treatment_date' => 'required|valid_date'
    ];
}
