<?php

include 'config/checkSession.php';

session_id($_COOKIE["SessionID"]);
session_start();

$_SESSION['clicks'] = $_SESSION['clicks']+1;

echo 'Welcome to page #2' . "<br>";
echo "Favorite color is: " . $_SESSION['favcolor'] . "<br>";
echo "The Animal is: " . $_SESSION['animal']. "<br>";
echo "Session start time is: " . $_SESSION['time']. "<br>";
echo "Number of clicks is: " . $_SESSION['clicks']. "<br>";

echo "<a href='updateSessionData.php'>Update Session Data </a>";

?>