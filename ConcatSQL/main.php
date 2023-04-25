<?php

$connection = new mysqli("localhost", "root", "", "doctors");

if ($connection->errno == 0) {
    $mysqlReq = "SELECT CONCAT(d.firstName ,' ', d.lastName) AS Doctor, t.treatedPerson FROM doctors d INNER JOIN treatments t ON d.doctorId = t.doctorId;";

    $result = $connection->query($mysqlReq);
    if ($result === false) {
        echo "Error with SQL query";
        $connection->close();
        exit();
    }

    while ($row = $result->fetch_assoc()) {
        $doctor = $row["Doctor"];
        $treatedPerson = $row["treatedPerson"];
        echo "<tr><td>$doctor</td><td>$treatedPerson</td></tr>";
    }
}
