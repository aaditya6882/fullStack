<?php
require "../../../config/db.php";

function getDoctors() {
    global $conn;
    return $conn->query("SELECT * FROM doctors");
}

function getDoctorById($id) {
    global $conn;
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE doctor_id=?");
    $stmt->execute([$id]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

function searchDoctorsByName(string $q) {
    global $conn;
    $pattern = "%" . $q . "%";
    $stmt = $conn->prepare("SELECT * FROM doctors WHERE name LIKE ?");
    $stmt->execute([$pattern]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function addDoctor($name, $specialization, $email, $phone) {
    global $conn;
    $stmt = $conn->prepare(
        "INSERT INTO doctors (name, specialization, email, phone) VALUES (?, ?, ?, ?)"
    );
    $stmt->execute([$name, $specialization, $email, $phone]);
}

function updateDoctor($id, $name, $specialization, $phone) {
    global $conn;
    $stmt = $conn->prepare(
        "UPDATE doctors SET name=?, specialization=?, phone=? WHERE doctor_id=?"
    );
    $stmt->execute([$name, $specialization, $phone, $id]);
}

function deleteDoctor($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM appointments WHERE doctor_id = ?");
    $stmt->execute([$id]);
    
    $stmt = $conn->prepare("DELETE FROM doctors WHERE doctor_id=?");
    $stmt->execute([$id]);
}
