<?php

include 'config/checkSession.php';

session_id($_COOKIE["SessionID"]);
session_start();

echo 'Welcome to page #3' . "<br>";
echo 'Session information has been updated' . "<br>";

$_SESSION['favcolor'] = 'blue';
$_SESSION['animal']   = 'dog';
$_SESSION['time']     = time();
$_SESSION['clicks'] = $_SESSION['clicks']+1;

echo "<br><br>Number of clicks is: " . $_SESSION['clicks']. "<br>";
echo "<a href='getSessionData.php'>View Current Session Data </a>";


?>