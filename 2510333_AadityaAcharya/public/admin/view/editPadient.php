<?php require "../../../includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
</head>
<body>
    <div class="form-container">
    <h2>Edit Patient</h2>
    <?php if(!empty($error)): ?>
        <div class="error" role="alert">
            <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
        </div>
    <?php endif; ?>
    <form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($patient['name'])?>" placeholder="Name" required><br><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($patient['email'])?>" placeholder="Email" required><br><br>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($patient['phone'])?>" placeholder="Phone"><br><br>
    <button class="btn">Update</button>
    </form>
    </div>
    <a href="patientController.php" class="btn" style="margin: 15px;">Back</a>
</body>
</html>
<?php require "../../../includes/footer.php"; ?>
