<div class="data-panel">
    <div class="jadwal-dokter-header">
        <h5>DATA REGISTRASI</h5>
    </div>
    <div class="table-body">
      <form id="search-bar" action='/dashboard/data-pasien'>
              <div class="form-group">
                  <label for="berdasarkan" class="label">berdasarkan</label>
                  <select id="berdasarkan" name="berdasarkan">
                      <option value="nama" selected>Nama</option>
                      <option value="rekammedis">Rekam Medis</option>
                  </select>
              </div>
              <div class="form-group form-search">
                  <input class="input-search" name="search" type="search" placeholder="Cari Pasien">
              </div>
              <div class="form-group">
                  <button class="btn-cari">Cari</button>
              </div>
        </form>
      <table id="pasien" border="1" class="jadwal-table table">
        <thead>
            <tr>
                <th>No Rekam Medis</th>
                <th>Nama Pasien</th>
                <th>Tanggal Lahir</th>
                <th>Nama Penanggung Jawab</th>
                <th>Hubungan Dengan Penanggung Jawab</th>
                <th>Alamat Penanggung Jawab</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach ($patients as $patient): ?>
              <tr>
                <td> <?= esc($patient['no_rekam_medis']) ?> </td> 
                <td> <?= esc($patient['nama_pasien']) ?> </td> 
                <td> <?= esc($patient['tanggal_lahir']) ?> </td> 
                <td> <?= esc($patient['nama_penanggung_jawab']) ?> </td> 
                <td> <?= esc($patient['hubungan_penanggung_jawab']) ?> </td> 
                <td> <?= esc($patient['alamat_penanggung_jawab']) ?> </td> 
              </tr>
            <?php endforeach; ?>
            
        </tbody>
      </table>
    </div>
</div>

<!-- Card Edit, Hapus, Tambah -->
<div class="action-panel">
    <!-- Card Tambah -->
        <div class="card">
        <h5>Data Registrasi</h5>
        <form action="<?= site_url("dashboard/data-pasien/registrasi") ?>" method="post">

            <label class="form-label">No Registrasi</label>
            <input type="text" name="no_registrasi" class="form-control" placeholder="Masukkan No Registrasi Anda">

            <label class="form-label">No Rawat</label>
            <input type="text" name="no_rawat" class="form-control" placeholder="Masukkan No Rawat Anda">

            <label class="form-label">No Rekam Medis</label>
            <input type="text" name="no_rekam_medis_pasien" class="form-control" placeholder="Masukkan No Rekam Medis">


            <label class="form-label">Cara Masuk</label>
            <select class="form-select" name="cara_masuk">
              <option value="RAWAT JALAN">RAWAT JALAN</option>
              <option value="RAWAT INAP" >RAWAT INAP</option>
            </select>

            <label class="form-label">Tanggal Daftar</label>
            <input type="date" name="tanggal_daftar" class="form-control">


            <label class="form-label">Dokter Penanggung Jawab</label>
            <select name="doctor_nip" id="edit-nama">
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?= esc($doctor['nip']) ?>"><?= esc($doctor['name']) . " - ".esc($doctor['nip'])?></option>
            <?php endforeach; ?>
            </select>


            <label class="form-label">Poliklinik Tujuan</label>
            <select name="poliklinik_id" class="form-select">
              <?php foreach ($poliklinik as $item): ?>
                  <option value="<?= esc($item['id']) ?>"><?= esc($item['nama_poliklinik'])?></option>
              <?php endforeach; ?>
            </select>


            <label class="form-label">Jenis Bayar</label>
            <select name="jenis_bayar" class="form-select">
              <option value="BPJS" >BPJS</option>
              <option value="ASURANSI" >ASURANSI</option>
              <option value="SENDIRI" >SENDIRI</option>
            </select>

            <label class="form-label">Asal Rujukan</label>
            <input type="text" name="asal_rujukan" class="form-control" placeholder="Asal Rujukan">
          <button class="btn btn-danger">Buat</button>
        </form>
    </div>

    

    <!-- Card Hapus -->
    <div class="card">
        <h5>Data Pasien</h5>
        <form  action="<?= site_url("dashboard/data-pasien/tambah-pasien") ?>" method="post">
            <label class="form-label">No Rekamedis</label>
            <input type="text" name="no_rekam_medis" class="form-control" placeholder="Masukkan No Rekamedis">

            <label class="form-label">Nama Pasien</label>
            <input type="text" name="nama_pasien" class="form-control" placeholder="Nama Pasien">

            <label class="form-label">Tanggal Lahir</label>
            <input type="date" name="tanggal_lahir" class="form-control">

            <label class="form-label">Nama Penanggung Jawab</label>
            <input type="text" name="nama_penanggung_jawab" class="form-control" placeholder="Nama Penanggung Jawab">

            <label class="form-label">Hubungan Dengan Penanggung Jawab</label>
            <select name="hubungan_penanggung_jawab" class="form-select">
              <option value="saudara kandung">saudara kandung</option>
              <option value="istri">istri</option>
              <option value="suami">suami</option>
              <option value="ayah">ayah</option>
              <option value="ibu">ibu</option>
              <option value="kakek">kakek</option>
              <option value="nenek">nenek</option>
              <option value="paman/bibi">paman/bibi</option>
            </select>

            <label class="form-label">Alamat Penanggung Jawab</label>
            <textarea name="alamat_penanggung_jawab" rows="3" class="textarea" placeholder="Alamat Penanggung Jawab"></textarea>
            <button class="btn btn-danger">Buat</button>
        </form>
    </div>
</div>




              </div>