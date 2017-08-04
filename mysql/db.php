<?php
    // Connect to database
    // mysqli_connect("server", "phpmyadmin user", "pw", "db name")
    $connection = mysqli_connect("localhost", "root", "root99", "loginapp");
    
    if (!$connection) {
        // stop executing code
        die("<br/>Database connection failed<br/>");
    }
?>