<?php
session_start();
require 'config/database.php';
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

        <?php
        $usernameErr = "";
        $passwordErr = "";
        $nameErr = "";
        $ageErr = "";
        $emailErr = "";
        $cpasswordErr = "";

        $username = "";
        $password = "";
        $name = "";
        $age = "";
        $email = "";
        $cpassword = "";
        ?>

        <?php if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $stmt = $conn->prepare("SELECT username FROM users WHERE username = :username");
            $stmt->bindParam(':username', $usernamesearch);

            // insert a row

            if (empty($_POST["username"])) {
                $usernameErr = "Username is required";
            } else {
                $username = test_input($_POST["username"]);
                $usernamesearch = htmlspecialchars(strip_tags($_POST['username']));
                $stmt->execute();
                $result = $stmt->setFetchMode(PDO::FETCH_NUM);
                $usernamefetch = $stmt->fetch();
                if ($usernamefetch != null){
                    $usernameErr = "User already exists, try another username";
                }
            }

            if (!empty($_POST["password"]) && ($_POST["password"] == $_POST["cpassword"])) {
                $password = test_input($_POST["password"]);
                $cpassword = test_input($_POST["cpassword"]);
                if (strlen($_POST["password"]) < 8) {
                    $passwordErr = "Your Password Must Contain At Least 8 Characters!";
                } elseif (!preg_match("#[0-9]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Number!";
                } elseif (!preg_match("#[A-Z]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
                } elseif (!preg_match("#[a-z]+#", $password)) {
                    $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
                }
            } else {
                $passwordErr = "Password is required";
            }

            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["name"]);
                if (!preg_match("/^[a-zA-Z ]*$/", $name)) {
                    $nameErr = "Only letters and white space allowed";
                }
            }

            if (empty($_POST["age"])) {
                $ageErr = "Age is required";
            } else {
                $age = test_input($_POST["age"]);
            }

            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                    $emailErr = "Invalid email format";
                }
            }

            if ($usernameErr == "" && $passwordErr == "" && $nameErr == "" && $ageErr == "" && $emailErr == "") {
                $_SESSION['username'] = $username;
                $_SESSION['password'] = $password;
                $_SESSION['name'] = $name;
                $_SESSION['age'] = $age;
                $_SESSION['email'] = $email;
                header("Location: login.php");
                exit();
            }
        }
        function test_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        } ?>
        
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <table>
                <tr>
                    <td align="left">Username:</td>
                    <td align="left"><input type="text" name="username" value="<?php echo $username;?>"/><br></td>
                    <td align="left"><?php echo $usernameErr ?></td>
                </tr>
                <tr>
                    <td align="left">Password:</td>
                    <td align="left"><input type="password" name="password" /><br></td>
                    <td align="left"><?php echo $passwordErr ?></td>
                </tr>
                <tr>
                    <td align="left">Confirm Password:</td>
                    <td align="left"><input type="password" name="cpassword" /><br></td>
                    <td align="left"><?php echo $cpasswordErr ?></td>
                </tr>
                <tr>
                    <td align="left">Name:</td>
                    <td align="left"><input type="text" name="name" value="<?php echo $name;?>"/><br></td>
                    <td align="left"><?php echo $nameErr ?></td>
                </tr>
                <tr>
                    <td align="left">Age:</td>
                    <td align="left"><input type="number" name="age" min="0" value="<?php echo $age;?>"/><br></td>
                    <td align="left"><?php echo $ageErr ?></td>
                </tr>
                <tr>
                    <td align="left">Email:</td>
                    <td align="left"><input type="text" name="email" value="<?php echo $email;?>"/><br></td>
                    <td align="left"><?php echo $emailErr ?></td>
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