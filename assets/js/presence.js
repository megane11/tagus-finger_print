// Show correct input based on filter type
document.getElementById("filterType").addEventListener("change", function () {
  document.getElementById("weekPicker").style.display = this.value === "week" ? "block" : "none";
  document.getElementById("monthPicker").style.display = this.value === "month" ? "block" : "none";
});

// Filter table by date
document.getElementById("filterBtn").addEventListener("click", function () {
  let type = document.getElementById("filterType").value;
  let filterVal = type === "week"
    ? document.getElementById("weekPicker").value
    : document.getElementById("monthPicker").value;

  let rows = document.querySelectorAll("#presenceTable tbody tr");
  rows.forEach(row => {
    let date = row.cells[5].innerText; // Date column
    let show = false;

    if (type === "week" && filterVal) {
      let rowWeek = new Date(date);
      let inputWeek = new Date(filterVal);
      let diff = Math.floor((rowWeek - inputWeek) / (1000 * 60 * 60 * 24 * 7));
      show = diff === 0;
    }
    if (type === "month" && filterVal) {
      show = date.startsWith(filterVal);
    }
    row.style.display = show ? "" : "none";
  });
});

// // Export CSV
// document.getElementById("exportCSV").addEventListener("click", function () {
//   let table = document.getElementById("presenceTable");
//   let rows = Array.from(table.querySelectorAll("tr"));
//   let csvContent = rows.map(row =>
//     Array.from(row.querySelectorAll("th,td")).map(cell => `"${cell.innerText}"`).join(",")
//   ).join("\n");
//   let blob = new Blob([csvContent], { type: "text/csv;charset=utf-8;" });
//   saveAs(blob, "presence.csv");
// });

// // Export PDF
// document.getElementById("exportPDF").addEventListener("click", function () {
//   const { jsPDF } = window.jspdf;
//   let doc = new jsPDF();
//   doc.text("Presence List", 10, 10);
//   doc.autoTable({ html: "#presenceTable" });
//   doc.save("presence.pdf");
// });


// Export CSV (all grouped tables)
document.getElementById("exportCSV").addEventListener("click", function () {
  let tables = document.querySelectorAll(".presence-table");
  let csvRows = [];

  tables.forEach(table => {
    let rows = Array.from(table.querySelectorAll("tr"));
    rows.forEach(row => {
      let cells = Array.from(row.querySelectorAll("th,td")).map(cell => `"${cell.innerText}"`);
      csvRows.push(cells.join(","));
    });
    csvRows.push(""); // empty line between dates
  });

  let blob = new Blob([csvRows.join("\n")], { type: "text/csv;charset=utf-8;" });
  saveAs(blob, "presence.csv");
});

// Export PDF (all grouped tables)
document.getElementById("exportPDF").addEventListener("click", function () {
  const { jsPDF } = window.jspdf;
  let doc = new jsPDF();

  let yOffset = 10;
  document.querySelectorAll(".presence-table").forEach((table, idx) => {
    let dateLabel = table.previousElementSibling.innerText;
    doc.text(dateLabel, 10, yOffset);
    doc.autoTable({ html: table, startY: yOffset + 5 });
    yOffset = doc.lastAutoTable.finalY + 10;
  });

  doc.save("presence.pdf");
});

// Print table
document.getElementById("printTable").addEventListener("click", function () {
  let printContent = document.getElementById("presenceTable").outerHTML;
  let w = window.open("");
  w.document.write("<html><head><title>Print</title></head><body>" + printContent + "</body></html>");
  w.document.close();
  w.print();
});
