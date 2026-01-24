<?php
$server="mysql:host=localhost;dbname=ClinicalAppointmentSystem";
$user = "root";
$pass = "";

try {
    $conn = new PDO(
 		$server,
        $user,
        $pass
    );
    $conn->exec("
    	CREATE TABLE IF NOT EXISTS patients (
    		patient_id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    $conn->exec("
        CREATE TABLE IF NOT EXISTS doctors (
            doctor_id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            specialization VARCHAR(100),
            email VARCHAR(100) UNIQUE NOT NULL,
            phone VARCHAR(20),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
    $conn->exec("
        CREATE TABLE IF NOT EXISTS appointments (
    		appointment_id INT AUTO_INCREMENT PRIMARY KEY,
    		patient_id INT NOT NULL,
    		doctor_id INT NOT NULL,
    		appointment_date DATE NOT NULL,
    		start_time TIME NOT NULL,
    		end_time TIME NOT NULL,
    		FOREIGN KEY (patient_id) REFERENCES patients(patient_id),
    		FOREIGN KEY (doctor_id) REFERENCES doctors(doctor_id)
		)
    ");
    $conn->exec("
        CREATE TABLE IF NOT EXISTS admins (
            admin_id INT AUTO_INCREMENT PRIMARY KEY,
            username VARCHAR(50) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )
    ");
} catch (PDOException $e) {
    die("Database connection failed");
}
