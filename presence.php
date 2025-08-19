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

$filterType = $_GET['filterType'] ?? '';
$filterValue = $_GET['filterValue'] ?? '';

$sql = "SELECT e.employee_name, e.post, p.arrival_time, p.departure_time, p.date 
        FROM presence p 
        JOIN employees e ON p.employee_id = e.employee_id";

if ($filterType === 'week' && $filterValue) {
    $sql .= " WHERE YEARWEEK(date, 1) = YEARWEEK('$filterValue', 1)";
} elseif ($filterType === 'month' && $filterValue) {
    $sql .= " WHERE DATE_FORMAT(date, '%Y-%m') = '$filterValue'";
}

$sql .= " ORDER BY date DESC, arrival_time ASC";
$result = $conn->query($sql);

// Group data by date
$groupedData = [];
if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $groupedData[$row['date']][] = $row;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PRESENCE LIST</title>
  <link rel="stylesheet" href="assets/css/style1.css">
</head>
<body>

<nav class="nav">
  <div class="logo-container">
    <a class="navbar-brand" href="#">
      <div><img class="logo" src="assets/images/tagus logo modif.png" alt=""></div>
    </a>
  </div>
  <div class="list">
    <img class="print-icon" src="assets/images/print-icon.svg" alt="Print" id="printTable">
    <form class="search-form" role="search">
      <input class="search-input" type="search" placeholder="Search" aria-label="Search" />
      <button class="search-submit" type="submit">
        <span class="search-text">Search</span>
        <img class="search-icon" src="assets/images/search-icon.svg" alt="Search Icon">
      </button>
    </form>
  </div>
</nav>

<div class="controls">
  <form method="GET">
    <label for="filterType">Print for:</label>
    <select id="filterType" name="filterType">
      <option value="week" <?= ($filterType == 'week') ? 'selected' : '' ?>>Week</option>
      <option value="month" <?= ($filterType == 'month') ? 'selected' : '' ?>>Month</option>
    </select>

    <input type="week" id="weekPicker" name="filterValue" style="<?= ($filterType != 'week') ? 'display:none;' : '' ?>" value="<?= ($filterType == 'week') ? $filterValue : '' ?>">
    <input type="month" id="monthPicker" name="filterValue" style="<?= ($filterType != 'month') ? 'display:none;' : '' ?>" value="<?= ($filterType == 'month') ? $filterValue : '' ?>">

    <button type="submit">Apply</button>
  </form>

  <button id="exportCSV">Export CSV</button>
  <button id="exportPDF">Export PDF</button>
</div>

<?php if (!empty($groupedData)): ?>
  <?php foreach ($groupedData as $date => $rows): ?>
    <div class="date1">Date: <?= htmlspecialchars(date('F d, Y', strtotime($date))) ?></div>
    <table class="table presence-table">
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Post</th>
          <th>Arrival time</th>
          <th>Departure time</th>
        </tr>
      </thead>
      <tbody>
        <?php $count = 1; ?>
        <?php foreach ($rows as $row): ?>
          <tr>
            <td><?= $count++ ?></td>
            <td><?= htmlspecialchars($row['employee_name']) ?></td>
            <td><?= htmlspecialchars($row['post']) ?></td>
            <td><?= htmlspecialchars($row['arrival_time']) ?></td>
            <td><?= htmlspecialchars($row['departure_time']) ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php endforeach; ?>
<?php else: ?>
  <p>No records found</p>
<?php endif; ?>

<!-- Libraries -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>
<script src="assets/js/presence.js"></script>
</body>
</html>
<?php $conn->close(); ?>
