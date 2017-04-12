<?php
/*include 'connect_updated.php'; */
include 'unified_dbconnect.php';
    
$phone_id   = isset($_GET['manager_phone']) ? $_GET['manager_phone'] : "8800213260";
$manager_name   = isset($_GET['manager_name']) ? $_GET['manager_name'] : "sanjay";
$manager_token   = isset($_GET['manager_token']) ? $_GET['manager_token'] : "TTTTTTTTTTTT";

$query = "UPDATE executive_manager_details SET manager_token= '$manager_token' WHERE  mobile_no = '$phone_id'  AND  manager_name = '$manager_name' ";
$result =mysqli_query($link,$query);

$query = " SELECT * FROM executive_manager_details WHERE  mobile_no = '$phone_id'  AND  manager_name = '$manager_name' ";
$result =mysqli_query($link,$query);

if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$token_no = $row['manager_token'];

if(strcmp($token_no,$manager_token)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
