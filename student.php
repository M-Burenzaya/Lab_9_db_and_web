<?php

$user = 'root';
$pass = '';
$dbName = 'lab_10';
$host = 'localhost';

$conn = new mysqli($host, $user, $pass, $dbName);

if ($conn->connect_error) {
    die("Холболт амжилтгүй: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $stud_id = $_POST["stud_id"] ?? null;
    $lname = $_POST["lname"] ?? null;
    $fname = $_POST["fname"] ?? null;

    if ($stud_id !== null && $lname !== null && $fname !== null) {
    
        $stmt = $conn->prepare("INSERT INTO Students (StudentID, lname, fname) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $stud_id, $lname, $fname);

        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            echo "Өгөгдөл амжилттай нэмэгдлээ." . "<br>";
            echo "Student ID: " . $stud_id . "<br>";
            echo "Last Name: " . $lname . "<br>";
            echo "First Name: " . $fname . "<br>";
        } else {
            echo "Нэмэх үйлдэл амжилтгүй: " . $conn->error;
        }

        $stmt->close();
    } else {
        echo "Бүх талбарыг бөглөнө үү.";
    }
} else {
    echo "Зөвхөн POST хүсэлт ашиглана уу.";
}

$conn->close();
?>
