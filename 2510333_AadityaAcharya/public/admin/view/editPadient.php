<?php require "../../../includes/header.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient</title>
</head>
<body>
    <h2>Edit Patient</h2>
    <form method="POST">
    <input type="text" name="name" value="<?php echo htmlspecialchars($patient['name'])?>" required><br><br>
    <input type="email" name="email" value="<?php echo htmlspecialchars($patient['email'])?>" required><br><br>
    <input type="text" name="phone" value="<?php echo htmlspecialchars($patient['phone'])?>"><br><br>
    <button>Update</button>
    </form>
</body>
</html>
<?php require "../../../includes/footer.php"; ?>
