<?php
$conn = mysqli_connect("localhost", "root", "", "carpool");

if(!$conn){
	die("Connection failed!");
}

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "INSERT INTO korisnik (ime, password) VALUES ('$username' , '$password')";
$result = mysqli_query($conn,$sql);

header("Location: login.php");





  ?>
    
   