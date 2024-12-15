<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>FCFS Scheduling</title>
</head>
<body>
<h1> Scheduling Input</h1>
<div class="input-container">
    <form action="index.php?action=calculate" method="POST">
        <div class="algorithm-selection">
            <label for="algorithm">Algorithm</label>
            <select id="algorithm" name="algorithm">
                <option value="FCFS">First Come First Serve (FCFS)</option>
                <option value="SJF">Shortest Job First (SJF)</option>
            </select>
        </div>
        <div class="arrival-burst-times">
            <label for="arrival_times">Arrival Times (e.g. 0 2 4 6 8)</label>
            <input type="text" id="arrival_times" name="arrival_time" required placeholder="e.g. 0 2 4 6 8">
            <label for="burst_times">Burst Times (e.g. 2 4 6 8 10)</label>
            <input type="text" id="burst_times" name="burst_time" required placeholder="e.g. 2 4 6 8 10">
        </div>
        <button type="submit">Solve</button>
    </form>
</div>
</body>
<script src="public/js/main.js"></script>
</html>
