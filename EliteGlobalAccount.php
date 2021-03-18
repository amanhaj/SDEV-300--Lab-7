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
// SQL to create table

	$sql = "CREATE TABLE BankAccount(
		AccountNumber int,
		RoutingNumber int,
		Name varchar(40),
		AvaliableFunds int,
		PRIMARY KEY (AccountNumber)
	)";
	if ($conn->query($sql) === TRUE) {
		echo "Table BankAccount created successfully<br>";
	} 
	else {
		echo "Error creating table: " . $conn->error . "<br>";
	}
	
	$sql = "INSERT INTO BankAccount (AccountNumber, RoutingNumber, Name, AvaliableFunds)
	VALUES (987654321, 97531000, 'Seraphine Beaumont', 24566690);";
	$sql .= "INSERT INTO BankAccount (AccountNumber, RoutingNumber, Name, AvaliableFunds)
	VALUES (987654322, 97531001, 'Earl OKeefe', 570000000);";
	$sql .= "INSERT INTO BankAccount (AccountNumber, RoutingNumber, Name, AvaliableFunds)
	VALUES (987654323, 97531002, 'Maximillian Ashton', 2790600);";
	$sql .= "INSERT INTO BankAccount (AccountNumber, RoutingNumber, Name, AvaliableFunds)
	VALUES (987654324, 97531003, 'Ingrid Farraday', 79800000)";
	
	if ($conn->multi_query($sql) === TRUE) {
		echo "New record created successfully";
	}		 
	else {
		echo "Check data: " . $sql . "<br>" . $conn->error;
	}
	
	$conn->close();
	?>
	<p>Please enter bank account number:</p>
	
		<form action="EliteGlobalLand2.php" method="POST" >
			<input type="text" name="submission" >
			<button type="submit" name="submit" >Submit</button>
		</form>


</body> 
</html>
