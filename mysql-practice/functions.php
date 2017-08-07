<?php include "db.php"; ?>
<?php 

function addUser() {
    global $connection;
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    
    if ($firstName && $lastName && $email) {
        $query = "INSERT INTO students (firstName, lastName, email) VALUES(";
        $query .= "'$firstName', ";
        $query .= "'$lastName', ";
        $query .= "'$email' ";
        $query .= ") ";
        
        $result = mysqli_query($connection, $query);
        if (!$result){
            die("<br/>Query failed.<br/>" . mysqli_error($connection));
        } else {
            echo "<br/>" . $firstName . " " . $lastName . " successfully added to the database.<br/>";        
        }
    }
}





?>