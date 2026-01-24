<?php
session_start();

require '../model/doctorModel.php';

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if (!isset($_GET['action'])) {
    $doctors = getDoctors();
    require '../view/listDoctor.php';
}

if (isset($_GET['action']) && $_GET['action']=="add") {
    if ($_POST) {
        addDoctor(
            $_POST['name'],
            $_POST['specialization'],
            $_POST['email'],
            $_POST['phone']
        );
        header("Location: doctorController.php");
        exit;
    }
    require '../view/addDoctor.php';
}

if (isset($_GET['action']) && $_GET['action']=="edit") {
    if (isset($_GET['id'])) {
        $doctor = getDoctorById($_GET['id']);
        if ($_POST) {
            updateDoctor($_GET['id'], $_POST['name'], $_POST['specialization'], $_POST['phone']);
            header("Location: doctorController.php");
            exit;
        }
        require '../view/editDoctor.php';
    } else {
        header("Location: doctorController.php");
        exit;
    }
}

if (isset($_GET['action']) && $_GET['action']=="delete") {
    if (isset($_GET['id'])) {
        deleteDoctor($_GET['id']);
    }
    header("Location: doctorController.php");
    exit;
}
