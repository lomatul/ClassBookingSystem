<?php
$conn=mysqli_connect("localhost", "root", "", "dbms_project");

if(!$conn){
    die("Connection Error". mysqli_connect_error());
    //echo "not connected";
}
else{
    //echo "Connected Successfully";
}
?>