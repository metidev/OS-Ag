<?php

require_once './app/Controllers/FCFSController.php';
require_once './app/Controllers/SJFController.php';

$action = $_GET['action'] ?? 'input';

switch ($action) {
    case 'input':
        require_once './app/Views/input.php';
        break;

    case 'calculate':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $algorithm = $_POST['algorithm'] ?? '';

            switch ($algorithm) {
                case 'SJF':
                    $controller = new SJFController();
                    $controller->sjf();
                    break;

                case 'FCFS':
                    $controller = new FCFSController();
                    $controller->fcfs();
                    break;

                default:
                    echo "Invalid Algorithm Selected.";
                    break;
            }
        }
        break;

    default:
        echo "Invalid Action.";
        break;
}
