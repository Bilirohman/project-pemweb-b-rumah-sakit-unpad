<div class="data-panel">
    <div class="title">
        <h5>KELOLA DATA DOKTER</h5>
    </div>
    <div class="container">
        <button id="tambahDokterBtn" type="button" onclick="showTambahDokter()" class="btn tambah-dokter-btn">
            <i class="fas fa-address-card"></i> Tambah Data
        </button>
    
        <form action='/dashboard'>
            <div class="form-row">
                <div class="form-group">
                    <label for="antrian" class="label">Show</label>
                    <select id="antrian" class="select">
                        <option selected>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                    </select>
                </div>
                <div class="form-group form-search">
                    <input class="input-search" name="search" type="search" placeholder="Cari Dokter">
                </div>
                <div class="form-group">
                    <button class="btn-cari">Cari</button>
                </div>
            </div>
        </form>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No  <i class="fas fa-sort"></i></th>
                    <th scope="col">NIP  <i class="fas fa-sort"></i></th>
                    <th scope="col">Nama Dokter <i class="fas fa-sort"></i></th>
                    <th scope="col">No.Hp <i class="fas fa-sort"></i></th>
                    <th scope="col">Spesialis <i class="fas fa-sort"></i></th>
                    <th scope="col">No.Izin Praktek <i class="fas fa-sort"></i></th>
                    <th scope="col">Alumni <i class="fas fa-sort"></i></th>
                    <th colspan="2" scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1; ?>
                <?php foreach ($doctors as $doctor): ?>
                    <tr>
                        <td><?= $i++?></td>
                        <td><?= esc($doctor['nip']) ?></td>
                        <td><?= esc($doctor['name']) ?></td>
                        <td><?= esc($doctor['hp']) ?></td>
                        <td><?= esc($doctor['spesialisasi']) ?></td>
                        <td><?= esc($doctor['no_izin_praktek']) ?></td>
                        <td><?= esc($doctor['alumni']) ?></td>
                        <td>
                                <button id="editDokterBtn" type="button" onclick="showEditDokter('<?= esc($doctor['nip']) ?>')" class="fas fa-edit edit-btn" title="Edit" style="width: 12px; height: 24px; border: none;  cursor: pointer; color: blue;"
                                data-nip = "<?= esc($doctor['nip']) ?>" 
                                data-name="<?= esc($doctor['name']) ?>" 
                                data-hp="<?= esc($doctor['hp']) ?>" 
                                data-spesialisasi="<?= esc($doctor['spesialisasi']) ?>" 
                                data-no_izin_praktek="<?= esc($doctor['no_izin_praktek']) ?>" 
                                data-alumni="<?= esc($doctor['alumni']) ?>">
                                </button>    
                        </td>

                        <td>
                            <form action="/dashboard/hapus-dokter/<?= esc($doctor['nip']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this record?');">
                                <?= csrf_field() ?> 
                                <button type="submit" class="fas fa-delete delete-btn" title="Hapus" style="width:12px;height:24px" >

                                </button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="pagination-container">
            <nav aria-label="Pagination">
                <ul class="pagination">
                    <!-- Pagination links-->
                </ul>
            </nav>
        </div>
    </div>
</div>


<div class="overlay"></div>

<!-- Tambah data Dokter -->
<div class="floating-card" id="tambahCard">
    <h2>Tambah Data Dokter</h2>
    <form action="dashboard/tambah-dokter" method="post">
        <div class="form-group">
            <label for="nip">No Induk Pegawai (NIP)</label>
            <input type="text" name="nip" id="nip" required>
        </div>
        <div class="form-group">
            <label for="name">Nama</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div class="form-group">
            <label for="hp">No. Telp</label>
            <input type="text" name="hp" id="hp" required>
        </div>
        <div class="form-group">
            <label for="spesialisasi">Spesialisasi</label>
            <input type="text" name="spesialisasi" id="spesialisasi" required>
        </div>
        <div class="form-group">
            <label for="no_izin_prakter">No. Izin Prakter</label>
            <input type="text" name="no_izin_praktek" id="no_izin_prakter" required>
        </div>
        <div class="form-group">
            <label for="alumni">Alumni</label>
            <input type="text" name="alumni" id="alumni" required>
        </div>
        <button type="submit" class="btn">Tambah</button>
    </form>
    <div class="close-btn">Batal</div>
