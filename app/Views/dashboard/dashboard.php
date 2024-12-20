<?= $this->extend('includes/template') ?>


<?= $this->section('content') ?>


    <?php if (session()->getFlashdata('success')): ?>
        <div class="card-success" id="successCard">
            <div class="card-header">
                <span>Success</span>
                <button class="close-btn" onclick="closeCard()">×</button>
            </div>
            <div class="card-body">
                <p id="successMessage"><?= session()->getFlashdata('success') ?></p>
            </div>
        </div>
    <?php endif; ?>
    <?php if (session()->getFlashdata('errors')): ?>
        <div class="card-errors" id="errorsCard">
            <div class="card-header">
                <span>Failed</span>
                <button class="close-btn" onclick="closeCard()">×</button>
            </div>
            <div class="card-body">
                <?php foreach(session()->getFlashdata('errors') as $error): ?>
                    <p id="errorsMessage"><?= $error?></p>
                <?php endforeach;?>
            </div>
        </div>
    <?php endif; ?>

    <!-- Navbar -->
    <?= view('dashboard/navbar'); ?>

    <div style="height:calc(100vh - 3rem); display:flex;margin-top:3rem;">
        <!-- Sidebar & dashboard -->
        <?= view('dashboard/sidenav');?>



        <!-- Data Panel -->
        <?= view('dashboard/'.$panel); ?>
    </div>

    <!-- Floating Card -->
    <?= view('dashboard/floating_card'); ?>

    
    <script>
        function closeCard() {
            let card = document.getElementById('successCard');
            card.style.display = 'none';
            card = document.getElementById('errorsCard');
            card.style.display = 'none';
        }
    </script>


<?= $this->endsection() ?>