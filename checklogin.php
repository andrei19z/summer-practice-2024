<?php
			
include 'conn.php';	
			
			
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

			
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
			
			
$email = $_POST['email']; 
$password = $_POST['password'];
			
			
$result = mysqli_query($conn, "SELECT Email, Password, Name FROM user2 WHERE Email = '$email'");
			
			
$row = mysqli_fetch_assoc($result);
			
			
$pass = $row['Password'];
			
			
if ($_POST['password'] == $pass) {	
				
    $_SESSION['loggedin'] = true;
    $_SESSION['name'] = $row['Name'];
    $_SESSION['start'] = time();
    $_SESSION['expire'] = $_SESSION['start'] + (1 * 60);						
				
    echo "<div class='alert alert-success mt-4' role='alert'><strong>Welcome!</strong> $row[Name]			
    <p><a href='edit-profile.php'>Edit Profile</a></p></div>";	
			
} else {
    echo "<div class='alert alert-danger mt-4' role='alert'>Email or Password are incorrects!
    <p><a href='login.html'><strong>Please try again!</strong></a></p></div>";			
}	
?>