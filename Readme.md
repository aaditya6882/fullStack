# Clinic Appointment System

## Login Credentials

**Admin Login:**

- **Username:** admin
- **Password:** clinic123

**Patient Login:**

- Register a new patient with the admin panel and use the registered email and password for the patient login.

## Setup Instructions

1. **Requirements:**
   - PHP
   - MySQL
   - Web server

2. **Database Setup:**
   - Create a database named `ClinicalAppointmentSystem`.
   - Run `insert_admin.php` for the admin password in hashed and manually insert in the admin table.
   - Update database credentials in `config/db.php` if needed.

## How to Run the Application

- If running locally, start your web server and open:
  - `http://localhost/[foldername]/public/login.php`
- If using the hosted version, open:
  - https://student.heraldcollege.edu.np/~np03cs4a240186/2510333_AadityaAcharya/public/login.php

## Features Implemented

- **Admin Panel:**
  - Login and logout for admin
  - Dashboard with stats (doctors, patients, appointments)
  - Add, Read, edit, delete doctors
  - Add, Read, edit, delete patients

- **Patient Panel:**
  - Login and logout for patients
  - Book appointments with doctors
  - View and cancel own appointments
  - Search doctors by name
  - check the live booked time of the doctor for any new appointment.

- **General:**
  - Protection against XSS and SQL Injection is done.
  - CSRF protection on forms
  - Passwords hashed securely

## Known Issues

- No password reset and confirm password functionality
- admin has no availability of search functionality
