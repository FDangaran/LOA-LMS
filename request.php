<?php

session_start();
$db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

$ISBN = $_POST["ISBN"];
$email = $_SESSION["email"];
$id = $_GET["id"];
if (!empty($ISBN) && !empty($email)) {
    // Check the availability of the book and the eligibility of the user
    $sql1 = "SELECT status, title FROM books WHERE ISBN = '$ISBN'";
    $result1 = mysqli_query($db, $sql1) or die(mysqli_error($db));
    $sql2 = "SELECT quantity FROM books WHERE ISBN = '$ISBN'";
    $result2 = mysqli_query($db, $sql2) or die(mysqli_error($db));    
    
    if ($result1->num_rows > 0 && $result2->num_rows > 0) {
        $row1 = $result1->fetch_assoc();
        $row2 = $result2->fetch_assoc();
        $status = mysqli_real_escape_string($db, $row1["status"]); 
        $title = mysqli_real_escape_string($db, $row1["title"]); 
        $qty = mysqli_real_escape_string($db, $row2["quantity"]); 
        if ($status == "Available" && $qty > 0) {
            $request_date = date("Y-m-d");
            $sql_insert = "INSERT INTO borrows (id, ISBN, title, email, request_date, status) VALUES ('$id', '$ISBN', '$title', '$email', '$request_date', 'Waiting')";
            (mysqli_query($db, $sql_insert));
            @include 'mail-request.php';
        } else {
            echo "<script>";
            echo "alert('The book is not available.');";
            echo "window.location.href = 'user_dashboard.php'";
            echo "</script>";
        }
    } else {
        echo "<script>";
        echo "alert('Invalid ISBN.');";
        echo "window.location.href = 'user_dashboard.php'";
        echo "</script>";
    }
}

$db->close();
?>