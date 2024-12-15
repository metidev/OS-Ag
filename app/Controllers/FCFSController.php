<?php

require_once __DIR__ . '/../Models/FCFS.php';

class FCFSController
{
    public function fcfs()
    {
        if (!isset($_POST['arrival_time'], $_POST['burst_time'])) {
            die("Invalid input!");
        }

        $processes = [];
        $arrivalTimes = explode(' ', $_POST['arrival_time']);
        $burstTimes = explode(' ', $_POST['burst_time']);

        for ($i = 0; $i < count($arrivalTimes); $i++) {
            $processes[] = [
                'process_id' => $i + 1,
                'arrival_time' => (int)$arrivalTimes[$i],
                'burst_time' => (int)$burstTimes[$i],
            ];
        }

        $fcfs = new FCFS();
        $fcfs->setProcesses($processes);
        $fcfs->calculate();

        // get result
        $results = $fcfs->getResults();

        include __DIR__ .  '/../Views/fcfs_results.php';
    }
}

