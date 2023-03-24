<?php
include "conn.php";

function query($query){
    global $conn;
    $result = mysqli_query($conn,$query);
    #print_r($result);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function getUserBySearch($search){
    $sql = "select * from tableusers where userid like '%$search%' or username like '%$search%' ";
    return query($sql);
}





?>