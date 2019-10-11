<?php
$servername = "mysql.abdn.ac.uk";
$username = "csc316_student";
$password = "etUYGSMv";
$dbname = "csc316_webtech";

// Create connection
$connection = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
} 

$sql = "SELECT id, type, requirements, costPerDay, costPerWeek, costPerMonth, costPerYear FROM pets";
$result = $connection->query($sql);

if ($result->num_rows > 0) {
	echo "<table class='table table-responsive'><tr><th>ID</th><th>Type</th><th>Requirements</th><th>Cost Per Day(£)</th><th>Cost Per Week (£)</th><th>Cost Per Month (£)</th><th>Cost Per Year(£)</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>".$row["id"]."</td><td>".$row["type"]."</td><td>".$row["requirements"]."</td><td>".$row["costPerDay"]."</td><td>".$row["costPerWeek"]."</td><td>".$row["costPerMonth"]."</td><td>".$row["costPerYear"]. "</td></tr>";
    }
	echo "</table>";
} else {
    echo "0 results";
}
$connection->close();
?>