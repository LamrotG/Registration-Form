<?php
session_start();

// if user not logged in, redirect to login page
if (!isset($_SESSION['username'])) {
  header("Location: signin.php");
  exit();
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Home</title>
  <link rel="stylesheet" href="home.css">
</head>
<body>

<!-- NAVBAR -->
<nav class="navbar">
  <div class="logo">StudentSystem</div>

  <div class="nav-right">
    <span class="welcome">Hi, <?php echo $username; ?></span>

    <div class="profile">
      <img src="Assets/icon/profile.svg" class="profile-icon" onclick="toggleMenu()">

      <div class="dropdown" id="dropdownMenu">
        <a href="#">Profile</a>
        <a href="#">Settings</a>
        <a href="logout.php" class="logout">Logout</a>
      </div>
    </div>
  </div>
</nav>

<!-- MAIN CONTENT -->
<div class="container">
  <div class="card">
    <h2>Welcome Back 👋</h2>
    <p>You are successfully logged into your dashboard.</p>

    <div class="actions">
      <button>View Profile</button>
      <button>Edit Details</button>
      <button>Settings</button>
    </div>
  </div>
</div>

<!-- OUTSIDE CARD: CENTERED LOGOUT -->
<div class="bottom-logout">
  <a href="logout.php" class="logout-btn">Logout</a>
</div>

<script src="home.js"></script>
</body>
</html>