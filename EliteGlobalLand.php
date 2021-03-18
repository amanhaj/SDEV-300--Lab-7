<?php
opcache_reset();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<?php
	$dbServername = "localhost";
	$dbUsername = "root";
	$dbPassword = "sdev300vm99";
	$dbName = "sdev300";

// Create connection

	$conn = mysqli_connect($dbServername, $dbUsername, $dbPassword, $dbName);

// Check connection

	if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
	}
 
	echo "Connected successfully <br><br>";
	?>
	
	<?php
		if (isset($_POST['submit'])){
			
				$submission = $_POST['submission'];
				$sql = "SELECT * FROM BankAccount WHERE AccountNumber = $submission;";

				$result = mysqli_query($conn, $sql);
				$valueR = mysqli_num_rows($result);
				echo "Results: ".$valueR;
			
			if ($result->num_rows > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					echo "<div class='article-box'>
						<h3>Account: </h3>
						<p>Account Number: ".$row['AccountNumber']."</p>
						<p>Routing Number: ".$row['RoutingNumber']."</p>
						<p>Name : ".$row['Name']."</p>
						<p>Funds Avaliable: ".$row['AvaliableFunds']."</p>
						</div>";
				}
			}
			else {
				echo "<center>Pleae try again!</center>";
			}
		}
	?>
	</body>
</html>