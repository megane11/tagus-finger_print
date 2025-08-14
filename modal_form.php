<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Employee</title>
    <link rel="stylesheet" href="assets/css/style2.css">
</head>

<body>
    <!-- Modal Structure -->
    <div id="employeeFormPopup" class="modal">
        <div class="modal-content">
            <h2>Register Employee ??</h2>
            <form id="employeeForm" action="#" method="post">
                <label for="employeeName">Name:</label>
                <input type="text" id="employeeName" name="employeeName" required>

                <label for="employeePost">Post:</label>
                <select id="employeePost" name="employeePost" required>
                    <option value="employee">Employee</option>
                    <option value="intern">Intern</option>
                </select>

                <button type="submit">Submit</button>
            </form>
        </div>
    </div>
</body>

</html>
