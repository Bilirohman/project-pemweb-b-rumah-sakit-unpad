

<div class="data-panel">

<div class="panel-header">
    <h5>JANJI TEMU PASIEN</h5>
  </div>
    <div class = "container"> 
    <table class="table">
        <thead>
            <tr>
                <th scope="col">No <i class="fas fa-sort"></i></th>
                <th scope="col">Nama Pasien <i class="fas fa-sort"></i></th>
                <th scope="col">No. Telpon <i class="fas fa-sort"></i></th>
                <th scope="col">Tanggal <i class="fas fa-sort"></i></th>
                <th colspan="2" scope="col">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($appointments as $appointment): ?>
                <tr>
                    <td><?= $i++ ?></td>
                    <td><?= esc($appointment['nama']) ?></td>
                    <td><?= esc($appointment['hp']) ?></td>
                    <td><?= esc($appointment['dateofappointment']) ?></td>
                    <td>
                        <!-- Delete Form -->
                        <form action="/dashboard/janji-temu/hapus/<?= esc($appointment['id']) ?>" method="post" onsubmit="return confirm('Are you sure you want to delete this appointment?');">
                            <?= csrf_field() ?>
                            <button type="submit" class="fas fa-delete delete-btn" title="Delete" style="width:50px;height:24px; border: none; cursor: pointer; color: white;"> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    </div>

<div>