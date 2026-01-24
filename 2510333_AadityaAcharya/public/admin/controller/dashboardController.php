<?php
session_start();
require "../../../config/db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

$patientCount = $conn->query("SELECT COUNT(*) FROM patients")->fetchColumn();
$doctorCount = $conn->query("SELECT COUNT(*) FROM doctors")->fetchColumn();
$appointmentCount = $conn->query("SELECT COUNT(*) FROM appointments")->fetchColumn();


require "../view/dashboard.php";
