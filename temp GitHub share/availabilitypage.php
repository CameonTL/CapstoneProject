<?php
define("SERVERNAMEDB", "localhost");
define("USERNAMEDB", "username");
define("PASSWORDDB", "password");
define("DBNAME", "database");
$conn = new mysqli(SERVERNAMEDB, USERNAMEDB, PASSWORDDB, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_close($conn);
session_start();
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Availability Page</title>
	</head>
	<body>

	<fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f;
	border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">
	<style>
		fieldset {
			background-color: #858886;
		}

		legend {
			background-color: gray;
			color: white;
			padding: 5px 10px;
		}

		input {
			margin: 5px;
		}
	</style>
	
	<fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f;
	border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">

		<?php
		$uemail = $_SESSION["user"];
		$conn = new mysqli(SERVERNAMEDB, USERNAMEDB, PASSWORDDB, DBNAME);
		
		$weekOf = "";
		$monOpen = $monClose = "";
		$tueOpen = $tueClose = "";
		$wedOpen = $wedClose = "";
		$thuOpen = $thuClose = "";
		$friOpen = $friClose = "";
		
		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			$weekOf = $_POST["weekOf"];
			$monOpen = $_POST["monOpen"];
			$monClose = $_POST["monClose"];
			$tueOpen = $_POST["tueOpen"];
			$tueClose = $_POST["tueClose"];
			$wedOpen = $_POST["wedOpen"];
			$wedClose = $_POST["wedClose"];
			$thuOpen = $_POST["thuOpen"];
			$thuClose = $_POST["thuClose"];
			$friOpen = $_POST["friOpen"];
			$friClose = $_POST["friClose"];
		}
		
		$stmt = "UPDATE AVAILABLE SET (scheduleWeek=$weekOf, monOpen=$monOpen, monClose=$monClose, tueOpen=$tueOpen, tueClose=$tueClose,
		wedOpen=$wedOpen, wedClose=$wedClose, thuOpen=$thuOpen, thuClose=$thuClose, friOpen=$friOpen, friClose=$friClose) WHERE uemail=$uemail";

		$conn->query($stmt);

		$conn->close();
		?>

		<h1>Timetable</h1>
        <h2>Set Availability</h2>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Hello, <span>
			Week of scheduling:<br>
			<input name="weekOf" type="date" value="<?php echo $weekOf;?>">
			<br><br>
			What times will you be avilable?
			<br><br>

			Monday Availablity time<br>
			From <input type="time" name="monOpen" value="<?php echo $monOpen;?>"> until <input type="time" name="monClose" value="<?php echo $monClose;?>">
			<br><br>

			Tuesday Availablity time:<br>
			From <input type="time" name="tueOpen" value="<?php echo $tueOpen;?>"> until <input type="time" name="tueClose" value="<?php echo $tueClose;?>">
			<br><br>

			Wednesday Availablity time:<br>
			From <input type="time" name="wedOpen" value="<?php echo $wedOpen;?>"> until <input type="time" name="wedClose" value="<?php echo $wedClose;?>">
			<br><br>

			Thursday Availablity time:<br>
			From <input type="time" name="thuOpen" value="<?php echo $thuOpen;?>"> until <input type="time" name="thuClose" value="<?php echo $thuClose;?>">
			<br><br>

			Friday Availablity time:<br>
			From <input type="time" name="friOpen" value="<?php echo $friOpen;?>"> until <input type="time" name="friClose" value="<?php echo $friClose;?>">
			<br><br>
			
            <input type="submit" value="Submit" />
		</form>

		<img src="images/TimeTableLogo.jpg" alt="none"  width="200" height="200" title="Timetable logo" />
        
	</body>
</html>
<?php
?>