<?php 
// Define constants for username field
define('maxLength', 15);
define('minLength', 7);

// returns true if username is valid
function validUsername($username) {
    if (strlen($username) < maxLength  && strlen($username)) {
        return true;
    } else return false;    
}

// returns true if password is valid
function validPassword($password) {
    if (strlen($password) > 1) {
        return true;
    } else return false;
}

// returns true if username and password are valid
function meetsRequirements($username, $password) {
    if (validUsername($username) && validPassword($password)) {
        return true;
    } else {
        echo "Uh oh!  Something is wrong with your username or password:<br/><br/>";
        return false;
    }
}

// If form field is set, store username into username, password into password
// echo appropriate response based on username/password validity
if(isset($_POST['submit'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    if (meetsRequirements($username, $password)) {
        echo "You have successfully logged in as " . $username . " <br/>";
    } else if (!validUsername($username)) {
        echo "Your username must be longer than 7 characters, and under 15 characters.<br/>";
    } else if (!validPassword($password)) {
        echo "Your password field is empty.<br/>";
    } else {
        echo "Invalid username or password.<br/>";
    }
}





?>