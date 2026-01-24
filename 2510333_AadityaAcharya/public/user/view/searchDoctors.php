<?php
require '../../../includes/header.php';
?>
<h2>Search Doctors</h2>

<form method="GET" action="doctorSearchController.php">
    <label>Search by name:</label>
    <input type="text" name="q" value="<?php echo htmlspecialchars($_GET['q'] ?? '') ?>" placeholder="Doctor name">
    <button type="submit">Search</button>
</form>
<?php if (!empty($doctors)): ?>
<ul>
    <?php foreach ($doctors as $doc): ?>
        <li><?php echo htmlspecialchars($doc['name']) ?> (<?php echo htmlspecialchars($doc['specialization'] ?? '') ?>)</li>
    <?php endforeach; ?>
</ul>
<?php else: ?>
<p>No doctors found.</p>
<?php endif; ?>

<?php require '../../../includes/footer.php'; ?>
