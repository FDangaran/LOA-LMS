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

  $getch_query = mysqli_query($db, "select * from borrows where borrow_id='$id'");
  $data = mysqli_fetch_array($getch_query);

  $email = $data['email'];

  $fetch_query = mysqli_query($db, "select * from users where email='$email'");
  $row = mysqli_fetch_array($fetch_query);

  if(isset($_REQUEST['submit']))
  {
      $status = $_POST['status'];
      $borrow_date = date("Y-m-d");
      $due_date = date("Y-m-d", strtotime("$borrow_date + 15 days")); //IF BORROW LIMIT IS 2 WEEKS WITH 1 DAY AS FREE TIME

      if ($status === 'Accept'){
        $insert_date = mysqli_query($db, "update borrows set borrow_date = '$borrow_date', due_date = '$due_date' where borrow_id = '$id'");
      }
      $insert_borrow = mysqli_query($db,"update borrows set status='$status' where borrow_id = '$id'");
      if($insert_borrow > 0)
      {
        @include 'issue-mailer.php';
        header("Location: issue-request.php?email=$email");
        exit();
        //<!--ADD ALERT FOR SUCCESSFUL ADDING-->
      }
      }

    echo   "  <nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                        <a href='Body.php' class='breadcrumb'>Home</a>
                        <a href='Accession_record.php' class='breadcrumb'>Accession Records</a>
                        <a href='issue-book.php' class='breadcrumb'>User Requests</a>
                        <a href='issue-user.php' class='breadcrumb'>Request Action</a>
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
        <th>Email:</th>
        <th><input type="text" name="email" size="60" value="<?php echo $row['email']; ?>" readonly></th>
      </tr>
      <tr>
        <th>First Name:</th>
        <td><input type="text" name= "first_name"size="60" value="<?php echo $row['first_name']; ?>" readonly></td>
      </tr>
      <tr>
        <th>Last Name:</th>
        <th><input type="text" name="last_name"size="60" value="<?php echo $row['last_name']; ?>" readonly></th>
      </tr>
      <tr>
        <th>ISBN</th>
        <th><input type="text" name="isbn" size="60" value="<?php echo $data['isbn'];?>" readonly></th>
      </tr>
      <tr>
        <th>Title</th>
        <th><input type="text" name="title" size="60" value="<?php echo $data['title'];?>" readonly></th>
      </tr>
      <tr>
        <th>Enter Status:</th>
        <th>
            <select name="status" class="status" required>
                <option value="Accept">Accept</option>
                <option value="Reject">Reject</option>
            </select>
        </th>
      </tr>
      <tr>
        <th>
        </th>
        <th>
            <div class="input field col s12">
                <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Save</button>
            </div> 
        </th>
      </tr>
    </table>
  </form>
</div>
 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>