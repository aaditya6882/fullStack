<?php
require "../../../config/db.php";

function getPatients() {
    global $conn;
    return $conn->query("SELECT * FROM patients");
}

function addPatient($name, $email, $phone, $password) {
    global $conn;
    $stmt = $conn->prepare(
        "INSERT INTO patients (name, email, phone, password) VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$name, $email, $phone, $password]);
}

function deletePatient($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM appointments WHERE patient_id = ?");
    $stmt->execute([$id]);

    $stmt = $conn->prepare("DELETE FROM patients WHERE patient_id=?");
    $stmt->execute([$id]);
}

function getPatientById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM patients WHERE patient_id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function updatePatient($id, $name, $email, $phone) {
    global $conn;
    $stmt = $conn->prepare("UPDATE patients SET name = ?, email = ?, phone = ? WHERE patient_id = ?");
    $stmt->execute([$name, $email, $phone, $id]);
}
