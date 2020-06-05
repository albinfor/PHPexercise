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
<h1> Log in test page </h1>

<?php


// Called when post request is made
if ($_SERVER["REQUEST_METHOD"] == "POST") {


        // Create query

        $stmt = $conn->prepare("SELECT passwordhash FROM passwords WHERE username = :username");
        $stmt->bindParam(':username', $username);
    
        // insert a row
        $username = htmlspecialchars(strip_tags($_POST['username']));
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_NUM);
    try{
        $passwordhash = $stmt->fetch();
        $password = test_input($_POST["password"]);
        if ($passwordhash == null){
            $correctPassword = False;
        }else{
            $correctPassword = password_verify($password,$passwordhash[0]);
        }
        if ($correctPassword){
            $stmt = $conn->prepare("SELECT fullname FROM users WHERE username = :username");
            $stmt->bindParam(':username', $username);
            $stmt->execute();
            $result = $stmt->setFetchMode(PDO::FETCH_NUM);
            $fullname = $stmt->fetch();
            echo "Welcome " . $fullname[0] . "<br>";
            echo "Log in succesful";
        } else {
            echo "Wrong Password!<br>Log in not succesful";
        }

} catch (PDOException $e){
    echo "No user found <br>";
}
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<table>
    <tr>
      <td align="left">Username:</td>
      <td align="left"><input type="text" name="username" /><br></td>
    </tr>
    <tr>
      <td align="left">Password:</td>
      <td align="left"><input type="password" name="password" /><br></td>
    </tr>
  </table>
  <input type="submit">
</form>



</div>





<!-- Create entry in the database
<?php


?>
 -->




</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
