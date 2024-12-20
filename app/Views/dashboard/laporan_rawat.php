<div class="data-panel">
  <div class="panel-header">
    <h5>Laporan Perawatan</h5>
  </div>
  <div class="panel-body">
    <div class="button-group">
      <a type="submit" class="btn btn-danger">
        <i class="fas fa-address-card"></i> Tambah Data
      </a>
      <a type="submit" href="<?= site_url('dashboard/data-pasien/export')?>" class="btn btn-success">
        <i class="fas fa-file-excel"></i> Export Ms Excel
      </a>
      <a type="submit" class="btn btn-primary">
        <i class="fas fa-file-word"></i> Export Ms Word
      </a> 
    </div>

    <form>
      <div class="form-row">
        <div class="form-group">
          <label for="queue">Show</label>
          <select id="queue" class="input-select">
            <option selected>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-search">
          <input class="input-text" type="search" placeholder="Cari Pasien" />
        </div>
      </div>
    </form>

    <table class="table-custom">
    <thead>
              <tr>
                  <th>No Registrasi</th>
                  <th>No Rawat</th>
                  <th>Cara Masuk</th>
                  <th>Tanggal Daftar</th>
                  <th>Dokter Penanggung Jawab</th>
                  <th>Poliklinik Tujuan</th>
                  <th>Jenis Bayar</th>
                  <th>Asal Rujukan</th>
                  <th>Nama Pasien</th>
                  <td colspan="3">Action</td>
              </tr>
          </thead>
          <tbody>
              <?php foreach($laporanRawat as $item): ?>
                <tr>
                    <td><?= esc($item['no_registrasi']) ?></td>
                    <td><?= esc($item['no_rawat']) ?></td>
                    <td><?= esc($item['cara_masuk']) ?></td>
                    <td><?= esc($item['tanggal_daftar']) ?></td>
                    <td><?= esc($item['nama_dokter']) ?></td>
                    <td><?= esc($item['poliklinik']) ?></td>
                    <td><?= esc($item['jenis_bayar']) ?></td>
                    <td><?= esc($item['asal_rujukan']) ?></td>
                    <td><?= esc($item['nama_pasien']) ?></td>
                    <td class="icon"><i class="fas fa-eye icon-view"></i></td>
                    <td class="icon"><i class="fas fa-edit icon-edit"></i></td>
                    <td class="icon"><i class="fas fa-trash-alt icon-delete"></i></td>
                </tr>
              <?php endforeach?>
          </tbody>
    </table>

    <div class="pagination-container">
      <div class="pagination-info">Tampil antrian 1 dari 7 dalam 7 antrian</div>
      <div class="pagination">
        <ul>
          <li><a href="#" class="disabled">Previous</a></li>
          <li><a href="#" class="active">1</a></li>
          <li><a href="#">Next</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>
