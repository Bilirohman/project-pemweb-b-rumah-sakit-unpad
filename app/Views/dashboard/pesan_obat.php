<div class="data-panel">
        <h2>Tambah Pesanan Obat Baru</h2>
        <form action="<?= site_url('dashboard/pesan-obat/add') ?>" method="post">
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
    <div class="data-panel">
        <h2>Pemeriksaan</h2>
            <form action="<?= site_url("dashboard/riwayat-pemeriksaan/tambah") ?>" method="POST">
                
                <div class="form-group">
                    <label for="no_rawat">No. Rawat:</label>
                    <input type="text" id="no_rawat" name="no_rawat" placeholder="Contoh: RW-12345" required>              
                </div>
                <div class="form-row">
                    <div class="form-group">
                        <label for="age">Umur (tahun):</label>
                        <input type="number" id="age" name="age" min="0" placeholder="Contoh: 35" required>
                    </div>
                    <div class="form-group">
                        <label for="gender">Jenis Kelamin:</label>
                        <select id="gender" name="gender" required>
                            <option value="">-- Pilih --</option>
                            <option value="laki-laki">Laki-laki</option>
                            <option value="perempuan">Perempuan</option>
                        </select><br><br>
                    </div>
                </div>

                <div class="form-row">
                    <div class="form-group">
                        <label for="blood-pressure">Tekanan Darah (mmHg):</label>
                        <input type="text" id="blood-pressure" name="blood_pressure" placeholder="Contoh: 120/80" required>
                    </div>
    
                    <div class="form-group">
                        <label for="heart-rate">Denyut Jantung (bpm):</label>
                        <input type="number" id="heart-rate" name="heart_rate" min="0" placeholder="Contoh: 72" required>
                    </div>
    
                    <div class="form-group">
                        <label for="body-temperature">Suhu Tubuh (°C):</label>
                        <input type="number" id="body-temperature" name="body_temperature" step="0.1" min="35" max="42" placeholder="Contoh: 37.5" required><br><br>
                    </div>
                </div>


                <div class="form-group">
                    <label for="examination-date">Tanggal Pemeriksaan:</label>
                    <input type="date" id="examination-date" name="examination_date" required>
                </div>
            

                <div class="form-group">
                    <label for="symptoms">Gejala Utama:</label>
                    <textarea id="symptoms" name="symptoms" rows="3" placeholder="Contoh: Demam, batuk, sesak napas" required></textarea>
                </div>
                
                <div class="form-group">
                    <label for="diagnosis">Hasil Diagnosa:</label>
                    <textarea id="diagnosis" name="diagnosis" rows="4" placeholder="Contoh: Infeksi Saluran Pernapasan Akut (ISPA)" required></textarea>
                </div>

                <div class="form-group">
                    <label for="laboratory-results">Hasil Laboratorium (jika ada):</label><br>
                    <textarea id="laboratory-results" name="laboratory_results" rows="4" placeholder="Contoh: Hemoglobin 12 g/dL, Leukosit 10.000/μL"></textarea>
                </div>


                <div class="form-group">
                    <label for="notes">Keterangan Tambahan:</label>
                    <textarea id="notes" name="notes" rows="4" placeholder="Contoh: Pasien memiliki riwayat diabetes"></textarea>
                </div>
            
                <div class="form-group">
                    <label for="treatment">Tindakan yang Dilakukan:</label>
                    <textarea id="treatment" name="treatment" rows="4" placeholder="Contoh: Pemberian nebulizer, resep antibiotik" required></textarea>
                </div>

                <div class="form-group">
                    <label for="next-action">Tindakan Lanjutan:</label>
                    <input type="text" id="next-action" name="next_action" placeholder="Contoh: Kontrol ulang dalam 1 minggu">
                </div>
                
                <!-- Submit Button -->
                <div class="form-group">
                    <input type="submit" value="Tambah Pesanan">
                </div>
        </form>
    </div>