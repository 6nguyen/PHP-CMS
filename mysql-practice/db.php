<?php
    // Connect to database
    // mysqli_connect("server", "phpmyadmin user", "pw", "db name")
$connection = mysqli_connect("localhost", "root", "root99", "simple_db");

if (!$connection) {
    die("<br/>Failed to connect to simple_db database.<br/>" . mysqli_error());
}

?>