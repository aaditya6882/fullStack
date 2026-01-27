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
    $error = "";
    if ($_POST) {
        try {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $specialization = isset($_POST['specialization']) ? trim($_POST['specialization']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

            if (empty($name)) {
                throw new Exception("Name is required.");
            }

            if (empty($email)) {
                throw new Exception("Email is required.");
            }

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email format.");
            }

            addDoctor($name, $specialization, $email, $phone);
            header("Location: doctorController.php");
            exit;
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                $error = "Email already exists. Please use a different email.";
            } else {
                $error = "A database error occurred. Please try again.";
            }
        } catch (Exception $e) {
            $error = $e->getMessage();
        }
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
