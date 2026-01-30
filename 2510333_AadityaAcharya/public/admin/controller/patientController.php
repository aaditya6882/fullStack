<?php
require_once '../../../includes/session.php';

require_once "../model/patientModel.php";

if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../../login.php");
    exit;
}

if (!isset($_GET['action'])) {
    $patients = getPatients();
    require '../view/listPatient.php';
}

if (isset($_GET['action']) && $_GET['action']=="add") {
    $error = "";
    if ($_POST) {
        try {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';
            $password = isset($_POST['password']) ? $_POST['password'] : '';

            if (empty($name)) {
                throw new Exception("Name is required.");
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email address.");
            }

            $passwordPattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[!@#$%^&()])[A-Za-z\d!@#$%^&()]{8,28}$/';
            if (empty($password) || !preg_match($passwordPattern, $password)) {
                throw new Exception("Password must be 8-28 characters and include uppercase, lowercase, number, and special character.");
            }

            addPatient($name, $email, $phone, password_hash($password, PASSWORD_DEFAULT));
            header("Location: patientController.php");
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
    require '../view/addPatient.php';
}
if (isset($_GET['action']) && $_GET['action']=="delete") {
    if (isset($_GET['id'])) {
        deletePatient($_GET['id']);
    }
    header("Location: patientController.php");
    exit;
}

if (isset($_GET['action']) && $_GET['action']=="edit") {
    if (!isset($_GET['id'])) {
        header("Location: patientController.php");
        exit;
    }
    $patient = getPatientById($_GET['id']);
    if (!$patient) {
        header("Location: patientController.php");
        exit;
    }
    $error = "";
    if ($_POST) {
        try {
            $name = isset($_POST['name']) ? trim($_POST['name']) : '';
            $email = isset($_POST['email']) ? trim($_POST['email']) : '';
            $phone = isset($_POST['phone']) ? trim($_POST['phone']) : '';

            if (empty($name)) {
                throw new Exception("Name is required.");
            }

            if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception("Invalid email address.");
            }

            updatePatient($_GET['id'], $name, $email, $phone);
            header("Location: patientController.php");
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
    require '../view/editPadient.php';
}
?>