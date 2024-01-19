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

    if(isset($_GET['ids'])){
        $id = $_GET['ids'];
        $delete_query = mysqli_query($db, "delete from books where id = '$id'");
    }
    echo   "  <nav class='header'>
                <div class='nav-wrapper'>
                <div class='row'>
                    <div class='input-field col s7'>
                        <a href='Body.php' class='breadcrumb'>Home</a>
                        <a href='Accession_record.php' class='breadcrumb'>Accession Records</a>
                        <a href='search-book.php' class='breadcrumb'>Search Books</a>
                        </div>
                    <div class='input-field col s3'>
                    <form action='' method='get'>
                    <input type='text'id='keyword' name='keyword' placeholder='Title, author, genre, etc.'>
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
            $sql = "SELECT * FROM books WHERE title LIKE '%$keyword%' OR author LIKE '%$keyword%' OR genre LIKE '%$keyword%' OR pubdate LIKE '%$keyword%'";
        } else {
            $sql = "SELECT * FROM books";
        }
        $result = mysqli_query($db, $sql) or die(mysqli_error($db));
    
        // Display the results in a table
        if ($result->num_rows > 0) {
            echo "<div class='book'>";
            echo "<h2>List of Books</h2>";
            echo "<table class='centered'>";
            echo "<thead>
            <tr>
            <th>ISBN</th>
            <th>Title</th>
            <th>Author</th>
            <th>Genre</th>
            <th>Status</th>
            <th>Year Published</th>
            <th>Quantity</th>
            <th>Action</th>
            </tr>
            </thead>";
            echo "<tbody>";
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                <td>" . $row["ISBN"] . "</td>
                <td>" . $row["title"] . "</td>
                <td>" . $row["author"] . "</td>
                <td>" . $row["genre"] . "</td>
                <td>" . $row["status"] . "</td>
                <td>" . $row["pubdate"] . "</td>
                <td>" . $row["quantity"] . "</td>";
                ?>
                <td>
                    <a href="edit-book.php?id=<?php echo $row["id"];?>">Edit</a>
                    <p>or</p>
                    <a href="search-book.php?ids=<?php echo $row["id"];?>" onclick="return confirmDelete()"> Delete</a>
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
