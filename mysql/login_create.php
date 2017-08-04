<?php include "db.php"; ?>
<?php include "functions.php"; ?>

<?php

if(isset($_POST['submit'])) {
    addUser();
}

?>


<?php include "includes/header.php"; ?>


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


<?php include "includes/footer.php"; ?>


