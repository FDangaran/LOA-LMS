<?php
    @include 'login-check.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="user-style.css">
    <title>Lyceum of Alabang Inc. Library Management System</title>
    <link ref="shortcut icon" type="image/png" href="logo.png">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <a class="navbar-brand" href="user_dashboard.php?"><img src="logo.png" alt="Logo" style="width:40px;"></a>
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navb">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navb">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="#">Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#" id="showDiv">Request</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Activity</a>
            </li>
            <li class="nav-item">
                <?php
                    if(isset($_GET['logout'])) {
                        session_destroy();
                        header("Location: login.php");
                    }
                ?>
                <a class="nav-link" href="user_dashboard.php?logout" onclick="return confirm('Are you sure you want to log out?');">Logout</a>
            </li>
            </ul>
        </div>
    </nav>
    <header>
        <div id="demo" class="carousel slide" data-ride="carousel">
                <div class= "content-carousel">
                <h2>Lyceum of Alabang Library Management System</h2>
                <form class="form-inline my-2 my-lg-0 justify-content-center" action="user_dashboard.php" method="get">
                    <input type="text" class="form-control mr-sm-2 mb-2 mb-md-0" id="keyword" name="keyword" placeholder="Title, author, genre, etc." size = "50">
                    <button type="submit" class="btn btn-primary mt-md-0 mt-2">Search</button>
                </form>
            </div>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="picture/images (1).jpeg" alt="img1" width="1100" height="500">
                    <div class="carousel-caption"></div>   
                </div>
                <div class="carousel-item">
                    <img src="picture/images (2).jpeg" alt="img2" width="1100" height="500">
                    <div class="carousel-caption"></div>   
                </div>
                <div class="carousel-item">
                    <img src="picture/Subject.png" alt="img3" width="1100" height="500">
                    <div class="carousel-caption"></div>   
                </div>
            </div>
            <a class="carousel-control-prev" href="#demo" data-slide="prev">
                <span class="carousel-control-prev-icon"></span>
            </a>
            <a class="carousel-control-next" href="#demo" data-slide="next">
                <span class="carousel-control-next-icon"></span>
            </a>
        </div>
    </header>
    <div class="container">        
        <?php
            @include 'request.php';
            @include 'profile-process.php';
            @include 'change_password.php';
        ?>
        <div class="form-group d-flex justify-content-center align-items-center">
                <div class="col-md-6 tg" id="profileDiv">
                    <h2>User Profile</h2>
                    <?php if(isset($user)): ?>
                        <form action="user_dashboard.php" method="post">
                            <div class="form-group">
                                <label for="first_name">First Name:</label>
                                <input type="text" class="form-control" id="first_name" value="<?php echo $user['first_name']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last Name:</label>
                                <input type="text" class="form-control" id="last_name" value="<?php echo $user['last_name']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="email">Email:</label>
                                <input type="text" class="form-control" id="email" value="<?php echo $user['email']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="password">Enter New Password:</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                                <input type="checkbox" name="" onclick="showPassword()"> Show password
                            </div>
                            <button type="submit" class="btn btn-primary">Change Password</button>
                        </form>
                    <?php endif; ?>
                </div>
            </div>
        
            <div class="form-group d-flex justify-content-center align-items-center ">
                <div class="col-md-6 tg" id="requestDiv">
                            <h2>Request Books</h2>
                            <form action="user_dashboard.php" method="post" class="was-validated">
                                <div class="form-group">
                                    <label for="ISBN">Enter the ISBN:</label>
                                    <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="The unique identifier of the book" required>
                                </div>
                                <button type="submit" class="btn btn-success">Request</button>
                            </form>
                </div> 
            </div>
                <div class="tg" id="activityDiv">
                    <h2>Activity Logs</h2>
                    <div class='table-responsive-sm'>
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>ISBN</th>
                                    <th>Title</th>
                                    <th>Date Request</th>
                                    <th>Date Accepted</th>
                                    <th>Date Due</th>
                                    <th>Status</th>
                                    <th>Fine</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php @include 'activity.php'?>
                            </tbody>
                        </table>
                    </div>
                </div>
           <?php @include 'search.php'; ?>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script>
  $(document).ready(function(){
    $("#showDiv").click(function(){
        $("#requestDiv").toggle();
    });
    });

        $(document).ready(function(){
        $(".nav-link").click(function(){
            if($(this).text() == "Profile") {
                $("#profileDiv").toggle();
            }
        });
    });

    $(document).ready(function(){
        $(".nav-link").click(function(){
            if($(this).text() == "Activity") {
                $("#activityDiv").toggle();
            }
        });
    });

    function showPassword() {
        var password = document.getElementById("password");
        if (password.type === "password") {
            password.type = "text";
        } else {
            password.type = "password";
        }
      }
</script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>