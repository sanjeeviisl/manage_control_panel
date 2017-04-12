<?php

include 'unified_dbconnect.php';
    
$manager_phone = isset($_POST['manager_phone']) ? $_POST['manager_phone'] : 8800213260;
$manager_name = isset($_POST['manager_name']) ? $_POST['manager_name'] : "manager_name";
$manager_email = isset($_POST['manager_email']) ? $_POST['manager_email'] : 'manager_email';
$manager_photo = isset($_POST['manager_photo']) ? $_POST['manager_photo'] : "manager_photo";
$manager_id = isset($_POST['manager_id']) ? $_POST['manager_id'] : 'manager_id' ;
$manager_token = isset($_POST['manager_token']) ? $_POST['manager_token'] : "manager_token";


$query = "SELECT * FROM executive_manager_details WHERE  mobile_no = '$manager_phone'  ";

$result =mysqli_query($link,$query);

if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no_db = $row['mobile_no'];
 
if(strcmp($mobile_no_db,$manager_phone)== 0)
    {
     $query = "UPDATE executive_manager_details SET manager_token= '$manager_token', manager_name = '$manager_name', manager_email = '$manager_email',manager_photo = '$manager_photo',manager_id  = '$manager_id ', manager_token = '$manager_token'  WHERE  mobile_no = '$manager_phone'";
     $result =mysqli_query($link,$query);
     echo "OK";
    }
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
