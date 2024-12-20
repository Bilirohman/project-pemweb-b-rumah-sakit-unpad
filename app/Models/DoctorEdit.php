<?php

namespace App\Models;

use CodeIgniter\Model;

class DoctorEdit extends Model
{
    protected $table = 'doctors';
    protected $primaryKey = 'nip';
    protected $allowedFields = ['name','hp', 'spesialisasi', 'no_izin_praktek   ', 'alumni',];
    protected $returnType = 'array';

    public function searchDoctorByName(string $name)
    {
        return $this->like('name', $name)->findAll();
    }

}
