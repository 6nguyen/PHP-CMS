<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php 

if(isset($_POST['add'])) {
    addUser();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add User</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <div class="col-xs-6">
            
            <h1 class="text-center">Add User</h1>
            
            <form action="create.php" method="POST">
                <div class="form-group">
                    <input type="text" name="firstName" placeholder="First Name" />
                </div>    
                
                <div class="form-group">
                    <input type="text" name="lastName" placeholder="Last Name" />
                </div>  
                  
                <div class="form-group">
                    <input type="text" name="email" placeholder="Email" />
                </div>  
                
                <input type="submit" class="btn btn-primary" name="add" value="Add Student" />    
                
                <button class="btn btn-default"><a href = "read.php">View Students</a></button>              
            </form>
            
        </div>
    </div>
</body>
</html>