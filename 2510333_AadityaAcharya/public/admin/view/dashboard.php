<?php
require  '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
</head>
<body>
    <div class="dashboard-container">
        <h2 class="dashboard-title">Admin Dashboard</h2>

        <div class="dashboard-cards">
            <div class="dashboard-card card-doctors">
                <h3 class="card-label">Total Doctors</h3>
                <p class="card-count"><?php echo htmlspecialchars((string)$doctorCount) ?></p>
            </div>

            <div class="dashboard-card card-patients">
                <h3 class="card-label">Total Patients</h3>
                <p class="card-count"><?php echo htmlspecialchars((string)$patientCount) ?></p>
            </div>

            <div class="dashboard-card card-appointments">
                <h3 class="card-label">Total Appointments</h3>
                <p class="card-count"><?php echo htmlspecialchars((string)$appointmentCount) ?></p>
            </div>
        </div>

        <div class="top-doctors-section">
            <h3 class="section-title">Top Doctors</h3>
            <ul class="doctor-list">
                <?php foreach ($topDoctors as $doctor): ?>
                    <li class="doctor-item">
                        <span class="doctor-name"><?php echo htmlspecialchars($doctor['name']); ?></span>
                        <span class="doctor-specialization"><?php echo htmlspecialchars($doctor['specialization']); ?></span>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</body>
</html>

<?php
require '../../../includes/footer.php';
?>
