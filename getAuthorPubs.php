<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include 'dbconnect.php';

    $authorid = isset($_POST['authorid']) ? $_POST['authorid'] : null;
    $sql = "SELECT title, date FROM reftool.publication WHERE author = ".$authorid." ORDER BY date DESC;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo '<tr>';
            echo '<td>' . $row["title"] . '</td>';
            echo '<td>' . $row["date"] . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<h2>0 results</h2>';
    }
    $conn->close();
?>
