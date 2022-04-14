<?php
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Create User Page</title>
	</head>
	<body>

		<h1>Timetable</h1>
        <h2>Create New User</h2>

		<form action="availabilitypage.php">
            <p>Enter Name:
                <input type="text" name="name" size="15" maxlength="50" />
            </p>
			<p>Enter Email:
				<input type="email" name="username" size="15" maxlength="40" />
			</p>
			<p>Create Password:
				<input type="password" name="password" size="15" maxlength="20" />
			<p>Re-type Password:
				<input type="password" name="confirmPass" size="15" maxlength="20" />
			</p>
			<label for="company">Employer:</label>
			<select name="Company" id="company">
				<option value="Company 1">Company 1</option>
				<option value="Company 2">Company 2</option>
				<option value="Company 3">Company 3</option>
			</select>
            <br>
            <br>
		    <input type="submit" value="Sign Up">
        </form>
		<br>
		<p>Already have an account? <a href="loginpage.php">Click here</a></p>

	</body>
</html>
<?php
?>
