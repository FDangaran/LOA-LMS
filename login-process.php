<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    $id = $_SESSION['id'];
    $error = "";
    
    if (isset($_POST["email"]) && isset($_POST["password"])) {
        
        $email = mysqli_real_escape_string($db, $_POST["email"]);
        $password = mysqli_real_escape_string($db, $_POST["password"]);

        // Check if the email exists in the database
        $sql = "SELECT * FROM users WHERE BINARY email = '$email'";
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
        
        if (mysqli_num_rows($result) > 0) {
            
            $user = mysqli_fetch_assoc($result);
            // Check if the account is active
            if ($user["status"] == "Active") {
                // Verify the password
                if (password_verify($password, $user["password"])) {
                    // Check the user type and redirect the user
                    if ($user["user_type"] == "admin") {
                        header("Location: Admin_homepage.php?email=$email");
                    } else {
                        header("Location: user_dashboard.php");
                        $_SESSION["email"] = $email;
                    }
                } else {
                    $error = "Invalid password";
                }
            } else {
                $error = "Account still Inactive. Please wait for approval";
            }
        } else {
            $error = "Email not found";
        }
    }
?>

