<?php

$conn=new mysqli("localhost","root","","GASSA_DB");

if ($conn->connect_error)
{
die("Connection failed: " . $conn->connect_error);
}

?>