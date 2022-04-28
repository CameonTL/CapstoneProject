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
        <title>User Page</title>
    </head>
    <body>

    <body style="background-color:RoyalBlue;">
        <fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f; border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">
        <style>
            body {
                font-size: 80%;
                font-family: "Courier New", Courier, monospace;
                letter-spacing: 0.15em;	
                background-color: #3366cc;}
            #page {
                max-width: 940px;
                min-width: 720px;
                margin: 10px auto 10px auto;
                padding: 20px;
                border: 4px double #000;
                background-color: #ffffff;
                box-shadow: 0px 0px 2px 2px black;
            }
            ul {
                width: 570px;
                padding: 15px;
                margin: 0px auto 0px auto;
                border-top: 2px solid #000;
                border-bottom: 1px solid #000;
                text-align: center;
            }
            li {
                display: inline;
                margin: 0px 3px;
            }
            a:hover, a.on {
                color: #0f0f0f;
                background-color: #FDFEFE;
            }
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

        $email = $_SESSION["user"];
        $sql = "SELECT uname, uemail FROM USER_LOGIN";
        $userResult  =$conn->query($sql);
        if ($userResult->num_rows > 0) {
            while ($userRow = $userResult->fetch_assoc()) {
                if ($userRow["uemail"] == $email) {
                    $uName = $userRow["uname"];
                    break;
                }
            }
        }
        ?>

        <h1>Timetable.com</h1>
        <h2>Hello, <?php echo $uName;?></h2>

		<div id ="nav">
		    <ul>
    			<li><a href="loginpage.php">Sign Out</a></li>
	    		<li><a href="availabilitypage.php">Availability Times</a></li>
		    	<li><a href="">Company Info</a></li>
		    </ul>
		</div>

		<fieldset style="border-left-color: #0f0f0f; border-bottom-color: #0f0f0f; border-top-style: solid; border-top-color: #0f0f0f; border-right-style: solid; border-left-style: solid; border-right-color: #0f0f0f; border-bottom-style: solid">
		
        <div class="article column1">
            <p>Company 1</p>
            <p>Contact Number</p>
            <p>Address</p>
            <input type="submit" value="Employees">
        </div>
            <div class="article column2">
            <p>Company 2</p>
            <p>Contact Number</p>
            <p>Address</p>
            <input type="submit" value="Employees">
        </div>
            <div class="article column3">
            <p>Company 3</p>
            <p>Contact Number</p>
            <p>Address</p>
            <input type="submit" value="Employees">
        </div>
        <div id="footer">
        <p>&copy; Copyright 2022</p>
        </div>
        
    </body>
</html>