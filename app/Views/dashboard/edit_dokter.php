<?= $this->extend('includes/template') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>

<body>

<div class="container">
    <h2>Edit Doctor</h2>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif ?>

    <form action="/dashboard/update-dokter/<?= esc($doctor['nip']) ?>" method="post">
        <?= csrf_field() ?>

        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" name="name" id="name" class="form-control" value="<?= esc($doctor['name']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="phone" class="form-label">Nomor Hp: </label>
            <input type="text" name="phone" id="phone" class="form-control" value="<?= esc($doctor['hp']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Spesialisasi</label>
            <input type="text" name="specialty" id="specialty" class="form-control" value="<?= esc($doctor['spesialisasi']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Nomor Izin Praktik </label>
            <input type="text" name="izin" id="izin" class="form-control" value="<?= esc($doctor['no_izin_praktek']) ?>" required>
        </div>

        <div class="mb-3">
            <label for="specialty" class="form-label">Alumni</label>
            <input type="text" name="alumni" id="alumni" class="form-control" value="<?= esc($doctor['alumni']) ?>" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="/dashboard" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
