<?php

error_reporting(E_ALL);
ini_set('display_errors', '1');

$code =  $_POST['code'];
$uname = $_POST['username'];
$filename = uniqid();
		$servername = "localhost";
		$username = "DexterGCC";
		$password = "dexterSQL@123";
		$dbname = 'Userdata';

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error)
	       	{
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "INSERT INTO Submissions(ID, code, user) VALUES ('$filename','$code','$uname')";
		$result = $conn->query($sql);
$sql = "SELECT * from Submissions where user='$uname' ORDER BY Time DESC LIMIT 3";
	$result = $conn->query($sql);
		$conn->close();
		echo "<h3>History:</h3>";
		echo '<table class="table"><thead class="black white-text"><tr><th scope="col">ID</th><th scope="col">Time</th></tr></thead><tbody>';
		foreach($result as $row)
		{
		echo "<tr><th><a href='view.php?id=".$row['ID']."'>".$row['ID']."</a></th><th>".$row['Time']."</th></tr>";
		}
		echo "</tbody></table>";


?>



