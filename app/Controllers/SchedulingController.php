<?php

require_once '../Models/FCFS.php';

class SchedulingController {
    public function fcfs()
    {
        if (!isset($_POST['process_id'], $_POST['arrival_time'], $_POST['burst_time'])) {
            die("Invalid input!");
        }

        // ساخت آرایه فرآیندها از ورودی‌های فرم
        $processes = [];
        $processIds = $_POST['process_id'];
        $arrivalTimes = $_POST['arrival_time'];
        $burstTimes = $_POST['burst_time'];

        for ($i = 0; $i < count($processIds); $i++) {
            $processes[] = [
                'process_id' => (int)$processIds[$i],
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

$schedulingController = new schedulingController();
$schedulingController->fcfs();

