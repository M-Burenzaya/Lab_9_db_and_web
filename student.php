<?php

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stud_id = $_POST["stud_id"] ?? null;
    $lname = $_POST["lname"] ?? null;
    $fname = $_POST["fname"] ?? null;

    // Displaying received values (for testing purposes)
    echo "Received data:<br>";
    echo "Student ID: " . $stud_id . "<br>";
    echo "Last Name: " . $lname . "<br>";
    echo "First Name: " . $fname . "<br>";
} else {
    echo "Invalid request method";
}

?>