<?php 
session_start(); 

if(isset($_COOKIE[session_name()])){
    setcookie(session_name(), '', time() - 86400, '/');
}
// unset all session variables
session_unset();

session_destroy();

echo "You logged out! Please come again!.<br>";

echo "<p><a href='login.php'>Log back in here</a></p>";

?>