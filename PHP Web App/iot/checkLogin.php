<?php 
require("connect.php");
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$username=$_POST['username'];
$password=$_POST['password'];

$sql = "SELECT DISTINCT username,password from login where username='$username' and password='$password'";
$res = mysqli_query($conn, $sql);

if($res->num_rows>0){
session_start();
$_SESSION['username']=$username;
$_SESSION['password']=$password;

header("location:main.php");	
}
else{

echo "Username or password is wrong";
header("location:index.php");
}
?>