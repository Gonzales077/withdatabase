<?php
SESSION_START();
if (!isset($_SESSION['username'])) {
       header("Location: http://localhost/GROUP4/index.php");
    exit(); 
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Portal</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <style>
    body {
            font-family: 'Poppins', sans-serif;
            background-color: #f8f9fa;
        }

        .container-fluid {
            margin-top: 20px;
        }

        .card {
            border-radius: 10px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .card-title {
            font-weight: 600;
        }

        table {
            background-color: #ffffff;
            border-radius: 10px;
            overflow: hidden;
        }

        thead {
            background-color: #007bff;
            color: #ffffff;
        }

        th, td {
            vertical-align: middle;
            text-align: center;
        }

        tbody tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            border-radius: 5px;
            font-weight: 500;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
        }

        .btn-success {
            background-color: #28a745;
            border: none;
        }

        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
    /* Light Mode Styles */
    body.light-mode {
      background-color: #f8f9fa;
      color: #212529;
    }

    /* Dark Mode Styles */
    body.dark-mode {
      background-color: #343a40;
      color: #ffffff;
    }

    /* Switch Container */
    .switch-container {
      position: fixed;
      bottom: 20px; /* Position from the bottom */
      left: 20px; /* Position from the left */
      display: flex;
      align-items: center;
    }

    /* Hide the default checkbox */
    .switch-checkbox {
      display: none;
    }

    /* Style the slider */
    .switch-label {
      cursor: pointer;
      display: flex;
      align-items: center;
      font-size: 16px;
    }

    .switch-slider {
      position: relative;
      display: inline-block;
      width: 50px;
      height: 24px;
      background-color: #ccc;
      border-radius: 50px;
      transition: background-color 0.3s ease;
    }

    .switch-slider:before {
      content: '';
      position: absolute;
      width: 22px;
      height: 22px;
      border-radius: 50%;
      background-color: white;
      transition: transform 0.3s ease;
      transform: translateX(2px);
    }

    .switch-checkbox:checked + .switch-label .switch-slider {
      background-color: #007bff;
    }

    .switch-checkbox:checked + .switch-label .switch-slider:before {
      transform: translateX(26px);
    }

    /* Sidebar Styles */
    .sidebar {
      position: fixed;
      top: 0;
      right: 0;
      height: 100%;
      width: 250px;
      background-color: black;
      color: #ffffff;
      box-shadow: -2px 0 5px rgba(0,0,0,0.3);
      transform: translateX(100%);
      transition: transform 0.3s ease;
      z-index: 1000;
      overflow-y: auto;
      padding: 15px;
    }

    .sidebar.open {
      transform: translateX(0);
    }

    .sidebar-close {
      position: absolute;
      top: 15px;
      left: 15px;
      font-size: 24px;
      cursor: pointer;
    }

    .sidebar-content {
      margin-top: 60px;
    }

    .btn-open-sidebar {
      cursor: pointer;
    }

    .btn-open-sidebar:hover {
      color: #007bff;
    }
  </style>
</head>
<body class="light-mode">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="javascript:void(0)">
      <img src="logo1.png" alt="Logo" style="height: 50px; margin-right: 10px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto"></ul>
      <button class="btn btn-primary btn-open-sidebar" onclick="toggleSidebar()">☰</button>
    </div>
  </div>
</nav>

<!-- Sidebar -->
<div id="sidebar" class="sidebar">
  <div class="sidebar-close" onclick="toggleSidebar()">×</div>
  <div class="sidebar-content">
    <form action="../config/logout.php" method="POST">
      <input type="submit" class="btn btn-danger w-100" value="LOGOUT">
    </form>
  </div>
</div>

<!-- Switch for Dark Mode Toggle -->
<div class="switch-container">
  <input type="checkbox" id="theme-toggle" class="switch-checkbox">
  <label for="theme-toggle" class="switch-label">
    <div class="switch-slider"></div>
  </label>
</div>

<div class="container-fluid mt-3">
    <h1 class="mb-4">Admin Dashboard</h1>
    <p class="mb-4">Welcome, Admin! You have 4 new notifications.</p>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-3">Student List</h5>
                    <p class="mb-4">Showing 4 out of 35 students.</p>
                    <table class="table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Student ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Student No.</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Nicole Manaloto</td>
                                <td>nicole@example.com</td>
                                <td>123-456-7890</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                    <button class="btn btn-success btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Marknel Gonzales</td>
                                <td>mark@example.com</td>
                                <td>987-654-3210</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                    <button class="btn btn-success btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Francis Rañola</td>
                                <td>francis@example.com</td>
                                <td>555-123-4567</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                    <button class="btn btn-success btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Jessa De Leon</td>
                                <td>jessa@example.com</td>
                                <td>555-555-5555</td>
                                <td>
                                    <button class="btn btn-primary btn-sm">View Profile</button>
                                    <button class="btn btn-success btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm">Delete</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

<script>
  document.addEventListener('DOMContentLoaded', () => {
    const toggleCheckbox = document.getElementById('theme-toggle');
    const currentTheme = localStorage.getItem('theme') || 'light-mode';

    // Set the initial theme
    document.body.classList.add(currentTheme);
    toggleCheckbox.checked = currentTheme === 'dark-mode';

    toggleCheckbox.addEventListener('change', () => {
      if (toggleCheckbox.checked) {
        document.body.classList.remove('light-mode');
        document.body.classList.add('dark-mode');
        localStorage.setItem('theme', 'dark-mode');
      } else {
        document.body.classList.remove('dark-mode');
        document.body.classList.add('light-mode');
        localStorage.setItem('theme', 'light-mode');
      }
    });
  });

  function toggleSidebar() {
    const sidebar = document.getElementById('sidebar');
    sidebar.classList.toggle('open');
  }
</script>

</body>
</html>
