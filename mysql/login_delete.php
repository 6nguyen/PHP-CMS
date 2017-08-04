<?php 
// C.R.U.D - Update step
    
include "db.php";
include "functions.php";

if(isset($_POST['delete'])) {
    deleteUser();
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
        
            <form action="login_delete.php" method="POST">
               
                <div class="form-group">
                   <label for="username">Username</label>
                    <input type="text" name="username" class="form-control">
                </div>
                
                <div class="form-group">
                   <label for="password">Password</label>
                    <input type="password" name="password" class="form-control">
                </div>  
                              
                <div class="form-group">
                   <select name="id" id="$id">
                    <?php
                       showId();
                    ?>
                   </select>
                </div>
                
                <input type="submit" name="delete" value="Delete" class="btn btn-primary">
            </form>            
            
        </div>
    </div>
</body>
</html>

