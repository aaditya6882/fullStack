<?php
require  '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Doctor</title>
</head>
<body>
<div class="form-container">
<h2>Add Doctor</h2>
<?php if(!empty($error)): ?>
    <div class="error" role="alert">
        <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
    </div>
<?php endif; ?>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="specialization" placeholder="Specialization"><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="phone" placeholder="Phone"><br><br>
    <button class="btn">Add Doctor</button>
</form>
</div>
<a href="doctorController.php" class="btn" style="margin: 15px;">Back</a>
</body>
</html>
<?php
require '../../../includes/footer.php';
?>
