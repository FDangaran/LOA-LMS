<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link ref="shortcut icon" type="image/png" href="logo.png">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600&display=swap');

        body{
            font-family: 'Poppins', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        .login-container {
            background-color: white;
            border-radius: 10px;
            box-shadow: 0 5px 10px rgba(0, 0, 0, 0.3);
            overflow: hidden;
            height: 550px;
            width: 550px;
            
        }

        .login-header h2{
            background-color: yellow;
            color: black;
            padding-left: 20px;
            padding-top: 25px;
            padding-bottom: 1px;
            text-align: left;
            height: 90px;
            font-size: 40px;
        }

        .logo {
            width: 110px;
            height: 100px;
            float: right;
            padding-right: 20px;
            padding-top: 20px;
        }

        .login-form {
            padding: 20px;
            padding-left: 30px;
            padding-right: 30px;
            font-size: 20px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-group label {
            display: block;
            margin-bottom: 8px;
        }

        .form-group input {
            width: 100%;
            padding: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 8px;
            font-family: 'Poppins', sans-serif;
            font-size: 20px;
        }

        .form-group button {
            background-color: dodgerblue;
            color: #fff;
            padding: 10px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-family: 'Poppins', sans-serif;
            font-size: 22px;
        }

        .form-group button:hover{
            background-color: #1664B3;
        }

        @media (max-width: 600px) {
            .login-container {
                width: 90%;
            }
        }

        .bottom-header{
            font-size: 18px;
            text-align: center;
        }

        .bottom-header a:hover{
            color: #1664B3;
        }

        .show_pass{
            font-size: 18px;
            padding-bottom: 30px;
        }

        .show_pass input{
            width: 15px; 
            height: 15px;
        }

    </style>
</head>
<body>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <div class="login-container">
        <div class="login-header">
            <h2>Login</h2>
        </div>
        <div class="login-form">
            <div class="form-group">
                <label>Username</label>
                <input type="text" id="username" name="username" required placeholder="Enter your username">
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" id="password" name="password" required placeholder="Enter your password">
            </div>
            <div class="show_pass">
                <p><input type="checkbox" name="" onclick="myFunction()"> Show password</p>
            </div>
            <div class="form-group">
                <button type="submit">Login</button>
            </div>
            <div class="bottom-header">
                <p>Are you a new user? <a href="">Register here!</a></p>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        function myFunction() {
          var x = document.getElementById("password");
          if (x.type === "password") {
            x.type = "text";
          } else {
            x.type = "password";
          }
        }
    </script>
</body>
</html>
