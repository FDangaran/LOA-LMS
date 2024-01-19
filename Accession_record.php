<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="admin-style.css">
	<style type="text/css"></style>
  <!--ALWAYS INCLUDE BEFORE /HEAD-->   <?php @include 'include/header.php'?> <!--ALWAYS INCLUDE BEFORE /HEAD-->
</head>

<body bgcolor="#E6E6E6">
	<nav class='nav-header'>
                    <div class='nav-wrapper'>
                        <div class='col s12'>
                            <a href='Body.php' class='breadcrumb'>Home</a>
                            <a href='Accession_record.php' class='breadcrumb'>Accession Record</a>
                        </div>
                    </div>
                </nav>
	<div class="header">
		<h1>Accession Records</h1>
	</div>
    <div class="flex-container">
	<a href="search-book.php" style="text-decoration: none;" target="body"> 
      <div class="box1">Search Book</div>
    </a>
	<a href="issue-book.php" style="text-decoration: none;" target="body"> 
      <div class="box1">User Requests</div>
    </a>
	
	<a href="manage-book.php" style="text-decoration: none;" target="body"> 
      <div class="box1">Add Books</div>
    </a>
	</div>

	<div class="footer">
		<a href="Body.php">< Back to Home</a>
	</div>
 <!--ALWAYS INCLUDE BEFORE /BODY--><?php @include 'include/footer.php'?> <!--ALWAYS INCLUDE BEFORE /BODY-->
</body>
</html>