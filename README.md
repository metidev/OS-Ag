# Scheduling Algorithms Project in PHP

## Description

This project is a **PHP-based implementation** of various **Operating System Scheduling Algorithms**. It follows the **MVC (Model-View-Controller)** architecture for clean code organization and separation of concerns. The project also provides **visual representation** of Gantt charts using the **Chart.js** library for better understanding of scheduling results.

## Features

- Built using **PHP** with MVC architecture.
- Visual representation of Gantt charts using **Chart.js**.
- Support for multiple scheduling algorithms.

## Implemented Scheduling Algorithms

The following scheduling algorithms are implemented in this project:

1. **MLFQ** (Multi-Level Feedback Queue)
2. **LPT** (Longest Processing Time)
3. **FCFS** (First-Come, First-Served)
4. **SJF** (Shortest Job First)
5. **RR** (Round Robin)
6. **SRT** (Shortest Remaining Time)
7. **HRRN** (Highest Response Ratio Next)
8. **Priority Scheduling**
9. **MLQ** (Multi-Level Queue)

## Requirements

- PHP 7.x or higher
- Web Server (e.g., Apache or Nginx)
- Composer for dependency management
- Browser with JavaScript enabled

## Installation

1. Clone the repository:
   ```bash
   git clone https://github.com/metidev/OS-Ag.git
   ```
2. Move to the project directory:
   ```bash
   cd OS-Ag
   ```
3. Set up a web server (Apache or Nginx) to serve the project directory.
4. Make sure **PHP** is installed and properly configured.
5. Install dependencies via Composer (if applicable):
   ```bash
   composer install
   ```
6. Open the project in a browser:
   ```
   http://localhost/OS-Ag
   ```

## Usage

1. Input job data such as **burst time**, **arrival time**, and **priority** (where applicable).
2. Choose one of the scheduling algorithms from the list.
3. View the results, including:
   - Gantt chart visualization.
   - Job completion times and turn-around times.
4. Compare the results of different algorithms.

## Gantt Chart Visualization

The project integrates **Chart.js** to provide clear and interactive **Gantt charts**, helping users visualize the scheduling of processes over time.

## Project Structure

```
/OS-Ag
├── app/
│   ├── controllers/        # Controllers for handling requests
│   ├── models/             # Models for data processing
│   └── views/              # Views for rendering Gantt charts and results
├── public/                 # Public assets (CSS, JS, etc.)
├── index.php               # Front controller
└── composer.json           # Composer configuration file
```

## Contributing

Contributions are welcome! Please fork this repository, make changes, and submit a pull request.

## License

This project is licensed under the **MIT License**.

---

Feel free to reach out for any questions or suggestions!

