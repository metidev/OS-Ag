<?php

require_once __DIR__ . '/../Models/SJF.php';
class SJFController
{
    public function sjf()
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

        $sjf = new SJF();
        $sjf->setProcesses($processes);
        $sjf->calculate();

        // get result
        $results = $sjf->getResults();

        include __DIR__ .  '/../Views/sjf_results.php';
    }
}