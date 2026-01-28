<?php
require '../../../includes/session.php';
require "../../../config/db.php";
require "../../admin/model/doctorModel.php";

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
