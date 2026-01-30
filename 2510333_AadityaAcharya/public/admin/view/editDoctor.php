<?php
require '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Doctor</title>
</head>
<body>
    <h2>Edit Doctor</h2>
    <form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($doctor['name']) ?>" required><br><br>
    <input type="text" name="specialization" value="<?php echo htmlspecialchars($doctor['specialization']) ?>"><br><br>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($doctor['phone']) ?>"><br><br>
    <button class="btn">Update Doctor</button>
</form>
<a href="public/admin/controller/doctorController.php" class="btn" style="margin: 15px;">Back</a>
</body>
</html>

<?php
require '../../../includes/footer.php';
?>
