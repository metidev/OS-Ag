<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css">
    <title>FCFS Results</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
<h1>FCFS Scheduling Results</h1>
<table border="1">
    <thead>
    <tr>
        <th>Process ID</th>
        <th>Arrival Time</th>
        <th>Burst Time</th>
        <th>Start Time</th>
        <th>End Time</th>
        <th>Waiting Time</th>
        <th>Turnaround Time</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($results as $result): ?>
        <tr>
            <td><?= $result['process_id'] ?></td>
            <td><?= $result['arrival_time'] ?></td>
            <td><?= $result['burst_time'] ?></td>
            <td><?= $result['start_time'] ?></td>
            <td><?= $result['end_time'] ?></td>
            <td><?= $result['waiting_time'] ?></td>
            <td><?= $result['turnaround_time'] ?></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>

<h2>Gantt Chart</h2>
<canvas id="ganttChart" width="800" height="400"></canvas>

<script>
    // آماده‌سازی داده‌ها برای نمودار گانت
    const processLabels = <?= json_encode(array_column($results, 'process_id')) ?>;
    const startTimes = <?= json_encode(array_column($results, 'start_time')) ?>;
    const endTimes = <?= json_encode(array_column($results, 'end_time')) ?>;

    // آماده‌سازی داده‌های بازه‌ای برای هر فرآیند
    const ganttData = processLabels.map((label, index) => ({
        label: `P${label}`,
        data: [{ x: startTimes[index], y: `P${label}`, width: endTimes[index] - startTimes[index] }],
        backgroundColor: `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, 0.5)`,
        borderColor: `rgba(${Math.random() * 255}, ${Math.random() * 255}, ${Math.random() * 255}, 1)`,
        borderWidth: 1,
        barThickness: 15
    }));

    // رسم نمودار گانت با Chart.js
    const ctx = document.getElementById('ganttChart').getContext('2d');
    new Chart(ctx, {
        type: 'bar',
        data: {
            labels: processLabels.map(label => `P${label}`),
            datasets: ganttData.map(item => ({
                label: item.label,
                data: item.data.map(data => ({ x: data.x, y: data.y, width: data.width })),
                backgroundColor: item.backgroundColor,
                borderColor: item.borderColor,
                borderWidth: item.borderWidth,
                barThickness: item.barThickness
            }))
        },
        options: {
            indexAxis: 'y', // جهت نمودار افقی
            scales: {
                x: {
                    beginAtZero: true, // محور x از صفر شروع شود
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
<script src="../../public/js/main.js"></script>
</html>
