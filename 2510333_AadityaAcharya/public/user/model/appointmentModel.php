<?php
require_once "../../../config/db.php";
function getAppointmentsByPatient($pid) {
    global $conn;
    $stmt = $conn->prepare("
        SELECT a.*, d.name AS doctor
        FROM appointments a
        JOIN doctors d ON a.doctor_id = d.doctor_id
        WHERE patient_id = ?
        ORDER BY appointment_date ASC, start_time ASC
    ");
    $stmt->execute([$pid]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function addAppointment($pid, $did, $date, $start, $end) {
    global $conn;

    $check = $conn->prepare("
        SELECT * FROM appointments
        WHERE doctor_id = ? AND appointment_date = ?
        AND (start_time < ? AND end_time > ?)
    ");
    $check->execute([$did, $date, $end, $start]);

    if ($check->rowCount() > 0) {
        return false; 
    }

    $stmt = $conn->prepare("
        INSERT INTO appointments (patient_id, doctor_id, appointment_date, start_time, end_time)
        VALUES (?, ?, ?, ?, ?)
    ");
    return $stmt->execute([$pid, $did, $date, $start, $end]);
}

function deleteAppointment($id) {
    global $conn;
    $stmt = $conn->prepare("DELETE FROM appointments WHERE appointment_id = ?");
    $stmt->execute([$id]);
}

function getDoctorAppointmentsByDate($did, $date) {
    global $conn;
    $stmt = $conn->prepare("SELECT appointment_id, start_time, end_time FROM appointments WHERE doctor_id = ? AND appointment_date = ?");
    $stmt->execute([$did, $date]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}
