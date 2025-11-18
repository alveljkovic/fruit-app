# 🍏 Juicer Simulation Project

A simple PHP console application demonstrating Object-Oriented Programming (OOP) principles, Design Patterns (Factory Method and Prototype), and basic simulation logic.

---

## 👨‍💻 1. Contact Information

| Detail | Value |
| :--- | :--- |
| **Name** | Aleksandar Veljković |
| **Email** | aleksandar.veljkovic@gmail.com |

---

## 📝 2. Project Overview (The Juicer Simulation)

This project models the core components and processes of a fruit juicer operation. The simulation executes 100 actions, periodically adding new fruits and performing a "squeeze" action, logging the process status in real-time.

## 🚀 3. Local Project Setup & Run Instructions

Follow these steps to run the simulation on your local development environment.

### Prerequisites

* **PHP:** Ensure PHP (version 7.4 or higher is recommended) is installed and accessible via your console's PATH.
* **Composer:** Composer (PHP dependency manager) must be installed globally.

### Step-by-Step Guide

1.  **Clone the Repository**
    ```bash
    git clone git@github.com:alveljkovic/fruit-app.git
    cd fruit-app
    ```

2.  **Install Dependencies**
    Navigate to the project's root directory and run Composer to install dependencies and generate the autoloader map:

    ```bash
    composer install
    ```

3.  **Start PHP Development Server**
    Execute the following command in your bash or command console to start the built-in PHP development server, which will execute the main simulation script (`index.php`):

    ```bash
    php -S localhost:8000
    ```
    *(Note: This command will lock the console to the server process.)*

4.  **View Simulation Output**
    Open your web browser and navigate to the local server address:

    ```
    http://localhost:8000/
    ```

    The browser will execute the `index.php` script, and the output (including the 100 steps of the simulation log) will be displayed directly in the browser window. The final result will summarize the total juice produced.
