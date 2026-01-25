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

    <table class="dashboard-table">
    <tr>
        <th>Metric</th>
        <th>Count</th>
    </tr>
    <tr>
        <td>Total Doctors</td>
        <td><?php echo htmlspecialchars((string)$doctorCount) ?></td>
    </tr>
    <tr>
        <td>Total Patients</td>
        <td><?php echo htmlspecialchars((string)$patientCount) ?></td>
    </tr>
    <tr>
        <td>Total Appointments</td>
        <td><?php echo htmlspecialchars((string)$appointmentCount) ?></td>
    </tr>
</table>
</div>
</body>
</html>

<?php
require '../../../includes/footer.php';
?>
