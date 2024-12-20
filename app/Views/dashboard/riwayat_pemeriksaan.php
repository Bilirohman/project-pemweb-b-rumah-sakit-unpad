<div class="data-panel">
    <h1>Riwayat Pemeriksaan</h1>

    <!-- Form Pencarian -->
    <form action="<?= base_url('dashboard/riwayat-pemeriksaan') ?>" method="get">
            <div class="form-row">
                <div class="form-group">
                    <label for="no_rawat">Masukkan Nomor Rawat:</label>
                    <input type="text" id="no_rawat" name="no_rawat" value="<?= (isset($no_rawat))? esc($no_rawat) : '' ?>" placeholder="Contoh: RAW12345">
                </div>
                <div class="form-group form-search">
                    <button type="submit">Cari</button>
                </div>
            </div>
        </form>

    <hr>

    <?php if (!empty($riwayat)) : ?>
        <h2>Hasil Pencarian untuk Nomor Rawat: <?= esc($no_rawat) ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Tanggal Pemeriksaan</th>
                    <th>Tekanan Darah</th>
                    <th>Denyut Jantung</th>
                    <th>Suhu Tubuh</th>
                    <th>Gejala</th>
                    <th>Diagnosa</th>
                    <th>Tindakan</th>
                    <th>Keterangan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($riwayat as $row) : ?>
                    <tr>
                        <td><?= esc($row['examination_date']) ?></td>
                        <td><?= esc($row['blood_pressure']) ?></td>
                        <td><?= esc($row['heart_rate']) ?></td>
                        <td><?= esc($row['body_temperature']) ?> °C</td>
                        <td><?= esc($row['symptoms']) ?></td>
                        <td><?= esc($row['diagnosis']) ?></td>
                        <td><?= esc($row['treatment']) ?></td>
                        <td><?= esc($row['notes']) ?></td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    <?php elseif(isset($no_rawat)) : ?>
        <p><?= $no_rawat ? "Tidak ada data ditemukan untuk nomor rawat: " . esc($no_rawat) : "Silakan masukkan nomor rawat untuk mencari riwayat pemeriksaan." ?></p>
    <?php endif ?>
<div>