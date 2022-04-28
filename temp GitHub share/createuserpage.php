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
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Create User Page</title>
		<style>
			.error {color: #FF0000;}
		</style>
	</head>
	<body>
		<body style="background-color:RoyalBlue;">

		<fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f;
		border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">
		<style>
			fieldset {
				background-color: #	858886;
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

		<?php
		$conn = new mysqli(SERVERNAMEDB, USERNAMEDB, PASSWORDDB, DBNAME);

		$nameErr = $emailErr = $passwordErr = $passwordCheckErr = "";
		$name = $email = $password = $passwordCheck = "";

		if ($_SERVER["REQUEST_METHOD"] == "POST") {
			if (empty($_POST["name"])) {
				$nameErr = "Name is required";
			} else {
				$name = test_input($_POST["name"]);
				if (!preg_match("/^[a-zA-Z-' ]*$/", $name)) {
					$nameErr = "Only letters and white spaces allowed in name";
				} else {
					$trueName = $name;
				}
			}
			if (empty($_POST["email"])) {
				$emailErr = "Email is required";
			} else {
				$email = test_input($_POST["email"]);
				if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
					$emailErr = "Invalid email";
				} else {
					$trueEmail = $email;
				}
			}
			if (empty($_POST["password"])) {
				$passwordErr = "Password is required";
			} elseif ($_POST["passwordCheck"] !== $_POST["password"]) {
				$passwordCheckErr = "Password must match";
			} else {
				$password = test_input($_POST["password"]);
				$truePassword = $password;
			}
		}
		function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}
	
		$stmt = $conn->prepare("INSERT INTO USER_LOGIN (uname, uemail, upassword) VALUES (?,?,?)");
		$stmt->bind_param("sss", $trueName, $trueEmail, $truePassword);

		$stmt->execute();

		$stmt->close();
		$conn->close();

		if ($trueName != "" && $trueEmail != "" && $truePassword != "") {
			echo "<script> location.href='loginpage.php'; </script>";
			exit();
		}

		?>

		<h1>Timetable</h1>
        <h2>Create New User</h2>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            Enter Name: <input type="text" name="name" value="<?php echo $name;?>">
			<span class="error"><?php echo $nameErr;?></span>
			<br><br>
			Enter Email: <input type="email" name="email" value="<?php echo $email;?>">
			<span class="error"><?php echo $emailErr;?></span>
			<br><br>
			Create Password: <input type="password" name="password">
			<span class="error"><?php echo $passwordErr;?></span>
			<br><br>
			Re-type Password: <input type="password" name="passwordCheck">
			<span class="error"><?php echo $passwordCheckErr;?></span>
			<br><br>
			<label for="company">Employer:</label>
			<select name="Company" id="company">
				<option value="Company 1">Company 1</option>
				<option value="Company 2">Company 2</option>
				<option value="Company 3">Company 3</option>
			</select>
            <br><br>
		    <input type="submit" value="Sign Up">
			<br><br>
        </form>

		Already have an account? <a href="loginpage.php">Click here</a>

	</body>
</html>
<?php
?>