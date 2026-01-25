<?php
require "../config/db.php";
session_start();

if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_POST) {
    $postedToken = isset($_POST['_csrf']) && is_string($_POST['_csrf']) ? $_POST['_csrf'] : null;
    if (!isset($_SESSION['csrf_token']) || $postedToken === null || !hash_equals($_SESSION['csrf_token'], $postedToken)) {
        $error = "Invalid request";
    } else {

    $stmt = $conn->prepare("SELECT * FROM admins WHERE username=?");
    $stmt->execute([$_POST['username']]);
    $admin = $stmt->fetch();

    if ($admin && password_verify($_POST['password'], $admin['password'])) {
        $_SESSION['role'] = 'admin';
        session_regenerate_id(true);
        $_SESSION['admin_id'] = $admin['admin_id'];
        header("Location: admin/controller/dashboardController.php");
        exit;
    }

    $stmt = $conn->prepare("SELECT * FROM patients WHERE email=?");
    $stmt->execute([$_POST['username']]);
    $patient = $stmt->fetch();

    if ($patient && password_verify($_POST['password'], $patient['password'])) {
        $_SESSION['role'] = 'patient';
        session_regenerate_id(true);
        $_SESSION['patient_id'] = $patient['patient_id'];
        header("Location: user/controller/appointmentController.php");
        exit;
    }

    $error = "Invalid username or password";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - Clinic Appointment System</title>
<link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="login-container">
    <div class="login-card">
        <h2>Clinic Appointment System</h2>

        <?php if(isset($error)): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <form method="POST" class="form-card">
            <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
            <div class="form-group">
                <input type="text" name="username" placeholder="Enter username or email" required>
            </div>
            <div class="form-group">
                <input type="password" name="password" placeholder="Enter password" required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>
