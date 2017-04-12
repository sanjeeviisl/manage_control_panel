<?php

include 'unified_dbconnect.php';
    
$phone_id   = isset($_GET['executive_phone']) ? $_GET['executive_phone'] : "12345678";
$executive_name   = isset($_GET['executive_name']) ? $_GET['executive_name'] : "naman";
$executive_token   = isset($_GET['executive_token']) ? $_GET['executive_token'] : "TTTTTTTTTTTT";

$query = "UPDATE executive_details SET executive_token= '$executive_token' WHERE  mobile_no = '$phone_id'  AND  executive_name = '$executive_name' ";
$result =mysqli_query($link,$query);

$query = " SELECT * FROM executive_details WHERE  mobile_no = '$phone_id'  AND  executive_name = '$executive_name' ";
$result =mysqli_query($link,$query);

if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$token_no = $row['executive_token'];

if(strcmp($token_no,$executive_token)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
