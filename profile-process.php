<?php
    // Start the session
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));

    // Check if the user is logged in
    if(isset($_SESSION['email'])) {
        // Get the user's information
        $email = $_SESSION['email'];
        $sql = "SELECT first_name, last_name, email FROM users WHERE email = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();
    }
?>
