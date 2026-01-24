<?php
session_start();
if (isset($_SESSION['role'])) {
    if ($_SESSION['role'] === 'admin') {
        header("Location: admin/controller/dashboardController.php");
        exit;
    } elseif ($_SESSION['role'] === 'patient') {
        header("Location: user/controller/appointmentController.php");
        exit;
    }
}
header("Location: login.php");
exit;
