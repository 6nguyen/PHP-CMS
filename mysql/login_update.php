<?php 
// C.R.U.D - Update step
    
include "db.php";
include "functions.php";

if(isset($_POST['update'])) {
    updateUser(); 
}

?>



<?php include "includes/header.php" ?>
       
        <div class="col-xs-6">
            <h1 classname="text-center">Update User</h1>
            <form action="login_update.php" method="POST">
               
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
                
                <input type="submit" name="update" value="Update" class="btn btn-primary">
            </form>            
            
        </div>

<?php include "includes/footer.php" ?>


