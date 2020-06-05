<?php
    session_start();
    require 'config/database.php';
?>


<!DOCTYPE html>
<html>
<head>
    <title>Log in confirmation</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>

<div class="container">
<h1> Log in page </h1>




<?php
echo "Welcome " . htmlspecialchars(strip_tags($_SESSION['name'])); ?> <br>
Log in succesful

</div>





<!-- Create entry in the database -->
<?php
    // Create query
    $stmt = $conn->prepare("INSERT INTO users (Age, Email, Fullname, Username) VALUES (:age, :email, :fullname, :username)");
    $stmt->bindParam(':age', $age);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':fullname', $name);
    $stmt->bindParam(':username', $username);

    // insert a row
    $age = htmlspecialchars(strip_tags($_SESSION['age']));
    $email = htmlspecialchars(strip_tags($_SESSION['email']));
    $name = htmlspecialchars(strip_tags($_SESSION['name']));
    $username = htmlspecialchars(strip_tags($_SESSION['username']));
    $stmt->execute();

    $stmt = $conn->prepare("INSERT INTO passwords (username, passwordhash) VALUES (:username, :passwordhash)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':passwordhash', $passwordhash);

    // insert a row
    $username = htmlspecialchars(strip_tags($_SESSION['username']));
    $passwordhash = password_hash($_SESSION['password'], PASSWORD_DEFAULT);
    $stmt->execute();

?>

<br> The password hash is: <?php echo $passwordhash?>




</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
