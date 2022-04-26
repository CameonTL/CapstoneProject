<?php
define("SERVERNAMEDB", "localhost");
define("USERNAMEDB", "CameronTL");
define("PASSWORDDB", "passwordCTL08");
define("DBNAME", "scheduler");
$conn = new mysqli(SERVERNAMEDB, USERNAMEDB, PASSWORDDB, DBNAME);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
mysqli_close($conn);
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Login Page</title>
        <style>
            .error {color: #FF0000;}
        </style>
	</head>
	<body>

    <body style="background-color:RoyalBlue;">

		<fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f; border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">
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

        <?php
        $conn = new mysqli(SERVERNAMEDB, USERNAMEDB, PASSWORDDB, DBNAME);

        $sql = "SELECT uemail, upassword FROM USER_LOGIN";
        $userResult = $conn->query($sql);

        $emailErr = $passwordErr = "";
        $email = $password = "";
        $userAcc = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["email"])) {
                $emailErr = "Enter a valid email";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email";
                }
                if ($userResult->num_rows > 0) {
                    while($userRow = $userResult->fetch_assoc()) {
                        if ($userRow["uemail"] == $email) {
                            $emailConfirm = $userRow["uemail"];
                            break;
                        }
                    }
                } else {
                    $emailErr = "No data found in database";
                }
            }
            $userResult = $conn->query($sql);
            if (empty($_POST["password"])) {
                $passwordErr = "Password is required";
            } else {
                $password = test_input($_POST["password"]);
                if ($userResult->num_rows > 0) {
                    while($userRow = $userResult->fetch_assoc()) {
                        if ($userRow["uemail"] == $email) {
                            if ($userRow["upassword"] == $password) {
                                $userAcc = $userRow["uemail"];
                                break;
                            } else {
                                $passwordErr = "Incorrect password";
                            }
                        }
                    }
                }
            }
        }

        function test_input($data) {
			$data = trim($data);
			$data = stripslashes($data);
			$data = htmlspecialchars($data);
			return $data;
		}

        $conn->close();

        if ($userAcc != "") {
            echo "<script> location.href='userpage.php'; </script>";
            exit();
        }
        ?>

		<h1>Timetable</h1>
		<h2>Log In</h2>

		<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
			Username: <input type="email" name="email" value="<?php echo $email;?>">
            <span class="error"><?php echo $emailErr;?></span>
            <br><br>
			Password: <input type="password" name="password">
            <span class="error"><?php echo $passwordErr;?></span>
            <br><br>
			<input type="submit" value="Sign In">

		</form>

        <?php
        ?>
        <br><br>
		<a href="createuserpage.php">Sign Up Here!</a>
        
	</body>
</html>
<?php
?>
