<?php
require '../../../includes/header.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctors</title>
</head>
<body>
    <div class="list-container">
<h2 class="list-title">Doctors</h2>

<form method="GET" action="public/user/controller/doctorSearchController.php" class="search-form">
    <input type="text" name="q" value="<?php echo htmlspecialchars($_GET['q'] ?? '') ?>" placeholder="Search by doctor name">
    <button type="submit" class="btn">Search</button>
</form>

<?php if (!empty($doctors)): ?>
<table class="data-table">
    <tr>
        <th>Name</th>
        <th>Specialization</th>
    </tr>
    <?php foreach ($doctors as $doc): ?>
    <tr>
        <td><?php echo htmlspecialchars($doc['name']) ?></td>
        <td><?php echo htmlspecialchars($doc['specialization'] ?? '') ?></td>
    </tr>
    <?php endforeach; ?>
</table>
<?php else: ?>
<p class="no-results">No doctors found.</p>
<?php endif; ?>
</div>

</body>
</html>
<?php require '../../../includes/footer.php'; ?>
