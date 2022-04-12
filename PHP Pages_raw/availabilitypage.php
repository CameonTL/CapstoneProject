<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Availability Page</title>
	</head>
	<body>

		<h1>Timetable</h1>
        <h2>Set Availability</h2>

		<form action="http://www.example.com/login.php">
			<p>Week of scheduling:</p>
			<input id="date" type="date">
			<p>What times will you be avilable?</p>

			<p>Monday Availablity time</p>
			<p>From <input type="time" name="monOpen" /> until <input type="time" name="monClose" /></p>

			<p>Tuesday Availablity time</p>
			<p>From <input type="time" name="tueOpen" /> until <input type="time" name="tueClose" /></p>

			<p>Wednesday Availablity time</p>
			<p>From <input type="time" name="wedOpen" /> until <input type="time" name="wedClose" /></p>

			<p>Thursday Availablity time</p>
			<p>From <input type="time" name="thuOpen" /> until <input type="time" name="thuClose" /></p>

			<p>Friday Availablity time</p>
			<p>From <input type="time" name="friOpen" /> until <input type="time" name="friClose" /></p>
			
            <input type="submit" value="Submit" />
		</form>

		<img src="images/TimeTableLogo.jpg" alt="none"  width="200" height="200" title="Timetable logo" />
        
	</body>
</html>
<?php
?>