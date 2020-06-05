<?php

if (!empty($_COOKIE["SessionID"])){
    session_id($_COOKIE["SessionID"]);
    session_start();
} else {
    session_start();
    $_SESSION['clicks'] = 0;
}

$sessID = session_id();
setcookie("SessionID", "$sessID", time()+86400*30); 

echo 'Welcome to page #1' . "<br>";

$_SESSION['favcolor'] = 'green';
$_SESSION['animal']   = 'cat';
$_SESSION['time']     = time();
$_SESSION['clicks']   = $_SESSION['clicks'];

echo "Favorite color is: " . $_SESSION['favcolor'] . "<br>";
echo "The Animal is: " . $_SESSION['animal']. "<br>";
echo "Session start time is: " . $_SESSION['time']. "<br>";
echo "Number of clicks is: " . $_SESSION['clicks']. "<br>";

echo "<a href='getSessionData.php'>Check Session Data </a>";
?>
