<div class="data-panel">
        <h1>Data Panel Apotek</h1>
        <table class="data-table">
            <thead>
                <tr>
                    <th>No Rawat</th>
                    <th>Nama Pasien</th>
                    <th>Nama Obat</th>
                    <th>Dosis</th>
                    <th>Jumlah</th>
                    <th>Tanggal Masuk</th>
                    <th>Jam Masuk</th>
                    <th>Status</th>
                    <th>ubah status</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($pesanan as $item): ?>
                <tr>
                    <td><?= $item['no_rawat'] ?></td>
                    <td><?= $item['nama_pasien'] ?></td>
                    <td><?= $item['nama_obat'] ?></td>
                    <td><?= $item['dosis'] ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td><?= $item['tanggal_masuk'] ?></td>
                    <td><?= $item['jam_masuk'] ?></td>
                    <?php
                    // Define class mapping for statuses
                    $statusClasses = [
                        'DIBATALKAN'  => 'dibatalkan',
                        'SELESAI'     => 'selesai',
                        'SIAP DIAMBIL'=> 'siap-diambil',
                        'MENUNGGU'    => 'menunggu',
                        'DIPROSES'    => 'diproses'
                    ];
                    ?>
                    <td class="<?= $statusClasses[$item['status']] ?? '' ?>">
                        <?= $item['status'] ?>
                    </td>
                    <td>
                      <form action="<?= site_url('dashboard/pesan-obat/editstatus') ?>" method="post">
                        <input type="hidden" name='id' value="<?= $item['id'] ?>">
                        <select name="status" id="">
                          <option value="DIBATALKAN">DIBATALKAN</option>
                          <option value="SELESAI">SELESAI</option>
                          <option value="MENUNGGU">MENUNGGU</option>
                          <option value="SIAP DIAMBIL">SIAP DIAMBIL</option>
                          <option value="DIPROSES">DIPROSES</option>
                        </select>
                        <button>+</button>
                      </form>
                    </td>
                    <td><?= $item['keterangan'] ?></td>
                </tr>
                <?php endforeach?>
            </tbody>
        </table>
    </div>