</div>

<div class="floating-card" id="editCard" style="display: none;">
    <h2>Edit Data Dokter</h2>
    <form action="dashboard/update-dokter/<?= esc($doctor['nip'])?>" method="post">
        
        <div class="form-group">
            <label for="editName">Nama</label>
            <input type="text" name="name" id="editName" required>
        </div>
        <div class="form-group">
            <label for="editHp">No. Telp</label>
            <input type="text" name="hp" id="editHp" required>
        </div>
        <div class="form-group">
            <label for="editSpesialisasi">Spesialisasi</label>
            <input type="text" name="spesialisasi" id="editSpesialisasi" required>
        </div>
        <div class="form-group">
            <label for="editNoIzinPraktek">No. Izin Praktek</label>
            <input type="text" name="no_izin_praktek" id="editNoIzinPraktek" required>
        </div>
        <div class="form-group">
            <label for="editAlumni">Alumni</label>
            <input type="text" name="alumni" id="editAlumni" required>
        </div>

        <button type="submit" class="btn">Simpan</button>
    </form>
    <div class="close-btn">Batal</div>
</div>


<script>
    // Get elements
    const tambahPopupBtn = document.querySelector('#tambahDokterBtn');
    const tambahOverlay = document.querySelector('.overlay');
    const tambahCard = document.querySelector('#tambahCard');
    const tambahCloseBtn = tambahCard.querySelector('.close-btn');

    const editPopupBtn = document.querySelector('#editDokterBtn'); // Add a button in your table or UI for "Edit"
    const editCard = document.querySelector('#editCard');
    const editCloseBtn = editCard.querySelector('.close-btn');


    // Function to show popup
    function showTambahDokter() {
        tambahOverlay.style.display = 'block';
        tambahCard.style.display = 'block';
    }

    // Function to hide popup
    function hideTambahDokter() {
        tambahOverlay.style.display = 'none';
        tambahCard.style.display = 'none';
    }

    function showEditDokter(nip) { 
        tambahOverlay.style.display = 'block';
        editCard.style.display = 'block';
        const bttn = document.querySelector(`button[data-nip='${nip}']`);
        
        document.querySelector('#editName').value = bttn.getAttribute('data-name');
        document.querySelector('#editHp').value = bttn.getAttribute('data-hp');
        document.querySelector('#editSpesialisasi').value = bttn.getAttribute('data-spesialisasi');
        document.querySelector('#editNoIzinPraktek').value = bttn.getAttribute('data-no_izin_praktek');
        document.querySelector('#editAlumni').value = bttn.getAttribute('data-alumni'); 

        const form = document.querySelector('#editCard form');
        form.action = `/dashboard/update-dokter/${encodeURIComponent(nip)}`;

        
    }

    // Hide "Edit" popup
    function hideEditDokter() {
        tambahOverlay.style.display = 'none';
        editCard.style.display = 'none';
    }

    // Add event listeners
    tambahPopupBtn.addEventListener('click', showTambahDokter);
    tambahOverlay.addEventListener('click', hideTambahDokter);    
    tambahCloseBtn.addEventListener('click', hideTambahDokter);

    editPopupBtn.addEventListener('click', function () {
        // Example data, replace with actual row data when editing
        const rowData = {
            name: this.getAttribute('data-name'),
            hp: this.getAttribute('data-hp'),
            spesialisasi: this.getAttribute('data-spesialisasi'),
            no_izin_praktek: this.getAttribute('data-no_izin_praktek'),
            alumni: this.getAttribute('data-alumni'),
        };
        
        showEditDokter(rowData);
    });
    tambahOverlay.addEventListener('click', hideEditDokter);  
    editCloseBtn.addEventListener('click', hideEditDokter);
    
</script>

