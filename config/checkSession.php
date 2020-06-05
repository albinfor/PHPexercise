<?php

if (empty($_COOKIE["SessionID"])){
    header("Location: start_session.php");
    exit();
}
?>