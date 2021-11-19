<?php

$servername = "mysql1.cs.clemson.edu";
$dBUsername = "meTube_qiag";
$dBPassword = "4620project";
$dBName = "meTube_zfib";

$conn = mysqli_connect($servername, $dBUsername, $dBPassword, $dBName);

if (!$conn) {
	die("Connection failed: ".mysqli_connect_error());
}
