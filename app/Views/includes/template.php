<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Manajemen Rumah Sakit' ?></title>

    <?php foreach ($styles as $style) : ?>
        <link rel="stylesheet" href="<?= "/style/".$style ?>">
    <?php endforeach ?>
</head>
<body>

    <!-- Main Content -->
    <?= $this->renderSection('content') ?>
    

</body>
</html>
