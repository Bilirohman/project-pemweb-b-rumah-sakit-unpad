<?php

namespace App\Controllers;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

use App\Models\Doctor;
use App\Models\DoctorEdit;
use App\Models\JadwalPraktek;
use App\Models\Registration;
use App\Models\Poliklinik;
use App\Models\Patient;
use App\Models\PesananObat;
use \App\Models\Appointment;
use \App\Models\Pemeriksaan;

use CodeIgniter\Controller;

class DashboardController extends BaseController
{
    
    public function getDashboard()
    {
        $doctorModel = new Doctor();

        $searchKey = $this->request->getGet('search') ?? '';

        if ($searchKey) {
            $data['doctors'] = $doctorModel->like('name', $searchKey)->paginate(20);
        } else {
            $data['doctors'] = $doctorModel->paginate(50);
        }

        $data['pager'] = $doctorModel->pager;
        $data['searchKey'] = $searchKey; 

        // return $this->response->setStatusCode(200)->setJSON($data['doctors']);
    

        return view('dashboard/dashboard', [
            'title' => "Dashboard | Data Dokter",
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-data-dokter.css',
            ],
            'panel' => 'data_dokter.php',
            'doctors' => $data['doctors'],
            'pager' => $data['pager'],
            'searchKey' => $data['searchKey'] 
        ]);
    }   

    public function tambahDokter(){
        $doctorModel = new Doctor();

        if ($this->request->getMethod() === 'POST') {
            $data = [
                'name'              => $this->request->getPost('name'),
                'hp'                => $this->request->getPost('hp'),
                'spesialisasi'      => $this->request->getPost('spesialisasi'),
                'no_izin_praktek'   => $this->request->getPost('no_izin_praktek'),
                'alumni'            => $this->request->getPost('alumni'),
                'created_at'        => date('Y-m-d H:i:s'),
            ];

            if ($doctorModel->insert($data)) {
                return redirect()->back()->with('success', 'Dokter berhasil ditambahkan!');
            } else {
                return redirect()->back()->with('errors', $doctorModel->errors());
            }
        }
    }

    public function editDokter($id)
    {
        $model = new DoctorEdit();
        $data['doctor'] = $model->find($id);
        
        if (!$data['doctor']) {
            return redirect()->back()->with('error', 'Record not found');
        }
        
        return view('dashboard/edit_dokter', $data);
    }

    
    public function updateDokter($id)
    {
        $model = new DoctorEdit();
        
        if ($this->request->getMethod() === 'POST') {
            $data = [
                'name'              => $this->request->getPost('name'),
                'hp'                => $this->request->getPost('hp'),
                'spesialisasi'      => $this->request->getPost('spesialisasi'),
                'no_izin_praktek'   => $this->request->getPost('no_izin_praktek'),
                'alumni'            => $this->request->getPost('alumni'),
            ];

        if ($model->update($id, $data)) {
            return redirect()->to('/dashboard')->with('success', 'Record updated successfully');
        } else {
            return redirect()->back()->with('error', 'Failed to update the record');
        }
    }}


    public function hapusDokter($id)
    {
        $model = new Doctor();
        if ($model->delete($id)) {
            return redirect()->back()->with('success', 'Dokter berhasil dihapus!');
        } else {
            return $this->response->setStatusCode(500)
                                  ->setJSON(['success' => false, 'message' => 'Failed to delete record']);
        }
    }


    public function getPatientView(){

        $doctorModel = new Doctor();
        $dataDokter = $doctorModel->findAll();
        $poliklinik = new Poliklinik();
        $dataPoliklinik = $poliklinik->findAll();
        $patientModel = new Patient();
        $dataPatient = $patientModel->findAll();

        // pencarian pasien
        $searchKey = $this->request->getGet('search') ?? '';
        $berdasarkan = $this->request->getGet('berdasarkan') ?? 'nama';

        if ($searchKey) {
            if($berdasarkan == 'rekammedis'){
                $dataPatient = $patientModel->like('no_rekam_medis', $searchKey)->findAll();
            }else if($berdasarkan == 'nama'){ 
                $dataPatient = $patientModel->like('nama_pasien', $searchKey)->findAll();
            }
            
        } else {
            $dataPatient = $patientModel->findAll();
        }


        return view('dashboard/dashboard', [
            'title' => "Dashboard | Data Pasien",
            'doctors' => $dataDokter,
            'poliklinik' => $dataPoliklinik,
            'patients' => $dataPatient,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-data-pasien.css',
            ],
            'panel' => 'data_pasien.php',
        ]);
    }

    public function getJanjiTemu(){
        $appointmentModel = new Appointment(); 
        $appointments = $appointmentModel->findAll(); 

        return view('dashboard/dashboard', [
            'title' => "Dashboard | Janji Temu",
            'appointments' => $appointments,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-janji-temu.css',
            ],
            'panel' => 'janji_temu.php',
        ]);
    }

    public function deleteJanjiTemu($id)
{
    if (!is_numeric($id)) {
        return redirect()->back()->with('error', 'Invalid appointment ID.');
    }

    
    $model = new Appointment();

    if ($model->delete($id)) {
        return redirect()->to('/dashboard/janji-temu')->with('message', 'Appointment deleted successfully.');
    }

    return redirect()->back()->with('error', 'Failed to delete appointment.');
}


    public function getRiwayatPemeriksaan(){

        $pemeriksaanModel = new Pemeriksaan();
        $riwayat = null;
        $no_rawat = $this->request->getGet('no_rawat');
        if ($no_rawat){
            $riwayat = $pemeriksaanModel->select("*")->where("no_rawat", $no_rawat)->findAll(); 
        }

        return view('dashboard/dashboard', [
            'title' => "Dashboard | Riwayat Pemeriksaan",
            'riwayat' => $riwayat,
            'no_rawat' => $no_rawat,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-riwayat-pemeriksaan.css',
            ],
            'panel' => 'riwayat_pemeriksaan.php',
        ]);
    }

    public function getJadwalPraktek(){

        $jadwalModel = new JadwalPraktek();
        $doctorModel = new Doctor();

        $dataJadwal = $jadwalModel->select('jadwal_praktek.*, doctors.name AS nama_dokter, doctors.spesialisasi AS spesialisasi, doctors.nip AS nip')
        ->join('doctors', 'jadwal_praktek.nip = doctors.nip')
        ->select("CASE 
                    WHEN hari = 'Senin' THEN 1
                    WHEN hari = 'Selasa' THEN 2
                    WHEN hari = 'Rabu' THEN 3
                    WHEN hari = 'Kamis' THEN 4
                    WHEN hari = 'Jumat' THEN 5
                    WHEN hari = 'Sabtu' THEN 6
                    WHEN hari = 'Minggu' THEN 7
                    ELSE 8
                END AS day_order")
        ->orderBy('day_order', 'ASC') // Sort by the numeric value of the day
        ->orderBy('jam', 'ASC') // Sort by time
        ->findAll();

    

             
        $dataDokter = $doctorModel->findAll();


        return view('dashboard/dashboard', [
            'title' => "Dashboard | Data Pasien",
            'jadwal' => $dataJadwal,
            'doctors' => $dataDokter,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-jadwal-praktek.css',
            ],
            'panel' => 'jadwal_praktek.php',
        ]);
    }

    public function getLaporanRawat(){

        $laporanRawat = new Registration();
        $dataLaporanRawat = $laporanRawat->select("registrations.*, doctors.name AS nama_dokter, poliklinik.nama_poliklinik AS poliklinik, patients.nama_pasien AS nama_pasien")
        ->join('doctors', 'registrations.doctor_nip = doctors.nip')
        ->join('poliklinik', 'registrations.poliklinik_id = poliklinik.id')
        ->join('patients', 'registrations.no_rekam_medis = patients.no_rekam_medis')
        ->findAll();


        return view('dashboard/dashboard', [
            'title' => "Dashboard | Data Pasien",
            'laporanRawat' => $dataLaporanRawat,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-laporan-rawat.css',
            ],
            'panel' => 'laporan_rawat.php',
        ]);
    }

    public function getMenuApotek(){

        $pesananObatModel = new PesananObat();

        $newestOrder = $pesananObatModel
            ->select('pesanan_obat.*, patients.nama_pasien')
            ->join('registrations', 'pesanan_obat.no_rawat = registrations.no_rawat', 'inner')
            ->join('patients', 'registrations.no_rekam_medis = patients.no_rekam_medis', 'inner')
            ->orderBy('pesanan_obat.tanggal_masuk', 'DESC') // Order by date
            ->orderBy('pesanan_obat.jam_masuk', 'DESC')     // Then by time
            ->findAll();

        
        
        return view('dashboard/dashboard', [
            'title' => "Dashboard | Data Pasien",
            'pesanan' => $newestOrder,
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-menu-apotek.css',
            ],
            'panel' => 'menu_apotek.php',
        ]);
    }

    public function tambahJadwalPraktek()
    {
        $jadwalModel = new JadwalPraktek();
        $doctorModel = new Doctor();

        // Ambil input dari request
        $nip = $this->request->getPost('nip');
        $hari = $this->request->getPost('hari'); 
        $jam = $this->request->getPost('jam');  

        // Validasi: NIP harus ada di tabel `doctors`
        $doctor = $doctorModel->where('nip', $nip)->first();

        if (!$doctor) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'NIP tidak valid. Dokter tidak ditemukan.'
            ])->setStatusCode(400);
        }

        // Validasi  hari
        $validDays = ['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'];
        if (!in_array($hari, $validDays)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => "Hari tidak valid: $hari."
            ])->setStatusCode(400);
        }

        // Data valid, simpan ke tabel `jadwal_praktek`
        $data = [
            'nip' => $nip,
            'hari' => $hari,
            'jam' => $jam
        ];

        if ($jadwalModel->insert($data)) {
            return redirect()->to("dashboard/jadwal-praktek")->with('success', 'Jadwal Baru berhasil ditambahkan');
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menambahkan jadwal praktek.'
            ])->setStatusCode(500);
        }
    }

    public function hapusJadwalPraktek(){

        $id = $this->request->getPost('hapus-id');

        $jadwalModel = new JadwalPraktek();

        $jadwalModel->delete($id);

        return redirect()->to("dashboard/jadwal-praktek")->with('success', 'Jadwal Baru berhasil dihapus');
    }    

    public function tambahPasien(){
        $patientModel = new Patient();

        // Validasi input form
        $validation = $this->validate([
            'no_rekam_medis' => 'required|is_unique[patients.no_rekam_medis]',
            'nama_pasien' => 'required|min_length[3]',
            'tanggal_lahir' => 'required|valid_date[Y-m-d]',
            'nama_penanggung_jawab' => 'required|min_length[3]',
            'hubungan_penanggung_jawab' => 'required',
            'alamat_penanggung_jawab' => 'required',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Data input yang akan disimpan
        $data = [
            'no_rekam_medis' => $this->request->getPost('no_rekam_medis'),
            'nama_pasien' => $this->request->getPost('nama_pasien'),
            'tanggal_lahir' => $this->request->getPost('tanggal_lahir'),
            'nama_penanggung_jawab' => $this->request->getPost('nama_penanggung_jawab'),
            'hubungan_penanggung_jawab' => $this->request->getPost('hubungan_penanggung_jawab'),
            'alamat_penanggung_jawab' => $this->request->getPost('alamat_penanggung_jawab'),
        ];

        // Simpan data ke database
        $patientModel->insert($data);

        // Redirect dengan pesan sukses
        return redirect()->to('/dashboard/data-pasien')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    public function buatRegistrasi()
    {

        $data = $this->request->getPost();

        $validationRules = [
            'no_registrasi'       => 'required|is_unique[registrations.no_registrasi]',
            'no_rawat'            => 'required|is_unique[registrations.no_rawat]',
            'cara_masuk'          => 'required',
            'tanggal_daftar'      => 'required|valid_date',
            'doctor_nip'          => 'required|numeric', // Assuming NIP is a numeric value
            'poliklinik_id'       => 'required|numeric',
            'jenis_bayar'         => 'required',
            'asal_rujukan'        => 'permit_empty', // optional field
            'no_rekam_medis_pasien'      => 'required',
        ];

        if (!$this->validate($validationRules)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Gagal menambahkan jadwal praktek.',
                'errors' => $this->validator->getErrors()
            ])->setStatusCode(500);
        }

        // Prepare the data to be inserted
        $registrationData = [
            'no_registrasi'   => $data['no_registrasi'],
            'no_rawat'        => $data['no_rawat'],
            'cara_masuk'      => $data['cara_masuk'],
            'tanggal_daftar'  => $data['tanggal_daftar'],
            'doctor_nip'      => $data['doctor_nip'],
            'poliklinik_id'   => $data['poliklinik_id'],
            'jenis_bayar'     => $data['jenis_bayar'],
            'asal_rujukan'    => $data['asal_rujukan'],
            'no_rekam_medis'  => $data['no_rekam_medis_pasien'],
        ];


        // Instantiate the RegistrationModel
        $registrationModel = new Registration();

        // Insert data into the database
        if ($registrationModel->insert($registrationData)) {
            // Redirect to a success page or the index with a success message
            return redirect()->to("dashboard/data-pasien")->with('success', 'registrasi-berhasil');
        } else {
            // Handle error if insert fails
            return redirect()->to("dashboard/data-pasien")->with('failed', 'registrasi gagal');
        }
        
    }

    public function exportRegistrasi()
    {
        // Instantiate the model
        $registrationModel = new Registration();
        
        // Fetch all data from the 'registrations' table
        $registrations = $registrationModel->findAll();

        // Create new Spreadsheet object
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Set column headers for the Excel file
        $sheet->setCellValue('A1', 'No Registrasi');
        $sheet->setCellValue('B1', 'No Rawat');
        $sheet->setCellValue('C1', 'Cara Masuk');
        $sheet->setCellValue('D1', 'Tanggal Daftar');
        $sheet->setCellValue('E1', 'Doctor NIP');
        $sheet->setCellValue('F1', 'Poliklinik ID');
        $sheet->setCellValue('G1', 'Jenis Bayar');
        $sheet->setCellValue('H1', 'Asal Rujukan');
        $sheet->setCellValue('I1', 'No Rekam Medis');

        // Add table data starting from row 2
        $row = 2; // Start from row 2 to leave space for headers
        foreach ($registrations as $registration) {
            $sheet->setCellValue('A' . $row, $registration['no_registrasi']);
            $sheet->setCellValue('B' . $row, $registration['no_rawat']);
            $sheet->setCellValue('C' . $row, $registration['cara_masuk']);
            $sheet->setCellValue('D' . $row, $registration['tanggal_daftar']);
            $sheet->setCellValue('E' . $row, $registration['doctor_nip']);
            $sheet->setCellValue('F' . $row, $registration['poliklinik_id']);
            $sheet->setCellValue('G' . $row, $registration['jenis_bayar']);
            $sheet->setCellValue('H' . $row, $registration['asal_rujukan']);
            $sheet->setCellValue('I' . $row, $registration['no_rekam_medis']);
            $row++;
        }

        // Set the response headers to download the file as an Excel file
        $writer = new Xlsx($spreadsheet);
        $filename = 'registrations_data.xlsx';

        // Output the file to the browser
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        // Write to output
        $writer->save('php://output');
        exit();
    }

    public function importRegistrasi()
    {
        $registrationModel = new Registration();

        // Check if a file is uploaded
        if ($file = $this->request->getFile('xlsx_file')) {
            if ($file->isValid() && !$file->hasMoved()) {
                $filePath = $file->getTempName();

                // Load the Excel file
                $reader = new Xlsx();
                $spreadsheet = $reader->load($filePath);
                $sheet = $spreadsheet->getActiveSheet();
                $rows = $sheet->toArray();

                // Skip the header row and insert rows into the database
                foreach ($rows as $index => $row) {
                    if ($index == 0) {
                        continue; // Skip the header row
                    }

                    // Map the data to the model's fields
                    $data = [
                        'no_registrasi'   => $row[0],
                        'no_rawat'        => $row[1],
                        'cara_masuk'      => $row[2],
                        'tanggal_daftar'  => $row[3],
                        'doctor_nip'      => $row[4],
                        'poliklinik_id'   => $row[5],
                        'jenis_bayar'     => $row[6],
                        'asal_rujukan'    => $row[7],
                        'patient_id'      => $row[8],
                        'no_rekam_medis'  => $row[9],
                    ];

                    // Insert the data into the database
                    $registrationModel->insert($data);
                }

                return redirect()->back()->with('success', 'Data imported successfully.');
            }
        }

        return redirect()->back()->with('error', ['Failed to upload or process the file.']);
    
    }

    public function getPesanObat(){


        return view('dashboard/dashboard', [
            'title' => "Dashboard | Pesan Obat ke Apotek",
            'styles' => [
                'dashboard.css',
                'dashboard-navbar.css',
                'dashboard-sidenav.css',
                'dashboard-floating-card.css',
                'dashboard-data-pasien.css',
                'dashboard-pesan-obat.css'
            ],
            'panel' => 'pesan_obat.php',
        ]);
    }

    public function pesanObat()
    {
        $pesananObatModel = new PesananObat();

        $data = [
            'no_rawat'       => $this->request->getPost('no_rawat'),
            'nama_obat'      => $this->request->getPost('nama_obat'),
            'dosis'          => $this->request->getPost('dosis'),
            'jumlah'         => $this->request->getPost('jumlah'),
            'satuan'         => $this->request->getPost('satuan'),
            'tanggal_masuk'  => date('Y-m-d'), 
            'jam_masuk'      => date('H:i:s'), 
            'status'         => "MENUNGGU",
        ];

        if ($pesananObatModel->insert($data)) {
            return redirect()->to('/dashboard/pesan-obat')->with('success', 'Pesanan obat berhasil ditambahkan.');
        } else {
            return redirect()->to('/dashboard/pesan-obat')->with('error', 'Gagal menambahkan pesanan obat.');
        }
    }

    public function buatPemeriksaan(){

        $pemeriksaanModel = new Pemeriksaan();

        // Validasi input
        $validation = $this->validate([
            'no_rawat'           => 'required|string|is_not_unique[registrations.no_rawat]',
            'age'                => 'required|integer',
            'gender'             => 'required|in_list[laki-laki,perempuan]',
            'blood_pressure'     => 'required|string|max_length[50]',
            'heart_rate'         => 'required|integer',
            'body_temperature'   => 'required|numeric',
            'examination_date'   => 'required|valid_date',
            'symptoms'           => 'required|string',
            'diagnosis'          => 'required|string',
            'laboratory_results' => 'permit_empty|string',
            'notes'              => 'permit_empty|string',
            'treatment'          => 'required|string',
            'next_action'        => 'permit_empty|string',
        ]);

        if (!$validation) {
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }

        // Simpan data ke database
        $data = [
            'no_rawat'           => $this->request->getPost('no_rawat'),
            'age'                => $this->request->getPost('age'),
            'gender'             => $this->request->getPost('gender'),
            'blood_pressure'     => $this->request->getPost('blood_pressure'),
            'heart_rate'         => $this->request->getPost('heart_rate'),
            'body_temperature'   => $this->request->getPost('body_temperature'),
            'examination_date'   => $this->request->getPost('examination_date'),
            'symptoms'           => $this->request->getPost('symptoms'),
            'diagnosis'          => $this->request->getPost('diagnosis'),
            'laboratory_results' => $this->request->getPost('laboratory_results'),
            'notes'              => $this->request->getPost('notes'),
            'treatment'          => $this->request->getPost('treatment'),
            'next_action'        => $this->request->getPost('next_action'),
        ];

        if ($pemeriksaanModel->insert($data)) {
            return redirect()->to('/dashboard/pesan-obat')->with('success', 'Data pemeriksaan berhasil ditambahkan.');
        } else {
            return redirect()->back()->withInput()->with('errors', $pemeriksaanModel->errors());
        }
    }

    public function updateStatusPesananObat()
    {   
        $pesananObatModel = new PesananObat();

        $data = [
            'id'             => $this->request->getPost('id'),
            'status'         => $this->request->getPost('status')
        ];

        // Update data di database
        if ($pesananObatModel->update($data['id'], $data)) {
            return redirect()->to('/dashboard/menu-apotek')->with('success', 'Status Pesanan obat berhasil diperbarui.');
        } else {
            return redirect()->to('/dashboard/menu-apotek')->with('error', $pesananObatModel->errors());
        }
    }
}

// return $this->response->setJSON([
        //     $data
        // ])->setStatusCode(400);

        