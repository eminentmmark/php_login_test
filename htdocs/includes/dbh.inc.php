<?php

//creating variables(parameters)
$serverName = "localhost";
$dBUserName = "root";
$dBPassword = "";
$dBName = "loginsystem-test1";

//connection to the database
$conn = mysqli_connect($serverName, $dBUserName, $dBPassword, $dBName);

//checking if the connenction failed
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}