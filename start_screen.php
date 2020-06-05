<?php
session_start();
?>


<!DOCTYPE html>
<html>
<head>
    <title>Start screen</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
<h1>Welcome to Albin's simple server</h1>
<p>Who are you?</p>

<form action="login.php" method="post">
  <table>
    <tr>
      <td align="left">Username:</td>
      <td align="left"><input type="text" name="username" /><br></td>
    </tr>
    <tr>
      <td align="left">Name:</td>
      <td align="left"><input type="text" name="name" /><br></td>
    </tr>
    <tr>
      <td align="left">Age:</td>
      <td align="left"><input type="number" name="age" /><br></td>
    </tr>
    <tr>
      <td align="left">Email:</td>
      <td align="left"><input type="text" name="email" /><br></td>
    </tr>
  </table>
  <input type="submit">
</form>



    <form>
        
    </form>
<?php
    require 'config/database.php';
?>
</div>
</body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>