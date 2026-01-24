<?php
require "../../../config/db.php";
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'patient') {
    header("Location: ../../login.php");
    exit;
}
require "../model/appointmentModel.php";
require "../../admin/model/doctorModel.php";

$patientId = $_SESSION['patient_id'];

if (!isset($_GET['action'])) {
    $appointments = getAppointmentsByPatient($patientId);
    require '../view/myAppointments.php';
}

if (isset($_GET['action']) && $_GET['action'] === 'availability') {
    $did = isset($_GET['doctor']) ? $_GET['doctor'] : null;
    $date = isset($_GET['date']) ? $_GET['date'] : null;
    $slots = getDoctorAppointmentsByDate($did, $date);
    echo json_encode(['booked' => $slots]);
    exit;
}

if (isset($_GET['action']) && $_GET['action']=="book") {
    if ($_POST) {
        $doctor = $_POST['doctor'];
        $date = $_POST['date'];
        $start = $_POST['start'];
        $end = $_POST['end'];

        if ($doctor && $date && $start && $end) {
            if (!addAppointment($patientId, $doctor, $date, $start, $end)) {
                $error = "Time slot not available";
            } else {
                header("Location: appointmentController.php");
                exit;
            }
        } else {
            $error = "All fields are required";
        }
    }

    require '../view/bookAppointment.php';
}
if (isset($_GET['action']) && $_GET['action']=="delete") {
    if (isset($_GET['id'])) {
        deleteAppointment($_GET['id']);
    }
    header("Location: appointmentController.php");
    exit;
}
