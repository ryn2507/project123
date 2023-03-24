<?php

$svName = "localhost";
$user = "root";
$pass = "";
$dbName = "testing_nibras";

$conn = mysqli_connect($svName, $user, $pass, $dbName);

if ($conn) {
    #echo "Sukses";
} else {
    echo "Connection Failed...!!!";
}
