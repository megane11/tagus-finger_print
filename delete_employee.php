<?php
// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$dbname = "employeepresence";

$conn = new mysqli($host, $user, $pass, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['employee_id'])) {
    $employee_id = intval($_POST['employee_id']);

    // Delete from presence first (to avoid foreign key conflicts)
    $conn->query("DELETE FROM presence WHERE employee_id = $employee_id");

    // Delete employee record
    $conn->query("DELETE FROM employees WHERE employee_id = $employee_id");

    // Redirect back
    header("Location: presence.php?msg=Employee+deleted+successfully");
    exit;
} else {
    header("Location: presence.php?error=Invalid+request");
    exit;
}
