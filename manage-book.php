<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="admin-style.css">
    <style>

    </style>
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>
<body>
<?php
  session_start();
  $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

  if(isset($_REQUEST['submit']))
  {
     
      $author = $_POST['author'];
      $genre = $_POST['genre'];
      $isbn = $_POST['ISBN'];
      $pubdate = $_POST['pubdate'];
      $title = $_POST['title'];
      $quantity = $_POST['quantity'];
  
      $insert_book = mysqli_query($db,"insert into books set author='$author', genre='$genre', ISBN='$isbn', pubdate='$pubdate', title='$title', quantity='$quantity', status='Available'");
  
      if($insert_book > 0)
      {
        //<!--ADD ALERT FOR SUCCESSFUL ADDING-->
      }
      }

    echo   "  <nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                        <a href='Body.php' class='breadcrumb'>Home</a>
                            <a href='Accession_record.php' class='breadcrumb'>Accession Records</a>
                            <a href='manage-book.php' class='breadcrumb'>Add Books</a>
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
        <th>Enter Title:</th>
        <th><input type="text" id="title" name="title" class="title" size="60" required></th>
      </tr>
      <tr>
        <th>Enter Genre:</th>
        <td><input type="text" name= "genre" class="genre" size="60" required></td>
      </tr>
      <tr>
        <th>Enter ISBN:</th>
        <th><input type="text" name="ISBN" class="ISBN" size="60" required></th>
      </tr>
      <tr>
        <th>Enter Author:</th>
        <th><input type="text" name="author" class="author" size="60" required></th>
      </tr>
      <tr>
        <th>Enter Publish Date:</th>
        <th><input type="text" name="pubdate" class="pubdate size=" size="60" required></th>
      </tr>
      <tr>
        <th>Enter Quantity:</th>
        <th><input type="text" name="quantity" class="quantity" size="60" required></th>
      </tr>
      <tr>
        <th></th>
        <th>
        <button class="btn waves-effect waves-light" type="submit" name="submit" id="submit">Submit</button>
        </th>
      </tr>
    </table>
  </form>
</div>
 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>