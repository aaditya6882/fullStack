<?php
require_once '../../../includes/session.php';
require_once "../../../config/db.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

$patientCount = $conn->query("SELECT COUNT(*) FROM patients")->fetchColumn();
$doctorCount = $conn->query("SELECT COUNT(*) FROM doctors")->fetchColumn();
$appointmentCount = $conn->query("SELECT COUNT(*) FROM appointments")->fetchColumn();

$topDoctors = $conn->query("SELECT name, specialization FROM doctors LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);

require "../view/dashboard.php";
