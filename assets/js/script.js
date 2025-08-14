function submitEmployeeDetails() {
    const name = document.getElementById('employeeName').value;
    const post = document.getElementById('employeePost').value;

    // Send data to backend (example endpoint)
    fetch('/api/registerEmployee', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ name, post })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Employee registered successfully!');
            closePopup(); // Close the popup after successful registration
        } else {
            alert('Error registering employee.');
        }
    });
}

function closePopup() {
    const popup = document.getElementById('employeeFormPopup');
    popup.style.display = 'none';
}

// Function to show the popup can be added later