<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="admin-style.css">
	<styl type="text/css"></style>
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>
<body>
<?php
session_start();
$db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

  $email = $_GET['email'];

  if(isset($_GET['emails'])){
    $id = $_GET['emails'];
    $
    $delete_query = mysqli_query($db, "delete from borrows where id = '$id'");
  }

  $select_query = mysqli_query($db, "select * from borrows where email = '$email'");

  echo   "  <nav class='header'>
            <div class='nav-wrapper'>
            <div class='row'>
                <div class='input-field col s7'>
                    <a href='Body.php' class='breadcrumb'>Home</a>
                    <a href='activity-log.php' class='breadcrumb'>Account Settings</a>
                    <a href='user-logs.php?email=$email' class='breadcrumb'>Activity Logs </a>
                    </div>
                </div>
        </nav>
<table class='centered' id='dataTable' width='100%' cellspacing='0'>
    <thead>
            <tr>
                <th>ISBN</th>
                <th>Title</th>
                <th>Date Request</th>
                <th>Date Accepted</th>
                <th>Date Due</th>
                <th>Status</th>
            </tr>
        </thead>
    <tbody>
    ";
    
    while ($row = mysqli_fetch_array($select_query)){
      ?>
      <tr>
        <td><?php echo $row['isbn']; ?></td>
        <td><?php echo $row['title']; ?></td>
        <td><?php echo $row['request_date']; ?></td>
        <td><?php echo $row['borrow_date']; ?></td>
        <td><?php echo $row['due_date']; ?></td>
        <td>
        <?php
            $now = new DateTime();
            if ($row['borrow_date'] != '0000-00-00' && $row['due_date'] != '0000-00-00') {
                $dueDate = new DateTime($row['due_date']);
                $acceptDate = new DateTime($row['borrow_date']);
                if ($now > $dueDate) {
                    $interval = $acceptDate->diff($dueDate);
                    $daysOverdue = $interval->days;
                    $fine = $daysOverdue * 100; // Assuming the fine is 100 pesos per day
                    echo "<span style='color: red; font-weight: bold;'>!!! Overdue !!!</span>";
                    $id = $row['borrow_id'];
                    $update_sql = "UPDATE borrows SET fine = '$fine', status = 'Overdue' WHERE borrow_id = '$id'";
                    mysqli_query($db, $update_sql);
                } else {
                    $fine = 0;
                    echo 'Borrowed';
                    $id = $row['borrow_id'];
                    $update_sql = "UPDATE borrows SET fine = '$fine', status = 'Borrowed' WHERE borrow_id = '$id'";
                    mysqli_query($db, $update_sql);
                }
            } else if ($row['borrow_date'] == '0000-00-00' && $row['due_date'] == '0000-00-00') {
                $fine = 0;
                echo 'Waiting';
                $id = $row['borrow_id'];
                $update_sql = "UPDATE borrows SET fine = '$fine', status = 'Waiting' WHERE borrow_id = '$id'";
                mysqli_query($db, $update_sql);
            } else {
                $fine = 0;
                echo $row['status'];
            }
        ?>
        </td>
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