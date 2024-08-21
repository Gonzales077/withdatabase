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
  bottom: 20px;
  left: 20px;
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
  background-color: black; /* Matches dashboard primary color */
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
  color: #ffffff;
}

.sidebar-content {
  margin-top: 60px;
}

.btn-open-sidebar {
  cursor: pointer;
  border: none;
  background: transparent;
  color: #ffffff;
  font-size: 20px;
}

.btn-open-sidebar:hover {
  color: #007bff;
}

/* Card Styles */
.card {
  margin-bottom: 20px;
}

.card-title {
  font-size: 18px;
  font-weight: 600;
}

.card-body {
  padding: 20px;
}

  </style>
</head>
<body class="light-mode">

<nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center" href="javascript:void(0)">
      <img src="logo2.png" alt="Logo" style="height: 50px; margin-right: 10px;">
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="mynavbar">
      <ul class="navbar-nav me-auto"></ul>
      <button class="btn-open-sidebar" onclick="toggleSidebar()">☰</button>
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

<div class="container mt-5">
  <h1 class="mb-4">Student Dashboard</h1>
  <p>Welcome to your dashboard. Here you can view your grades, attendance, and assignments, as well as update your profile.</p>

  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Student Profile</h5>
          <p><strong>Name:</strong> Nicole Manaloto</p>
          <p><strong>Email:</strong> nicole@example.com</p>
          <p><strong>Phone:</strong> 123-456-7890</p>
          <p><strong>Address:</strong> 123 Secret, Anytown, Philippines</p>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Student Dashboard</h5>
          <ul class="list-group">
            <li class="list-group-item">View Grades: <span class="badge bg-success">90%</span></li>
            <li class="list-group-item">View Attendance: <span class="badge bg-warning">85%</span></li>
            <li class="list-group-item">View Assignments: <span class="badge bg-info">5 pending</span></li>
          </ul>
        </div>
      </div>
    </div>
  </div>

  <div class="row mt-4">
    <div class="col-md-12">
      <div class="card">
        <div class="card-body">
          <h5 class="card-title">Update Profile</h5>
          <form>
            <div class="mb-3">
              <label for="name" class="form-label">Name:</label>
              <input type="text" class="form-control" id="name" value="Nicole Manaloto">
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email:</label>
              <input type="email" class="form-control" id="email" value="nicole@example.com">
            </div>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone:</label>
              <input type="tel" class="form-control" id="phone" value="123-456-7890">
            </div>
            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

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
