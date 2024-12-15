    // اضافه کردن ردیف جدید به جدول
    function addRow() {
    const table = document.getElementById("processTable");
    const row = table.insertRow(-1); // اضافه کردن ردیف به آخر جدول

    row.innerHTML = `
                <td><input type="number" name="process_id[]" required placeholder="Process ID"></td>
                <td><input type="number" name="arrival_time[]" required placeholder="Arrival Time"></td>
                <td><input type="number" name="burst_time[]" required placeholder="Burst Time"></td>
                <td><button type="button" class="remove-button" onclick="removeRow(this)">-</button></td>
            `;
}

    // حذف ردیف از جدول
    function removeRow(button) {
    const row = button.parentNode.parentNode;
    row.parentNode.removeChild(row);
}


