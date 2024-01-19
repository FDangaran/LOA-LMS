<!DOCTYPE html>
<html>
<head>
  <title></title>
  <link rel="stylesheet" href="admin-style.css">
  <style type="text/css"></style>
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>
<body>
<nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                            <a href='Body.php' class='breadcrumb'>Home</a>
                        </div>
                    </div>
                </nav>
  <div class="flex-container"> 
    <a href="accession_record.php" style="text-decoration: none;" target="body"> 
      <div class="box1">Accession Records</div>
    </a>
    <a href="activity-log.php" style="text-decoration: none;" target="body">
      <div class="box2">Account Settings</div>
    </a>
    <a href="overdue.php" style="text-decoration: none;" target="body">
      <div class="box3">Overdue Fee</div>
    </a>
  </div>
 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>