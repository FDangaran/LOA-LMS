<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    
    $first_name = "";
    $last_name = "";
    $email = "";
    $password = "";
    $confirm_password = "";
    $status = "";
    $error = "";
    $success = "";

    // Register user
    if (isset($_POST["register"])) {
        $first_name = mysqli_real_escape_string($db, $_POST["first_name"]);
        $last_name = mysqli_real_escape_string($db, $_POST["last_name"]);
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);
        $confirm_password = mysqli_real_escape_string($db, $_POST["confirm_password"]);

        // Validate the form data
        if (empty($first_name) || empty($last_name) || empty($email) || empty($password) || empty($confirm_password)) {
            $error = "All fields are required";
        } else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $error = "Invalid email format";
        } else if ($password != $confirm_password) {
            $error = "Passwords do not match";
        } else {
            // Check if the username or email already exists
            $sql = "SELECT * FROM users WHERE email = '$email'";
            $result = mysqli_query($db, $sql) or die(mysqli_error($db));
            if (mysqli_num_rows($result) > 0) {
                $error = "Email already exists";
            } else {
                // Hash the password
                $password = password_hash($password, PASSWORD_DEFAULT);

                // Insert the user into the database
                $sql = "INSERT INTO users (first_name, last_name, email, password, user_type, status) VALUES ('$first_name', '$last_name', '$email', '$password', 'user', 'Inactive')";
                mysqli_query($db, $sql) or die(mysqli_error($db));
                @include 'mail-registration.php';
                // Clear the form data
                $first_name = "";
                $last_name = "";
                $email = "";
                $password = "";
                $confirm_password = "";
            }
        }
    }
?> 