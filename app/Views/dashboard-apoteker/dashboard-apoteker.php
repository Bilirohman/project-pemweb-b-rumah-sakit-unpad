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