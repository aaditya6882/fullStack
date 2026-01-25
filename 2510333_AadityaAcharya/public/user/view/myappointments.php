<?php
require '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Appointments</title>
</head>
<body>
    <div class="list-container">
<div class="list-header">
    <h2 class="list-title">My Appointments</h2>
    <a class="btn" href="appointmentController.php?action=book">+ Book Appointment</a>
</div>
<table class="data-table">
    <tr>
        <th>ID</th>
        <th>Doctor</th>
        <th>Date</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Actions</th>
    </tr>
    <?php foreach($appointments as $app): ?>
    <tr>
        <td><?php echo htmlspecialchars($app['appointment_id']) ?></td>
        <td><?php echo htmlspecialchars($app['doctor']) ?></td>
        <td><?php echo htmlspecialchars($app['appointment_date']) ?></td>
        <td><?php echo htmlspecialchars($app['start_time']) ?></td>
        <td><?php echo htmlspecialchars($app['end_time']) ?></td>
        <td class="actions">
            <a class="btn-delete" href="appointmentController.php?action=delete&id=<?php echo htmlspecialchars($app['appointment_id']) ?>" onclick="return confirm('Cancel appointment?')">Cancel</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</div>
</body>
</html>
<?php
require '../../../includes/footer.php';
?>
