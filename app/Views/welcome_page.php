<?= $this->extend('includes/template') ?>


<?= $this->section('content') ?>

<?= view('includes/header') ?>

<main>
    <div class="container">
    <h1>Welcome to Hospital Management System</h1>
            <p>
                Our Hospital Management System is a cutting-edge solution designed to streamline and optimize the management of hospitals and medical centers. Whether you're handling patient admissions, scheduling appointments, or managing medical records, our system provides a seamless experience for both medical professionals and administrative staff.
            </p>
            <p>
                This system integrates all aspects of hospital operations, offering modules to manage patients, doctors, treatments, medical history, billing, and more. By centralizing hospital data, it reduces the burden of paperwork, minimizes errors, and improves the overall efficiency of hospital workflows.
            </p>
            <h2>Key Features</h2>
            <ul>
                <li>
                    <strong>Patient Management:</strong> Easily register, admit, and discharge patients while maintaining comprehensive medical records. Access a patient’s full medical history and streamline the treatment process.
                </li>
                <li>
                    <strong>Doctor Scheduling:</strong> Effortlessly manage doctors’ appointments and availability, ensuring smooth coordination between departments and reducing waiting times for patients.
                </li>
                <li>
                    <strong>Treatment Planning:</strong> From diagnostic tests to complex surgeries, manage all treatments within one platform. Doctors can update and monitor treatment plans, track patient progress, and ensure the best possible outcomes.
                </li>
                <li>
                    <strong>Apotehcary:</strong>The Hospital Management System also includes a specialized module for apothecaries or pharmacists to efficiently manage prescriptions and medications. 
                </li>
            </ul>
            <p>
                By using this system, hospitals can significantly improve the quality of care they provide to patients, reduce operational costs, and create a better healthcare experience overall.
            </p>
    </div>
</main>

<?= view('includes/footer') ?>

<?= $this->endSection() ?>