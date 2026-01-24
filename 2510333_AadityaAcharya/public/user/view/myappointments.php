<?php
require '../../../includes/header.php';
?>
<h2>My Appointments</h2>
<a href="appointmentController.php?action=book">Book Appointment</a>
<table border="1" cellpadding="5" cellspacing="0">
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
        <td>
            <a href="appointmentController.php?action=delete&id=<?php echo htmlspecialchars($app['appointment_id']) ?>" onclick="return confirm('Cancel appointment?')">Cancel</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<?php
require '../../../includes/footer.php';
?>
