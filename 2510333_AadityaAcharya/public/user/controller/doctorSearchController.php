<?php
require_once '../../../includes/session.php';
require_once "../../../config/db.php";
require_once "../../admin/model/doctorModel.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patient') {
    header("Location: ../../login.php");
    exit;
}

$q = isset($_GET['q']) ? trim($_GET['q']) : '';
$doctors = getDoctors();
if ($q !== '') {
    $doctors = searchDoctorsByName($q);
} else {
    $doctors = getDoctors();
}
require "../view/searchDoctors.php";
