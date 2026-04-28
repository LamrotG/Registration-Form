<?php
include "db.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $fname = htmlspecialchars(trim($_POST["fname"]));
    $lname = htmlspecialchars(trim($_POST["lname"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $username = htmlspecialchars(trim($_POST["username"]));
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $gender = htmlspecialchars(trim($_POST["gender"] ?? ""));
    $year = htmlspecialchars(trim($_POST["year"] ?? ""));
    $department = htmlspecialchars(trim($_POST["department"] ?? ""));
    $hobbies = isset($_POST["hobbies"]) ? implode(", ", $_POST["hobbies"]) : "";

    // required field validation
    if (
        empty($fname) ||
        empty($lname) ||
        empty($email) ||
        empty($username) ||
        empty($gender) ||
        empty($year) ||
        empty($department)
    ) {
        header("Location: register.html");
        exit();
    }

    $sql = "INSERT INTO users
    (fname, lname, email, username, password, gender, year, department, hobbies)
    VALUES
    ('$fname', '$lname', '$email', '$username', '$password', '$gender', '$year', '$department', '$hobbies')";

    if (mysqli_query($conn, $sql)) {
        echo '
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset="UTF-8">
            <title>Success</title>
            <style>
                body{
                    background:#f7f9fc;
                    display:flex;
                    justify-content:center;
                    align-items:center;
                    height:100vh;
                    font-family:Arial,sans-serif;
                }

                .popup{
                    background:#16a34a;
                    color:white;
                    padding:18px 28px;
                    border-radius:12px;
                    font-size:16px;
                    box-shadow:0 8px 20px rgba(0,0,0,0.15);
                }
            </style>
        </head>
        <body>

            <div class="popup">
                🎉 Registration successful. Redirecting...
            </div>

            <script>
                setTimeout(function(){
                    window.location.href = "signin.php";
                }, 2000);
            </script>

        </body>
        </html>';
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>