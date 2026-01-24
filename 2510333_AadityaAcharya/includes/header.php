<?php
define('BASE_URL', '/2510333_AadityaAcharya');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" href="<?php echo BASE_URL ?>/assets/style.css">
</head>
<body>

<header>
    <h2>Clinic Appointment System</h2>
    <nav>
        <?php if(isset($_SESSION['role'])): ?>

            <?php if($_SESSION['role'] === 'admin'): ?>
                <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/admin/controller/dashboardController.php">Dashboard</a>
                <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/admin/controller/doctorController.php">Doctors</a>
                <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/admin/controller/patientController.php">Patients</a>
            <?php endif; ?>

            <?php if($_SESSION['role'] === 'patient'): ?>
                <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/user/controller/appointmentController.php">My Appointments</a>
                <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/user/controller/doctorSearchController.php">Search Doctors</a>
            <?php endif; ?>

            <a href="<?php echo htmlspecialchars(BASE_URL) ?>/public/logout.php">Logout</a>
        <?php endif; ?>
    </nav>
</header>

<main class="main-container">
