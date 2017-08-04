<?php 
include "db.php";


if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // if username and password aren't empty
    if ($username && $password) {
        echo "Adding " . $username . " to the database. <br/>";
    } else {
        die("No username or password entered.");
    }
    
    // Send form data to MySQL using a query
    $query = "INSERT INTO users(username, password) ";
    $query .= "VALUES ('$username', '$password')";
    
    // prebuilt function to execute queries to db
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed. " . mysqli_error());
    }
}

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="col-xs-6">
           <h1 classname="text-center">Add User</h1>
           
            <form action="login_create.php" method="POST">
               
                <div class="form-group">
                   <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                
                <div class="form-group">
                   <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                
                <input type="submit" name="submit" class="btn btn-primary">
            </form>
            
        </div>
    </div>
</body>
</html>


