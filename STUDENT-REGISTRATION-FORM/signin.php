<?php
session_start();
include "db.php";

$usernameError = "";
$passwordError = "";
$success = false;
$usernameValue = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST["username"]);
    $password = $_POST["password"];
    $usernameValue = htmlspecialchars($username);

    if (empty($username)) {
        $usernameError = "Username is required";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    }

    if (empty($usernameError) && empty($passwordError)) {

        $sql = "SELECT * FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        mysqli_stmt_bind_param($stmt, "s", $username);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)) {

            if (password_verify($password, $row["password"])) {
                $_SESSION["username"] = $row["username"];
                $success = true;
            } else {
                $passwordError = "Incorrect password";
            }

        } else {
            $usernameError = "User not found";
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign In</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
  <form id="loginForm" method="POST">
    <h2>Welcome Back</h2>

    <div class="input-group">
      <label>Username <span>*</span></label>
      <input type="text" id="username" name="username" placeholder="Enter username" value="<?php echo $usernameValue; ?>">
      <small class="error" id="usernameError"><?php echo $usernameError; ?></small>
    </div>

    <div class="input-group password-group">
      <label>Password <span>*</span></label>
      <input type="password" id="password" name="password" placeholder="Enter password">
      <span class="toggle-password">👁</span>
      <small class="error" id="passwordError"><?php echo $passwordError; ?></small>
    </div>

    <div class="buttons" style="justify-content:center;">
      <button type="submit" class="register-btn">Sign In</button>
    </div>

    <p class="signin-text">
      Don’t have an account? <a href="register.html">Create account</a>
    </p>
  </form>
</div>

<div id="popup" class="popup">
  🎉 Successfully logged in
</div>

<script src="signin.js"></script>

<?php if($success): ?>
<script>
    document.getElementById("popup").style.display = "block";

    setTimeout(function(){
        window.location.href = "home.php";
    }, 1200);
</script>
<?php endif; ?>

</body>
</html>