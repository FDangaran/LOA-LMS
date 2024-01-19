<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="admin-style.css">
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>
<body>
<?php
  session_start();
  $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

  $id = $_GET['id'];
  $fetch_query = mysqli_query($db, "select * from users where id='$id'");
  $row = mysqli_fetch_array($fetch_query);
  if(isset($_REQUEST['submit']))
  {
     
      $email = $_POST['email'];
      $first_name = $_POST['first_name'];
      $last_name = $_POST['last_name'];
      $pass = $_POST['password'];
      $status = $_POST['status'];
      $user_type = $_POST['user_type'];
  
      $hashed = password_hash($pass, PASSWORD_DEFAULT);
      $insert_book = mysqli_query($db,"update users set email='$email', first_name='$first_name', last_name='$last_name', password = '$hashed', status='$status', user_type = '$user_type' where id='$id'");
  
      if($insert_book > 0)
      {
        @include 'edit-mailer.php';
        header("Location: activity-log.php");
        exit();
        //<!--ADD ALERT FOR SUCCESSFUL ADDING-->
      }
      }

    echo   "  <nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                            <a href='Body.php' class='breadcrumb'>Home</a>
                            <a href='activity-log.php' class='breadcrumb'>Activity Log</a>
                            <a href='edit-user.php' class='breadcrumb'>Edit User</a>
                        </div>
                    </div>
                </nav>
                ";
?>

<div style="text-align: center; margin-left: auto; margin-right: auto; font-size: 1.2em;"> 
  <h2 style="font-size: 30px;">Library Management System</h2>
  <form action="" method="post">
    <table style="font-size: 20px; border: 3px solid black; margin-left: auto; margin-right: auto;" cellpadding="20" cellspacing="20"> 
      <tr>
        <th>Enter Email:</th>
        <th><input type="text" name="email" size="60" value="<?php echo $row['email']; ?>"></th>
      </tr>
      <tr>
        <th>Enter First Name:</th>
        <td><input type="text" name= "first_name"size="60" value="<?php echo $row['first_name']; ?>"></td>
      </tr>
      <tr>
        <th>Enter Last Name:</th>
        <th><input type="text" name="last_name"size="60" value="<?php echo $row['last_name']; ?>"></th>
      </tr>
      <tr>
        <th>Enter New Password:</th>
        <th><input type="text" name="password" size="60" required></th>
      </tr>
      <tr>
        <th>Enter Status:</th>
        <th>
            <select name="status" class="status" required>
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
            </select>
        </th>
      </tr> 
      <tr>
        <th>Enter User Type:</th>
        <th>
            <select name="user_type" class="user_type" required>
                <option value="user">User</option>
                <option value="admin">Admin</option>
            </select>
        </th>
      </tr>
      <tr>
        <th>
        </th>
        <th>
        <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Save</button>
        </th>
      </tr>
    </table>
  </form>
</div>
 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>