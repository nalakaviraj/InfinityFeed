<?php 
ob_start();//Turns on output buffering
session_start();
$con=mysqli_connect("localhost","root","","swirlfeed");
if(mysqli_connect_errno())
{

	echo "failed to connect".mysqli_connect_errno();


}