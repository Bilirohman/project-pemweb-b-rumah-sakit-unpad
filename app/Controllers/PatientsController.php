<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\Appointment;

use CodeIgniter\Controller;

class PatientsController extends BaseController
{
    public function getPatientDashboard() : string{  
        
        // error, belum meretrive data pasien yg udah login



        return view('patient/patient_dashboard', [
            'title' => "Patient Dashboard",
            'styles' => [
                'dashboard.css'
            ]
        ]);
    }

    public function getbook(){
        return view('patient/book_appointment');
    }

    public function save()
    {
        // Load the request service
        $request = service('request');

        // Validate the input
        $validation = \Config\Services::validation();
        $validation->setRules([
            'nama'     => 'required|min_length[3]|max_length[100]',
            'no_telp'  => 'required|numeric|min_length[10]',
            'tanggal'  => 'required|valid_date[Y-m-d]',
        ]);

        if (!$validation->withRequest($request)->run()) {
            // Validation failed, return to the form with errors
            return redirect()->back()->withInput()->with('errors', $validation->getErrors());
        }

        // Retrieve form data
        $nama = $request->getPost('nama');
        $no_telp = $request->getPost('no_telp');
        $tanggal = $request->getPost('tanggal');

        
            $newAppointment = new Appointment();
            $newAppointment->save([
            'nama' => $nama,
            'hp' => $no_telp,
            'dateofappointment' => $tanggal,
         ]);

        // Redirect to a success page
        return redirect()->to('/book/success')->with('message', 'Appointment successfully booked!');
    }

    public function success(){
        return view('patient/Appointment_success');
    }
}
   

