<?= $this->extend('includes/template') ?>

<?= $this->section('content') ?>

<div class="login-container">
    <div class="login-box">
        <h2>Welcome!</h2>
        <p class="subtitle">Please login to your account</p>
        <form method="POST" action="/login">
            <div class="input-box">
                <i class="fas fa-user"></i>
                <input type="text" name="username" placeholder=" " required>
                <label>Username</label>
            </div>
            <div class="input-box">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" placeholder=" " required>
                <label>Password</label>
            </div>
            <button type="submit" class="btn">Login</button>
            <a href="/register" class="forgot-link">Belum ada akun? Register.</a>
        </form>
        <?php if (session()->has('errors')): ?>
            <div id="error-message">
                <?= session('errors')['login'] ?? '' ?>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endsection() ?>