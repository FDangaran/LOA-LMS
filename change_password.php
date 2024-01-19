<?php
    // Start the session
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    $error = "";
    $success = "";

    // Check if the user is logged in and the password is set
    if(isset($_SESSION['email']) && isset($_POST['password'])) {
        $email = $_SESSION['email'];
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $stmt = $db->prepare("UPDATE users SET password = ? WHERE email = ?");
        $stmt->bind_param("ss", $new_password, $email);
        $stmt->execute();

        // Check if the password was updated
        if($stmt->affected_rows === 1) {
            echo "<script>";
            echo "alert('Password changed successfully');";
            echo "window.location.href = 'user_dashboard.php';";
            echo "</script>";
        } else {
            echo "<script>";
            echo "alert('Something went wrong');";
            echo "window.location.href = 'user_dashboard.php';";
            echo "</script>";
    } 
}
?>
