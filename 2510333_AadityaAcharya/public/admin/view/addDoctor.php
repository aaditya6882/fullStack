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
<h2>Add Doctor</h2>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required><br><br>
    <input type="text" name="specialization" placeholder="Specialization"><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="text" name="phone" placeholder="Phone"><br><br>
    <button>Add Doctor</button>
</form>
<a href="doctorController.php">Back</a> 
</body>
</html>
<?php
require '../../../includes/footer.php';
?>
