<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Presence List</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <header>
        <img src="logo.png" alt="Logo" class="logo">
        <h1>Presence List</h1>
    </header>

    <section class="controls">
        <label for="filterType">Filter by:</label>
        <select id="filterType">
            <option value="week">Week</option>
            <option value="month">Month</option>
        </select>

        <input type="month" id="monthPicker" style="display:none;">
        <input type="week" id="weekPicker">

        <button id="filterBtn">Apply Filter</button>

        <div class="export-buttons">
            <button id="exportCSV">Export CSV</button>
            <button id="exportPDF">Export PDF</button>
            <button id="printTable">Print</button>
        </div>
    </section>

    <section class="table-container">
        <table id="presenceTable">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Post</th>
                    <th>Arrival Time</th>
                    <th>Departure Time</th>
                    <th>Date</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <script src="assets/js/js.js"></script>
</body>
</html>
