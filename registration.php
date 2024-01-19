<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lyceum of Alabang Inc. Library Management System</title>
    <link ref="shortcut icon" type="image/png" href="logo.png">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
    <img src="logo.png" alt="">
        <h1>Library Management System Registration</h1>
        <?php
            @include 'registration-process.php';
        ?> 
        <?php if ($error): ?>
            <div class="error">
                <?php echo $error; ?>
            </div>
        <?php endif; ?>
        <?php if ($success): ?>
            <div class="success">
                <?php echo $success; ?>
            </div>
        <?php endif; ?>

        <div class="content">
        <form class="form" method="post" action="registration.php" enctype="multipart/form-data">
            <div class="form-group">
                <label for="first_name">First Name</label>
                <input type="text" id="first_name" name="first_name" value="<?php echo $first_name; ?>">
            </div>
            <div class="form-group">
                <label for="last_name">Last Name</label>
                <input type="text" id="last_name" name="last_name" value="<?php echo $last_name; ?>">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div class="form-group">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" id="confirm_password" name="confirm_password" value="<?php echo $confirm_password; ?>">
            </div>
            <p><input type="checkbox" onclick="showPassword()"> Show Password</p>
            <div class="form-group">
                <label for="verification">Verification (ID or Registration Form)</label>
                <input type="file" id="verification" name="verification" accept=".jpg, .jpeg, .png" required>
            </div>
            <div class="form-group">
                <button type="submit" name="register">Register</button>
                <a href="login.php">Already have an account? Login here</a>
            </div>
        </form>
        </div>
    </div>
</body>

<script>
function showPassword() {
    var password = document.getElementById("password");
    var confirmPassword = document.getElementById("confirm_password");
    if (password.type === "password") {
        password.type = "text";
        confirmPassword.type = "text";
    } else {
        password.type = "password";
        confirmPassword.type = "password";
    }
}
</script>

</html>