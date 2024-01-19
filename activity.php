<?php
    session_start();
    $db = mysqli_connect("localhost", "root", "", "library") or die(mysqli_error($db));
    if(isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
        $sql = "SELECT isbn , title, email, request_date, borrow_date, due_date, status FROM borrows WHERE email = '$email'";
        $result = mysqli_query($db, $sql);
        if (mysqli_num_rows($result) > 0) {
            // Loop through the results and display them in a table row
            while($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['isbn'] . "</td>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td>" . $row['request_date'] . "</td>";
                echo "<td>" . $row['borrow_date'] . "</td>";
                echo "<td>" . $row['due_date'] . "</td>";

                // Calculate fine if the book is overdue
                $now = new DateTime();
                if ($row['borrow_date'] != '0000-00-00' && $row['due_date'] != '0000-00-00') {
                    $dueDate = new DateTime($row['due_date']);
                    $acceptDate = new DateTime($row['borrow_date']);
                    if ($now > $dueDate) {
                        $interval = $acceptDate->diff($dueDate);
                        $daysOverdue = $interval->days;
                        $fine = $daysOverdue * 100; // Assuming the fine is 100 pesos per day
                        $status = 'Expired';
                        $update_sql = "UPDATE borrows SET fine = '$fine' WHERE email = '$email' AND isbn = '".$row['isbn']."'";
                        mysqli_query($db, $update_sql);
                    } else {
                        $fine = 0;
                        $status = 'On Hand';
                    }
                } else if ($row['borrow_date'] == '0000-00-00' && $row['due_date'] == '0000-00-00') {
                    $fine = 0;
                    $status = 'Waiting';
                } else {
                    $fine = 0;
                    $status = $row['status'];
                }
                
                echo "<td>" . $status . "</td>";
                echo "<td>₱" . $fine . "</td>";

                echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo "<td colspan='8'>You have no activity.</td>";
            echo "</tr>";
        }
    }
    mysqli_close($db);
?>
