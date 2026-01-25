<?php
require '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>
    <div class="list-container">
    <div class="list-header">
        <h2 class="list-title">Doctors</h2>
        <a class="btn btn-primary" href="doctorController.php?action=add">+ Add Doctor</a>
    </div>
    <table class="data-table">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Specialization</th>
        <th>Phone</th>
        <th>Actions</th>
    </tr>
    <?php foreach($doctors as $doc): ?>
    <tr>
        <td><?php echo htmlspecialchars($doc['doctor_id']) ?></td>
        <td><?php echo htmlspecialchars($doc['name']) ?></td>
        <td><?php echo htmlspecialchars($doc['specialization']) ?></td>
        <td><?php echo htmlspecialchars($doc['phone']) ?></td>
        <td class="actions">
            <a class="btn-edit" href="doctorController.php?action=edit&id=<?php echo htmlspecialchars($doc['doctor_id']) ?>">Edit</a>
            <a class="btn-delete" href="doctorController.php?action=delete&id=<?php echo htmlspecialchars($doc['doctor_id']) ?>" onclick="return confirm('Delete doctor?')">Delete</a>
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
