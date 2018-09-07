<?php 
$host="localhost";
$username="root";
$password="";
$database="infinity_feed";
ob_start();//Turns on output buffering
session_start();
$con=mysqli_connect($host,$username,$password,$database);

if(mysqli_connect_errno())
{

	echo "failed to connect to the database".mysqli_connect_errno();


}