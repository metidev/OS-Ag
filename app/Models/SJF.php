<?php
class SJF
{
    private $processes = [];
    private $results = [];

    public function setProcesses($processes)
    {
        $this->processes = $processes;
    }
    public function calculate()
    {

        usort($this->processes, function ($a, $b) {
            return $a['burst_time'] <=> $b['burst_time'];
        });

        $currentTime = 0;
        $results = [];

        

        foreach ($this->processes as $process) {
            $startTime = $currentTime;
            $endTime = $startTime + $process['burst_time'];
            $arrivalTime = $process['arrival_time'];
            $burstTime = $process['burst_time'];
            $waitingTime = $startTime - $arrivalTime;
            $turnaroundTime = $endTime - $arrivalTime;

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
