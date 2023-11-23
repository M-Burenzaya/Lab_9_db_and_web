<?php
$user = 'root';
$pass = '';
$dbName = 'lab_10';
$host = 'localhost';

$conn = new mysqli($host, $user, $pass, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $specificDate = $_POST["specific_date"] ?? null;

    if ($specificDate !== null) {

        $sql = "SELECT s.StudentID, s.lname, s.fname, v.VisitDate, v.SpentTime
        FROM Students s
        INNER JOIN Visits v ON s.StudentID = v.StudentID
        WHERE DATE(v.VisitDate) = ?";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("s", $specificDate);
        $stmt->execute();

        $result = $stmt->get_result();
        
        // if ($result->num_rows > 0) {
        //     $data = array();

        //     while ($row = $result->fetch_assoc()) {
        //         $data[] = $row; // Append each row to the data array
        //     }

        //     // Output the data as JSON
        //     header('Content-Type: application/json');
        //     echo json_encode($data);
        // } else {
        //     echo "No data found for the specified date.";
        // }

        if ($result->num_rows > 0) {

            echo '<table id="result-table">';
            echo "<tr>
                <th>Оюутны ID</th>
                <th>Оюутны овог</th>
                <th>Оюутны нэр</th>
                <th>Суусан өдөр</th>
                <th>Өнгөрүүлсэн цаг</th>
                </tr>";

            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['StudentID'] . "</td>";
                echo "<td>" . $row['lname'] . "</td>";
                echo "<td>" . $row['fname'] . "</td>";
                echo "<td>" . $row['VisitDate'] . "</td>";
                echo "<td>" . $row['SpentTime'] . "</td>";
                echo "</tr>";
            }

            echo "</table>";
        } else {
            echo "No data found for the specified date.";
        }

        $stmt->close();
    } else {
        echo "Specific date is required.";
    }
} else {
    echo "Only use POST requests.";
}

$conn->close();
?>
