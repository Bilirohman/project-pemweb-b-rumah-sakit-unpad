<?= $this->extend('includes/template') ?>


<?= $this->section('content') ?>

    <!-- Navbar -->
    <?= view('dashboard/navbar'); ?>

    <div style="height:calc(100vh - 3rem); display:flex;margin-top:3rem;">
        <!-- Sidebar & dashboard -->
        <?= view('dashboard-apoteker/sidenav'); ?>
    
        <!-- Data Panel -->
        <?= view('dashboard/'.$panel); ?>
    </div>

    <!-- Floating Card -->
    <?= view('dashboard/floating_card'); ?>
<?= $this->endsection() ?>

<div class="data-panel">
        <h2>Tambah Pesanan Obat Baru</h2>
        <form action="<?= site_url('apoteker/pesan-obat/add') ?>" method="post">
            <div class="form-group">
                <label for="no_rawat">No Rawat</label>
                <input type="text" id="no_rawat" name="no_rawat" required>
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label for="nama_obat">Nama Obat</label>
                    <input type="text" id="nama_obat" name="nama_obat" required>
                </div>
                <div class="form-group">
                    <label for="dosis">Dosis</label>
                    <input type="text" id="dosis" name="dosis" required>
                </div>
                <div class="form-group">
                    <label for="satuan">Satuan</label>
                    <select id="satuan" name="satuan" required>
                        <option value="Strip">Strip</option>
                        <option value="Renteng">Renteng</option>
                        <option value="Tablet">Tablet</option>
                        <option value="Botol">Botol</option>
                        <option value="Kapsul">Kapsul</option>
                        <option value="Kaleng">Kaleng</option>
                        <option value="Kemasan Bungkus">Kemasan Bungkus</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="number" id="jumlah" name="jumlah" required>
            </div>

            <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <textarea name="keterangan" id="keterangan" row="4"></textarea>
            </div>
            
            <div class="form-group">
                <input type="submit" value="Tambah Pesanan">
            </div>
        </form>
    </div>