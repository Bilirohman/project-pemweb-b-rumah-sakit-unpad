<?= $this->extend('includes/template') ?>

<?= $this->section('content') ?>

<h2>Welcome, <?php echo $patient['name']; ?></h2>

<h3>Your Appointments</h3>
<table border="1">
    <tr>
        <th>Doctor</th>
        <th>Date</th>
        <th>Status</th>
    </tr>
    <?php while ($row = $appointments->fetch_assoc()): ?>
        <tr>
            <td><?php esc($row['doctor_id']) ?></td> <!-- Fetch doctor name from doctors table -->
            <td><?php esc($row['appointment_date']) ?></td>
            <td><?php esc($row['status']) ?></td>
        </tr>
    <?php endwhile; ?>
</table>

<?= $this->endsection() ?>