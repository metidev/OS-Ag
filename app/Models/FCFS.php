<?php

class FCFS
{
    private $processes = [];
    private $results = [];

    public function setProcesses($processes)
    {
        $this->processes = $processes;
    }

    // run FCFS Algorithm
    public function calculate()
    {
        $currentTime = 0;

        foreach ($this->processes as $process) {
            $arrivalTime = $process['arrival_time'];
            $burstTime = $process['burst_time'];

            // If the next process hasn't arrived yet, we wait
            if ($currentTime < $arrivalTime) {
                $currentTime = $arrivalTime;
            }

            $startTime = $currentTime;
            $endTime = $currentTime + $burstTime;
            $waitingTime = $startTime - $arrivalTime;
            $turnaroundTime = $endTime - $arrivalTime;

            // save results
            $this->results[] = [
                'process_id' => $process['process_id'],
                'arrival_time' => $arrivalTime,
                'burst_time' => $burstTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'waiting_time' => $waitingTime,
                'turnaround_time' => $turnaroundTime
            ];

            $currentTime = $endTime;
        }
    }

    public function getResults()
    {
        return $this->results;
    }
}
