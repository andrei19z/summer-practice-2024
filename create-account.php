<!doctype html>
<html lang="en">
  <head>
    <title>Create Account on Database</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <style>
      body {
        background-color: #f8f9fa;
        font-family: 'Arial', sans-serif;
      }
      .container {
        max-width: 600px;
        margin: 50px auto;
        background: #ffffff;
        padding: 30px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }
      .alert {
        text-align: center;
      }
      h3 {
        margin-bottom: 20px;
      }
      .form-group {
        margin-bottom: 15px;
      }
      .form-control {
        border-radius: 4px;
        padding: 10px;
        font-size: 16px;
      }
      .btn-outline-primary {
        border-radius: 4px;
        padding: 10px 20px;
        font-size: 16px;
      }
      .btn-outline-primary:hover {
        background-color: #007bff;
        color: #fff;
      }
      .mt-4 {
        margin-top: 1.5rem !important;
      }
      .role-alert {
        padding: 20px;
        border-radius: 5px;
        font-size: 16px;
      }
      .buton-home {
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff; 
    color: #fff; 
    text-decoration: none;
    border-radius: 5px; 
    border: 2px solid #007bff; 
    transition: background-color 0.3s, color 0.3s; 
}

.buton-home:hover {
    background-color: #0056b3; 
    color: #fff; 
}

    </style>
  </head>
  <body>
  <header>
    <a href="homepage.html" class="buton-home">Home</a>
</header>
    <div class="container">
    <?php
include 'conn.php';
$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$checkEmail = "SELECT * FROM user2 WHERE Email = '$_POST[email]' ";
$result = $conn->query($checkEmail);
$count = mysqli_num_rows($result);

if ($count == 1) {
    echo "<div class='alert alert-warning mt-4' role='alert'>
            <p>That email is already in our database.</p>
          </div>";
} else {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $query = "INSERT INTO user2 (Name, Email, Password) VALUES ('$name', '$email', '$pass')";

    if (mysqli_query($conn, $query)) {
        echo "<div class='alert alert-success mt-4' role='alert'>
                <h3>Your account has been created.</h3>
              </div>";    
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>

    </div>
  </body>
</html>
