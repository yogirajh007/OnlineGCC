<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', '1');

if (isset($_POST['username']))
{
	$email = $_POST['username'];
	$email = filter_var($email, FILTER_SANITIZE_EMAIL);
	if (filter_var($email, FILTER_VALIDATE_EMAIL) === false)
		{
		    $error = "$email is a not valid email address";
		}
	else
	{
		$servername = "localhost";
		$username = "DexterGCC";
		$password = "dexterSQL@123";
		$dbname = 'Userdata';
		// Create connection
		//$conn = new mysqli($servername, $username, $password, $dbname);

		// Check connection
		// if (!$conn) {
		//     die("Connection failed: " . mysqli_connect_error());
		// }
		$uname = $_POST['username'];
		$passw = $_POST['password'];
		// echo "$uname";

		$conn = new mysqli($servername, $username, $password, $dbname);
		// Check connection
		if ($conn->connect_error) {
		    die("Connection failed: " . $conn->connect_error);
		}

		$sql = "SELECT username FROM userdata WHERE username='$uname' AND password=sha1('$passw')";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
			$_SESSION['uname']=$uname;
			echo 'Yes';
		    // output data of each row
		    // while($row = $result->fetch_assoc()) {
		    //     echo "uname: " . $row["username"]. "<br>";
		    // }

		} else {
			echo 'No';
		}
		$conn->close();
	}
}

?>



