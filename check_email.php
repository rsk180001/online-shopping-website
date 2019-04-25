<?php
//include("includes/db_connection.php");
session_start();
require "functions/functions.php";
//$sel_email = "select * from customers where cust_email= 'parthkhetarpal@hotmail.com'";
// 'l@hotmail.com';
$e =$_REQUEST["e"];
$sel_email = "select * from customers where cust_email= '$e'";
$run_email  = mysqli_query($con,$sel_email);
$count = mysqli_num_rows($run_email);
if($count>0){
    echo "Email already registered";
}
else{
  echo "Cool";
}
