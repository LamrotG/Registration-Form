<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $errors = [];

    $full_name = htmlspecialchars(trim($_POST["full_name"] ?? ""));
    $email = trim($_POST["email"] ?? "");
    $password = $_POST["password"] ?? "";
    $confirm_password = $_POST["confirm_password"] ?? "";
    $account_type = htmlspecialchars(trim($_POST["account_type"] ?? ""));
    $gender = $_POST["gender"] ?? "";
    $terms = isset($_POST["terms"]);

    if ($full_name === "") {
        $errors[] = "Full name is required.";
    }

    if ($email === "" || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Valid email is required.";
    }

    if ($password === "") {
        $errors[] = "Password is required.";
    }

    if (strlen($password) < 8) {
        $errors[] = "Password must be at least 8 characters.";
    }

    if ($password !== $confirm_password) {
        $errors[] = "Passwords do not match.";
    }

    if (!$terms) {
        $errors[] = "You must accept the terms.";
    }

    if (empty($errors)) {

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        /*
        Example database insert using PDO

        $pdo = new PDO("mysql:host=localhost;dbname=your_database", "username", "password");

        $stmt = $pdo->prepare("
            INSERT INTO users (full_name, email, password, account_type, gender)
            VALUES (?, ?, ?, ?, ?)
        ");

        $stmt->execute([
            $full_name,
            $email,
            $hashed_password,
            $account_type,
            $gender
        ]);
        */

        header("Location: login.php");
        exit;
    } else {
        foreach ($errors as $error) {
            echo $error . "<br>";
        }
    }
}
?>