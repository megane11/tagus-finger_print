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

  <!-- Filter Controls -->
  <div class="controls">
    <label for="filterType">Filter by:</label>
    <select id="filterType">
      <option value="week">Week</option>
      <option value="month">Month</option>
    </select>

    <input type="week" id="weekPicker">
    <input type="month" id="monthPicker" style="display:none;">
    <button id="filterBtn">Apply</button>

    <button id="exportCSV">Export CSV</button>
    <button id="exportPDF">Export PDF</button>
  </div>

  <div class="date1">Date: August 14, 2025</div>

  <table class="table" id="presenceTable">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Name</th>
        <th scope="col">Post</th>
        <th scope="col">Arrival time</th>
        <th scope="col">Departure time</th>
        <th scope="col">Date</th>
      </tr>
    </thead>
    <tbody class="table-body">
      <tr>
        <td>1</td>
        <td>John Smith</td>
        <td>Manager</td>
        <td>08:45 AM</td>
        <td>05:30 PM</td>
        <td>2025-08-14</td>
      </tr>
      <tr>
        <td>2</td>
        <td>Sarah Johnson</td>
        <td>Developer</td>
        <td>09:15 AM</td>
        <td>06:00 PM</td>
        <td>2025-08-14</td>
      </tr>
      <tr>
        <td>3</td>
        <td>Michael Brown</td>
        <td>Designer</td>
        <td>09:00 AM</td>
        <td>05:45 PM</td>
        <td>2025-08-13</td>
      </tr>
    </tbody>
  </table>

  <!-- Libraries -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.25/jspdf.plugin.autotable.min.js"></script>

  <script src="assets/js/presence.js"></script>
</body>
</html>
