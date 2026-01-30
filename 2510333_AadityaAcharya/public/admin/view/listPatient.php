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
    <div class="list-container">
    <div class="list-header">
        <h2 class="list-title">Patients</h2>
        <a class="btn" href="public/admin/controller/patientController.php?action=add">+ Add Patient</a>
    </div>
    <table class="data-table">
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
        <td class="actions">
            <a class="btn-edit" href="public/admin/controller/patientController.php?action=edit&id=<?php echo htmlspecialchars($pat['patient_id']) ?>">Edit</a>
            <a class="btn-delete" href="public/admin/controller/patientController.php?action=delete&id=<?php echo htmlspecialchars($pat['patient_id']) ?>" onclick="return confirm('Delete patient?')">Delete</a>
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
