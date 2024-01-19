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
  $fetch_query = mysqli_query($db, "select * from books where id='$id'");
  $row = mysqli_fetch_array($fetch_query);
  if(isset($_REQUEST['submit']))
  {
     
      $author = $_POST['author'];
      $genre = $_POST['genre'];
      $isbn = $_POST['ISBN'];
      $pubdate = $_POST['pubdate'];
      $title = $_POST['title'];
      $quantity = $_POST['quantity'];
      $status = $_POST['status'];
  
      $insert_book = mysqli_query($db,"update books set author='$author', genre='$genre', ISBN='$isbn', pubdate='$pubdate', title='$title', quantity='$quantity', status='$status' where id='$id'");
  
      if($insert_book > 0)
      {
        header("Location: search-book.php");
        exit();
        //<!--ADD ALERT FOR SUCCESSFUL ADDING-->
      }
      }

    echo   "  <nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                        <a href='Body.php' class='breadcrumb'>Home</a>
                            <a href='Accession_record.php' class='breadcrumb'>Accession Records</a>
                            <a href='search-book.php' class='breadcrumb'>Search Book</a>
                            <a href='edit-book.php' class='breadcrumb'>Edit Book</a>
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
        <th><input type="text" id="title" name="title" class="title" size="60" value="<?php echo $row['title']; ?>"></th>
      </tr>
      <tr>
        <th>Enter Genre:</th>
        <td><input type="text" name= "genre" class="genre" size="60" value="<?php echo $row['genre']; ?>"></td>
      </tr>
      <tr>
        <th>Enter ISBN:</th>
        <th><input type="text" name="ISBN" class="ISBN" size="60" value="<?php echo $row['ISBN']; ?>"></th>
      </tr>
      <tr>
        <th>Enter Author:</th>
        <th><input type="text" name="author" class="author" size="60" value="<?php echo $row['author']; ?>"></th>
      </tr>
      <tr>
        <th>Enter Publish Date:</th>
        <th><input type="text" name="pubdate" /*class="datepicker"*/ size="60" value="<?php echo $row['pubdate']; ?>"></th>
      </tr>
      <tr>
        <th>Enter Quantity:</th>
        <th><input type="text" name="quantity" class="quantity" size="60" value="<?php echo $row['quantity']; ?>"></th>
      </tr>      
      <tr>
        <th>Enter Status:</th>
        <th>
            <select name="status" class="status" required>
                <option value="Available">Available</option>
                <option value="Critical Level">Critical Level</option>
                <option value="Unavailable">Unavailable</option>
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