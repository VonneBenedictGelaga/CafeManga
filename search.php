<?php

$conn = new mysqli("localhost", "root", "", "manga");

if ($conn->connect_error) {
    die("Connection failed " . $conn->connect_error);
}

$id = $_GET['q'];

$sql = "SELECT title FROM manga WHERE title LIKE '%" .$id. "%' LIMIT 7";
$result = $conn->query($sql);



if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["title"] . "\n";
    }
} else {
    echo "0 results";
}
$conn->close();
