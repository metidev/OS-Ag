<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css">
    <title>FCFS Results</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>
<h1>SJF Scheduling Results</h1>
<table>
    <thead>
    <tr>
        <th>Job</th>
        <th>Arrival Time</th>
        <th>Burst Time</th>
        <th>Finish Time</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $totalWaitingTime = 0;
    $totalTurnaroundTime = 0;
    foreach ($results as $result):
        $totalWaitingTime += $result['waiting_time'];
        $totalTurnaroundTime += $result['turnaround_time'];
        ?>
        <tr>
            <td><?= $result['process_id'] ?></td>
            <td><?= $result['arrival_time'] ?></td>
            <td><?= $result['burst_time'] ?></td>
            <td><?= $result['end_time'] ?></td>
            <td><?= $result['waiting_time'] ?></td>
            <td><?= $result['turnaround_time'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
    <tfoot>
    <tr>
        <td colspan="4" style="text-align: right;"><strong>Average:</strong></td>
        <td>
            <?php
            $numProcesses = count($results);
            echo $totalWaitingTime . ' / ' . $numProcesses . ' = ';
            echo $numProcesses > 0 ? round($totalWaitingTime / $numProcesses, 2) : 0;
            ?>
        </td>
        <td>
            <?php
            echo $totalTurnaroundTime . ' / ' . $numProcesses . ' = ';
            echo $numProcesses > 0 ? round($totalTurnaroundTime / $numProcesses, 2) : 0;
            ?>
        </td>
    </tr>
    </tfoot>
</table>

<h2>Gantt Chart</h2>
<canvas id="ganttChart" width="800" height="400"></canvas>

<script>
    const processLabels = <?= json_encode(array_column($results, 'process_id')) ?>;
    const burstTimes = <?= json_encode(array_column($results, 'burst_time')) ?>;
    const endTimes = <?= json_encode(array_column($results, 'end_time')) ?>;

    // Calculate cumulative start times based on end times
    const ganttData = [];
    let cumulativeEndTime = 0;

    processLabels.forEach((label, index) => {
        const start = cumulativeEndTime; // Start after the last process ends
        const end = start + burstTimes[index]; // Calculate end time
        ganttData.push({
            label: `P${label}`,
            start: start,
            end: end
        });
        cumulativeEndTime = end; // Update cumulative end time
    });

    const ctx = document.getElementById('ganttChart').getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ganttData.map(item => item.label),
            datasets: [{
                label: 'Processes',
                data: ganttData.flatMap(item => [
                    { x: item.start, y: item.label },
                    { x: item.end, y: item.label }
                ]),
                backgroundColor: 'rgba(75, 192, 192, 0.5)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 2,
                fill: false,
                tension: 0.1, // Smooth lines
                segment: {
                    borderColor: ctx => {
                        const skipped = ctx.p0.parsed.x === null || ctx.p1.parsed.x === null;
                        return skipped ? 'rgba(0,0,0,0.2)' : 'rgba(75, 192, 192, 1)';
                    },
                    borderDash: ctx => {
                        const skipped = ctx.p0.parsed.x === null || ctx.p1.parsed.x === null;
                        return skipped ? [6, 6] : [];
                    }
                },
                spanGaps: true
            }]
        },
        options: {
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Time'
                    }
                },
                y: {
                    title: {
                        display: true,
                        text: 'Processes'
                    }
                }
            },
            responsive: true,
            plugins: {
                legend: {
                    position: 'right'
                }
            }
        }
    });
</script>
</body>
<script src="public/js/main.js"></script>

</html>