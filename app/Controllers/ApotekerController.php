<?php

namespace App\Controllers;
use App\Models\User;
use App\Models\PesananObat;

use CodeIgniter\Controller;

class ApotekerController extends BaseController{

public function getMenuApotek(){

    $pesananObatModel = new PesananObat();

    $newestOrder = $pesananObatModel
        ->select('pesanan_obat.*, patients.nama_pasien')
        ->join('registrations', 'pesanan_obat.no_rawat = registrations.no_rawat', 'inner')
        ->join('patients', 'registrations.no_rekam_medis = patients.no_rekam_medis', 'inner')
        ->orderBy('pesanan_obat.tanggal_masuk', 'DESC') // Order by date
        ->orderBy('pesanan_obat.jam_masuk', 'DESC')     // Then by time
        ->findAll();

    
    
    return view('dashboard-apoteker/menu_apoteker', [
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

public function getPesanObat(){


    return view('dashboard-apoteker/apoteker_pesan_obat', [
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
}

}

?>