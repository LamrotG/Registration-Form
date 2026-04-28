<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>STUDENTSYSTEM</title>
  <link rel="stylesheet" href="landing.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="logo">STUDENTSYSTEM</div>

  <div class="nav-links">
    <a href="register.html">Register</a>
    <a href="signin.php">Sign In</a>
  </div>
</nav>

<!-- HERO SECTION -->
<div class="hero">
  <div class="card">

    <h1>Welcome to STUDENTSYSTEM</h1>
    <p>
      A simple student registration and login system built for managing user accounts efficiently.
    </p>

    <div class="buttons">
      <a href="register.html" class="btn register">Register</a>
      <a href="signin.php" class="btn signin">Sign In</a>
    </div>

  </div>
</div>

<script src="landing.js"></script>
</body>
</html>