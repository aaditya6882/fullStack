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
    <h2>Admin Dashboard</h2>

<table border="1" cellpadding="6" cellspacing="0">
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
</body>
</html>

<?php
require '../../../includes/footer.php';
?>
