<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
require_once 'config.php';

$sql = "SELECT * FROM students";
$result = $conn->query($sql);


?>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Course</th>
        <th>Year</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['course'] ?></td>
        <td><?= $row['year'] ?></td>
    </tr>
    <?php endwhile; ?>

</table>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $course = $_POST['course'];
    $year = $_POST['year'];
    
    $sql = "INSERT INTO students (name, course, year)
            VALUES ('$name', '$course', '$year')";
    $conn->query($sql);
    
    echo "Student added!";
}
?>
<form method="POST">
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="course" placeholder="Course" required>
    <input type="number" name="year" placeholder="Year" required>
    <button type="submit">Add Student</button>
</form>

</body>
</html>