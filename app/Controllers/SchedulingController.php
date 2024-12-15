<?php

require_once '../Models/FCFS.php';

class SchedulingController {
    public function fcfs()
    {
        if (!isset($_POST['arrival_time'], $_POST['burst_time'])) {
            die("Invalid input!");
        }

        // ساخت آرایه فرآیندها از ورودی‌های فرم
        $processes = [];
        $arrivalTimes = explode(' ', $_POST['arrival_time']);
        $burstTimes = explode(' ', $_POST['burst_time']);

        for ($i = 0; $i < count($arrivalTimes); $i++) {
            $processes[] = [
                'process_id' => $i + 1, // Assigning process IDs starting from 1
                'arrival_time' => (int)$arrivalTimes[$i],
                'burst_time' => (int)$burstTimes[$i],
            ];
        }

        // Instantiation of the FCFS class
        $fcfs = new FCFS();
        $fcfs->setProcesses($processes);
        $fcfs->calculate();

        // get result
        $results = $fcfs->getResults();

        include '../Views/results.php';
    }
}

$schedulingController = new SchedulingController();
$schedulingController->fcfs();

