<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="admin-style.css">
    <?php @include 'include/header.php'?>
</head>
<body>
<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

    echo   "  <nav class='header'>
                <div class='nav-wrapper'>
                <div class='row'>
                    <div class='input-field col s7'>
                    <a href='Body.php' class='breadcrumb'>Home</a>
                    <a href='Accession_record.php' class='breadcrumb'>Accession Records</a>
                    <a href='issue-book.php' class='breadcrumb'>User Requests</a>
                        </div>
                    <div class='input-field col s3'>
                    <form action='' method='get'>
                    <input type='text'id='keyword' name='keyword' placeholder='Email, First Name, Last Name'>
                    </div>
                    <div class='input-field col s2'>
                    <button type='submit' class='waves-effect waves-light btn'>Search</button>
                    </div>
                    </div>
                    </div>
                </form>
            </nav>
    <table class='centered' id='dataTable' width='100%' cellspacing='0'>
        ";

        $keyword = isset($_GET["keyword"]) ? $_GET["keyword"] : '';

        if (!empty($keyword)) {
            // Perform a query to search for books that match the keyword
            $sql = "SELECT * FROM users WHERE email LIKE '%$keyword%' OR first_name LIKE '%$keyword%' OR last_name LIKE '%$keyword%'";
        } else {
            $sql = "SELECT * FROM users";
        }
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    
        // Display the results in a table
        if ($result->num_rows > 0) {
            echo "<div class='book'>";
            echo "<h2>List of Books</h2>";
            echo "<table class='centered'>";
            echo "<thead>
            <tr>
            <th>Email</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Action</th>
            </tr>
            </thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["email"] . "</td>
                <td>" . $row["first_name"] . "</td>
                <td>" . $row["last_name"] . "</td>";
                ?>
                <td>
                    <a href="issue-request.php?email=<?php echo $row["email"];?>">View Requests</a>
                </td>
                </tr>
                <?php
            }
            echo "</tbody>";
            echo "</table>";
            echo "</div>";
        }
      
      ?>
    </tbody>
  </table>
  <div class="footer">
		<a href="Accession_record.php">< Back to Menu</a>
	</div>
  <script>
  function confirmDelete(){
    return confirm("Do you want to delete?");
} 
    </script>

<?php @include 'include/footer.php'?>
</body>
</html>
