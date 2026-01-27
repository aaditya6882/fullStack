<?php
require "../config/db.php";
session_start();

$error = "";
$success = "";

if (empty($_SESSION['csrf_token']) || !is_string($_SESSION['csrf_token'])) {
    $_SESSION['csrf_token'] = bin2hex(random_bytes(32));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $postedToken = isset($_POST['_csrf']) && is_string($_POST['_csrf']) ? $_POST['_csrf'] : null;
        if (!isset($_SESSION['csrf_token']) || $postedToken === null || !hash_equals($_SESSION['csrf_token'], $postedToken)) {
            throw new Exception("Invalid request. Please refresh the page and try again.");
        }

        $username = isset($_POST['username']) ? trim($_POST['username']) : '';
        $password = isset($_POST['password']) ? $_POST['password'] : '';

        if (empty($username)) {
            throw new Exception("Username or email is required.");
        }

        if (empty($password)) {
            throw new Exception("Password is required.");
        }

        if (!isset($conn) || $conn === null) {
            throw new Exception("Database connection failed. Please try again later.");
        }

        $stmt = $conn->prepare("SELECT * FROM admins WHERE username = ?");
        if (!$stmt) {
            throw new Exception("An error occurred. Please try again later.");
        }
        $stmt->execute([$username]);
        $admin = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($admin && password_verify($password, $admin['password'])) {
            $_SESSION['role'] = 'admin';
            session_regenerate_id(true);
            $_SESSION['admin_id'] = $admin['admin_id'];
            header("Location: admin/controller/dashboardController.php");
            exit;
        }

        $stmt = $conn->prepare("SELECT * FROM patients WHERE email = ?");
        if (!$stmt) {
            throw new Exception("An error occurred. Please try again later.");
        }
        $stmt->execute([$username]);
        $patient = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($patient && password_verify($password, $patient['password'])) {
            $_SESSION['role'] = 'patient';
            session_regenerate_id(true);
            $_SESSION['patient_id'] = $patient['patient_id'];
            header("Location: user/controller/appointmentController.php");
            exit;
        }

        throw new Exception("Invalid username or password. Please check your credentials.");

    } catch (PDOException $e) {
        error_log("Login Database Error: " . $e->getMessage());
        $error = "A database error occurred. Please try again later.";
    } catch (Exception $e) {
        $error = $e->getMessage();
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

        <?php if(!empty($error)): ?>
            <div class="error" role="alert">
                <strong>Error:</strong> <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>

        <form method="POST" class="form-card" >
            <input type="hidden" name="_csrf" value="<?php echo htmlspecialchars($_SESSION['csrf_token'] ?? ''); ?>">
            <div class="form-group">
                <label for="username">Username or Email:</label>
                <input type="text" id="username" name="username" placeholder="Enter username or email" 
                       required >
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password" 
                       required>
            </div>
            <button type="submit" class="btn-primary">Login</button>
        </form>
    </div>
</div>
</body>
</html>
