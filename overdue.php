<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin-style.css">
	<style type="text/css"></style>
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>
<body>
<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

  if(isset($_GET['ids'])){
    $id = $_GET['ids'];
    $delete_query = mysqli_query($db, "delete from borrows where id = '$id'");
  }
  $select_query = mysqli_query($db, "select * from borrows where status = 'Overdue'");

  echo   "  <nav class='header'>
            <div class='nav-wrapper'>
            <div class='row'>
                <div class='input-field col s7'>
                    <a href='Body.php' class='breadcrumb'>Home</a>
                    <a href='overdue.php' class='breadcrumb'>Overdue Fees</a>
                    </div>
                </div>
        </nav>
<table class='centered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
            <tr>
                <th>Email</th>
                <th>ISBN</th>
                <th>Title</th>
                <th>Date Borrowed</th>
                <th>Date Due</th>
                <th>Fine</th>
                <th>Action</th>
            </tr>
        </thead>
    <tbody>
    ";
    while ($row = mysqli_fetch_array($select_query)){
      ?>
      <tr>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['borrow_date']; ?></td>
        <td><?php echo $row['due_date']; ?></td>
        <td style="color: green; font-weight: bold;">₱<?php echo $row['fine']; ?>.00</td>
      </tr>
    <?php } ?>
</tbody>
</table>
<div class="footer">
    <a href="Body.php">< Back to Menu</a>
</div>

 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>