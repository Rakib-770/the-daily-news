<?php

$serverName = "localhost";
$userName = "root";
$password = "";
$dbName = "thedailynews";

$conn = mysqli_connect($serverName, $userName, $password, $dbName);

function formatDate($date){
    return date('y-m-d', strtotime($date));
}
function formatTime($time){
    return date('g:i a', strtotime($time));
}
function formatDay($day){
    return date('l', strtotime($day));
}
?>
