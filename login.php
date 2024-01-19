<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link ref="shortcut icon" type="image/png" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login-style.css">
</head>
<body>
    <?php
        @include 'login-process.php';
    ?>
    <div class="login-container">
        <div class="login-header">
        
            <h2>Login</h2>
        </div>
        <?php if ($error): ?>
                    <div class="error">
                        <?php echo $error; ?>
                    </div>
        <?php endif; ?>
        <div class="login-form">
        <form class="form" method="post" action="login.php">
            <div class="form-group">
                <label>Email</label>
                <input type="text" id="email" name="email" required placeholder="Enter your email">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="show_pass">
                <p><input type="checkbox" name="" onclick="showPassword()"> Show password</p>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div class="bottom-header">
                <p>Are you a new user? <a href="registration.php">Register here!</a></p>
            </div>
        </form>
        </div>
    </div>
    <script>
    function showPassword() {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
    }
    </script>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>