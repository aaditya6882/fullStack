<?php
require '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients</title>
</head>
<body>
    <h2>Patients</h2>
    <a class="btn-primary" href="patientController.php?action=add">Add Patient</a>
    <table border="1" cellpadding="5" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach($patients as $pat): ?>
    <tr>
        <td><?php echo htmlspecialchars($pat['patient_id']) ?></td>
        <td><?php echo htmlspecialchars($pat['name']) ?></td>
        <td><?php echo htmlspecialchars($pat['email']) ?></td>
        <td><?php echo htmlspecialchars($pat['phone']) ?></td>
        <td>
            <a href="patientController.php?action=delete&id=<?php echo htmlspecialchars($pat['patient_id']) ?>" onclick="return confirm('Delete patient?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
</body>
</html>
<?php
require '../../../includes/footer.php';
?>
