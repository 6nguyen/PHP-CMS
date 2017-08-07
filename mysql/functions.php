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


// Displays user records as a table using bootstrap
function viewUsers() {
    global $connection;
    $result = userQuery();

    if (count($result) > 0): ?>
    <table class="table table-striped">
      <thead class="thead-default">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
        </tr>
      </thead>
      <tbody>
    <?php foreach ($result as $row): array_map('htmlentities', $row); ?>
        <tr>
          <td><?php echo implode('</td><td>', $row); ?></td>
        </tr>
    <?php endforeach; ?>
      </tbody>
    </table>
    <?php endif; 
}



// adds a record to the user table in DB
function addUser() {
    global $connection;
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    // Prevent SQL injections by sanitizing the strings (escaping the strings)
    $username = mysqli_real_escape_string($connection, $username);
    $password = mysqli_real_escape_string($connection, $password);
    
    // Password Encryption:
    // CRYPT_BLOWFISH is a hashing method that requires 'salt', 22 characters of acceptable alphabet following the $hashFormat
    // $2y$ is the blowfish hash format.  10$ says to run hash 10 times
    // http://php.net/manual/en/function.crypt.php
    $hashFormat = "$2y$10$";
    $salt = "iusesomecrazystrings22";
    $cryptBlowfish = $hashFormat . $salt;
    $password = crypt($password, $cryptBlowfish); 
    
    // if username and password aren't empty
    if ($username && $password) {
        echo "Adding " . $username . " to the database... <br/>";
    } else {
        die("No username or password entered.<br/>");
    }
    
    // Send form data to MySQL using a query
    $query = "INSERT INTO users(username, password) ";
    $query .= "VALUES ('$username', '$password')";
    
    // prebuilt function to execute queries to db
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("<br/>Query failed.<br/>" . mysqli_error());
    } else echo "<br/>Success.<br/>";
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
    $id = $_POST['id'];
    $validRecord = false;
    
    while($row = mysqli_fetch_assoc($result)) {
        if ($username == $row['username'] && $id == $row['id']){
            $query = "DELETE FROM users WHERE ";
            $query .= "id = $id ";

            $result = mysqli_query($connection, $query);
            if (!$result) {
                die("<br/>Query failed.<br/>" . mysqli_error($connection));
            } else {
                echo "<br/>User ID: " . $id . " has been deleted.<br/><br/>";  
                $validRecord = true;
            }    
        }
    }
    if (!$validRecord) {
        echo "<br/>Invalid username or ID.<br/><br/>";
    }
}

?>