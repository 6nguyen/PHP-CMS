<?php include "db.php"; ?>
<?php


// Returns all data from users from a query
function userQuery() {
    // If a var is created in another file, must declare as global in function local scope!!!!!!!!!!!!!!!!!!
    global $connection;
    // Read MySQL data from users 
    $query = "SELECT * FROM users";

    // prebuilt function to execute queries to db and store values in $result
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("Query failed. " . mysqli_error());
    } else {
        return $result;
    }
}


// prints a <select><option> list of user id's.
function showId() {
    $result = userQuery();
    
    while($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        printf("<option value='$id'>$id</option>");
    }
}


// reads the html update form and updates user in DB
function updateUser(){
    global $connection;

    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];

    $query = "UPDATE users SET ";
    $query .= "username = '$username', ";
    $query .= "password = '$password' ";
    $query .= "WHERE id = $id ";

    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("<br/>Query failed.<br/>" . mysqli_error());
    } else echo "<br/>User ID: " . $id . " has successfully updated.<br/><br/>"; 
}


// reads the delete html form and deletes user from DB
function deleteUser() {
    global $connection;
    $result = userQuery();
    $username = $_POST['username'];
    $password = $_POST['password'];
    $id = $_POST['id'];
    $validRecord = true;
    
    while($row = mysqli_fetch_assoc($result)) {
        if ($username == $row['username'] && $password == $row['password'] && $id = $row['id']){
            
            $query = "DELETE FROM users WHERE ";
            $query .= "id = $id ";

            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("<br/>Query failed.<br/>" . mysqli_error($connection));
            } else echo "<br/>User ID: " . $id . " has been deleted.<br/><br/>";      
        } else $validRecord = false;
    }
    if (!$validRecord) {
        echo "Invalid username or password.<br/><br/>";
    }
}

?>