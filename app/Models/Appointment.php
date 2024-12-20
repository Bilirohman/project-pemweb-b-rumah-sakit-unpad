<?php

namespace App\Models;

use CodeIgniter\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama','hp', 'dateofappointment'];
    protected $returnType = 'array';

    /*public function delete($id)
    {
        return $this->db->table($this->table)->delete(['id' => $id]);
    }*/
}