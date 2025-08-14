// Show correct input based on filter type
document.getElementById("filterType").addEventListener("change", function () {
  document.getElementById("weekPicker").style.display = this.value === "week" ? "block" : "none";
  document.getElementById("monthPicker").style.display = this.value === "month" ? "block" : "none";
});

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
  document.querySelectorAll(".presence-table").forEach((table) => {
    let dateLabel = table.previousElementSibling.innerText;
    doc.text(dateLabel, 10, yOffset);
    doc.autoTable({ html: table, startY: yOffset + 5 });
    yOffset = doc.lastAutoTable.finalY + 10;
  });

  doc.save("presence.pdf");
});

// Print all grouped tables
document.getElementById("printTable").addEventListener("click", function () {
  let tables = document.querySelectorAll(".presence-table");
  let printContent = "";

  tables.forEach(table => {
    let dateLabel = table.previousElementSibling.outerHTML;
    printContent += dateLabel + table.outerHTML + "<br>";
  });

  let w = window.open("");
  w.document.write("<html><head><title>Print</title></head><body>" + printContent + "</body></html>");
  w.document.close();
  w.print();
});
