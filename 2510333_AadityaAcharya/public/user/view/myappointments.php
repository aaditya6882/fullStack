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
        <th>Status</th>
        <th>Actions</th>
    </tr>
    <?php foreach($appointments as $app): 
        $appointmentEndTimestamp = strtotime($app['appointment_date'] . ' ' . $app['end_time']);
        $currentTimestamp = time();
        $isCompleted = ($currentTimestamp > $appointmentEndTimestamp);
    ?>
    <tr>
        <td><?php echo htmlspecialchars($app['appointment_id']) ?></td>
        <td><?php echo htmlspecialchars($app['doctor']) ?></td>
        <td><?php echo htmlspecialchars($app['appointment_date']) ?></td>
        <td><?php echo htmlspecialchars($app['start_time']) ?></td>
        <td><?php echo htmlspecialchars($app['end_time']) ?></td>
        <td>
            <?php if ($isCompleted): ?>
                <span class="status-completed">Completed</span>
            <?php else: ?>
                <span class="status-upcoming">Upcoming</span>
            <?php endif; ?>
        </td>
        <td class="actions">
            <?php if (!$isCompleted): ?>
                <a class="btn-delete" href="appointmentController.php?action=delete&id=<?php echo htmlspecialchars($app['appointment_id']) ?>" onclick="return confirm('Cancel appointment?')">Cancel</a>
            <?php endif; ?>
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
