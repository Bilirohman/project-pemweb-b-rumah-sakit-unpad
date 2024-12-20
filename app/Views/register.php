<?= $this->extend('includes/template') ?>

<?= $this->section('content') ?>

<div class="register-container">
    <h2>Register</h2>
    <form method="POST" action="<?= route_to('register') ?>" class="register-form">
        <div class="form-group">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" placeholder="Enter your username" required>
        </div>

        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" placeholder="Enter your password" required>
        </div>

        

        <button type="submit" class="btn-submit">Register</button>

        <?php if (session()->has('errors')): ?>
            <div class="error-message">
                <ul>
                    <?php foreach (session('errors') as $error): ?>
                        <li><?= esc($error) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php endif; ?>
    </form>
</div>

<?= $this->endsection() ?>