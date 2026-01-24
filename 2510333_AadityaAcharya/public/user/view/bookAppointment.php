<?php
require  '../../../includes/header.php';
?>
<h2>Book Appointment</h2>

<?php if(isset($error)): ?>
<p><?php echo htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <label>Doctor:</label><br>
    <select name="doctor" id="doctor" onchange="updateTime()" required>
        <option value="">Select Doctor</option>
        <?php foreach($doctors as $doc): ?>
        <option value="<?php echo htmlspecialchars((string)$doc['doctor_id']) ?>"><?php echo htmlspecialchars($doc['name']) ?> (<?php echo htmlspecialchars($doc['specialization']) ?>)</option>
        <?php endforeach; ?>
    </select><br><br>

    <label>Date:</label><br>
    <input type="date" name="date" required><br><br>

    <div id="availability">Select doctor and date to see availability.</div>

    <label>Start Time:</label><br>
    <input type="time" name="start" required><br><br>

    <label>End Time:</label><br>
    <input type="time" name="end" required><br><br>

    <button>Book Appointment</button>
</form>
<a href="appointmentController.php">Back</a>
<?php
echo '<script src="' . htmlspecialchars(BASE_URL) . '/assets/js/script.js"></script>';
require '../../../includes/footer.php';
?>
