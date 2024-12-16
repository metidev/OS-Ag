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
            if ($a['arrival_time'] === $b['arrival_time']) {
                return $a['process_id'] <=> $b['process_id'];
            }
            return $a['arrival_time'] <=> $b['arrival_time'];
        });

        $currentTime = 0;
        $results = [];

        // Process the first arriving process
        if (!empty($this->processes)) {
            $firstProcess = array_shift($this->processes);
            $startTime = $currentTime;
            $endTime = $startTime + $firstProcess['burst_time'];
            $arrivalTime = $firstProcess['arrival_time'];
            $burstTime = $firstProcess['burst_time'];
            $waitingTime = $startTime - $arrivalTime;
            $turnaroundTime = $endTime - $arrivalTime;

            $this->results[] = [
                'process_id' => $firstProcess['process_id'],
                'arrival_time' => $arrivalTime,
                'burst_time' => $burstTime,
                'start_time' => $startTime,
                'end_time' => $endTime,
                'waiting_time' => $waitingTime,
                'turnaround_time' => $turnaroundTime
            ];
            $currentTime = $endTime;
        }

        // Sort remaining processes by burst time
        usort($this->processes, function ($a, $b) {
            return $a['burst_time'] <=> $b['burst_time'];
        });

        // Process remaining processes
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
