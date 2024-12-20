
<div class="data-panel">
    <div class="jadwal-dokter-header">
        <h5>JADWAL PRAKTEK DOKTER</h5>
    </div>
    <div class="jadwal-dokter-body">
        <table class="jadwal-table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>Nama Dokter</th>
                    <th>Spesialis</th>
                    <th>Hari</th>
                    <th>Jam</th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($jadwal as $row): ?>
                    <tr>
                        <td jadwal-id="<?= esc($row['id'])?>"><?= $i++ ?></td>
                        <td><?= esc($row['nip'])?></td>
                        <td><?= esc($row['nama_dokter'])?></td>
                        <td><?= esc($row['spesialisasi'])?></td>
                        <td><?= esc($row['hari'])?></td>
                        <td><?= esc($row['jam'])?></td>
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
        <h5>Tambah Data</h5>
        <form action="<?= site_url("dashboard/jadwal-praktek/tambah") ?>" method="post">

            <label for="edit-nama">Nama Dokter:</label>
            <select name="nip" id="edit-nama">
            <?php foreach ($doctors as $doctor): ?>
                <option value="<?= esc($doctor['nip']) ?>"><?= esc($doctor['name']) . " - ".esc($doctor['nip'])?></option>
            <?php endforeach; ?>
            </select>
            <label for="edit-hari">Hari:</label>
            <select name="hari" id="edit-hari">
                <option value="Senin">Senin</option>
                <option value="Selasa">Selasa</option>
                <option value="Rabu">Rabu</option>
                <option value="Kamis">Kamis</option>
                <option value="Jumat">Jumat</option>
                <option value="Sabtu">Sabtu</option>
                <option value="Minggu">Minggu</option>
            </select>
            <label for="jam">Jam:</label>
            <input type="text" id="jam" name="jam" placeholder="Masukkan jam praktek">
            <button type="submit" class="btn">Tambah</button>
        </form>
    </div>

    

    <!-- Card Hapus -->
    <div class="card">
        <h5>Hapus Data</h5>
        <form action="<?= site_url("dashboard/jadwal-praktek/hapus") ?>" method="post">
            <label for="hapus-id">Nomor Baris Jadwal:</label>
            <input type="hidden" id="hapus-id" name="hapus-id" value="" readonly>
            <input type="text" id="hapus-id-row" value="" placeholder="Klik baris yang ingin dihapus" readonly>
            <button type="submit" class="btn-del">Hapus</button>
        </form>
    </div>
</div>


<script>

    const rows = document.querySelectorAll('.jadwal-table tr')
    console.log(rows);
    const inputPlaceHolder = document.getElementById("hapus-id-row");
    const inputDel = document.getElementById("hapus-id");

    rows.forEach(row => {
        row.addEventListener("click", () => {
            const firstCell = row.querySelector("td");
            if (firstCell) {
                console.log(firstCell.innerHTML, firstCell.getAttribute("jadwal-id") );
                inputPlaceHolder.value = firstCell.innerHTML;
                inputDel.value = firstCell.getAttribute("jadwal-id");
            }
        });
    });

    // validasi tambah jadwal
    document.querySelector('form').addEventListener('submit', function (event) {
        const namaDokter = document.getElementById('edit-nama');
        const hari = document.getElementById('edit-hari');
        const jam = document.getElementById('jam');

        // Validasi nama dokter
        if (namaDokter.value === '') {
            alert('Nama dokter harus dipilih.');
            namaDokter.focus();
            event.preventDefault();
            return;
        }

        // Validasi hari
        if (hari.value === '') {
            alert('Hari harus dipilih.');
            hari.focus();
            event.preventDefault();
            return;
        }

        // Validasi jam
        const jamPattern = /^([0-1]?[0-9]|2[0-3]):[0-5][0-9] - ([0-1]?[0-9]|2[0-3]):[0-5][0-9]$/; // Format hh:mm - hh:mm
        const jamValue = jam.value.trim();

        if (jamValue === '') {
            alert('Jam harus diisi.');
            jam.focus();
            event.preventDefault();
            return;
        } else if (!jamPattern.test(jamValue)) {
            alert('Format jam tidak valid. Gunakan format hh:mm - hh:mm, contoh: 12:00 - 16:00.');
            jam.focus();
            event.preventDefault();
            return;
        } else {
            // Validasi waktu awal dan akhir
            const [start, end] = jamValue.split(' - ').map(time => {
                const [hours, minutes] = time.split(':').map(Number);
                return hours * 60 + minutes; // Konversi ke menit untuk perbandingan
            });

            if (start >= end) {
                alert('Waktu awal harus lebih kecil dari waktu akhir.');
                jam.focus();
                event.preventDefault();
                return;
            }
        }

        // Jika semua validasi lolos, form akan dikirim
    });

</script>