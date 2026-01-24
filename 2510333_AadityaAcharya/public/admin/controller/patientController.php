<?php
session_start();

require "../model/patientModel.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if (!isset($_GET['action'])) {
    $patients = getPatients();
    require '../view/listPatient.php';
}

if (isset($_GET['action']) && $_GET['action']=="add") {
    if ($_POST) {
        $email = $_POST['email'] ;
        $password = $_POST['password'] ;
        if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            die("Invalid email address");
        }
        $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&()])[A-Za-z\d!@#$%^&()]{8,28}$/';
        if (empty($password) || !preg_match($passwordPattern, $password)) {
            die("Password must be 8-28 characters and include uppercase, lowercase, number, and special character");
        }
        addPatient(
            $_POST['name'],
            $email,
            $_POST['phone'],
            password_hash($password, PASSWORD_DEFAULT)
        );
        header("Location: patientController.php");
        exit;
    }
    require '../view/addPatient.php';
}
if (isset($_GET['action']) && $_GET['action']=="delete") {
    if (isset($_GET['id'])) {
        deletePatient($_GET['id']);
    }
    header("Location: patientController.php");
    exit;
}
?>