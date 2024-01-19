<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

    // Get the keyword from the form
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
        echo "<div class='table-responsive-sm'>" ;
        echo "<table class='table table-striped'>";
        echo "<thead><tr><th>ISBN</th><th>Title</th><th>Author</th><th>Genre</th><th>Status</th><th>Year Published</th></tr></thead>";
        echo "<tbody>";
        while($row = $result->fetch_assoc()) {
            echo "<tr><td>" . $row["ISBN"] . "</td><td>" . $row["title"] . "</td><td>" . $row["author"] . "</td><td>" . $row["genre"] . "</td><td>" . $row["status"] . "</td><td>" . $row["pubdate"] . "</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<script>";
        echo "alert('No books found');";
        echo "window.location.href = 'user_dashboard.php';";
        echo "</script>";
    }

    // Close the database connection
    mysqli_close($db);
?>
