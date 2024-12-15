<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>FCFS Scheduling</title>
</head>
<body>
<h1>FCFS Scheduling Input</h1>
<form action="../Controllers/SchedulingController.php" method="POST">
    <table id="processTable">
        <thead>
        <tr>
            <th>Process ID</th>
            <th>Arrival Time</th>
            <th>Burst Time</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><input type="number" name="process_id[]" required placeholder="Process ID"></td>
            <td><input type="number" name="arrival_time[]" required placeholder="Arrival Time"></td>
            <td><input type="number" name="burst_time[]" required placeholder="Burst Time"></td>
            <td><button type="button" class="remove-button" onclick="removeRow(this)">-</button></td>
        </tr>
        </tbody>
    </table>
    <button type="button" class="add-button" onclick="addRow()">+</button>
    <br><br>
    <button type="submit">Run FCFS</button>
</form>
</body>
<script src="../../public/js/main.js"></script>
</html>
