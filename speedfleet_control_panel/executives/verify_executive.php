<?php

include 'unified_dbconnect.php';
    
$phone_id   = isset($_POST['executive_phone']) ? $_POST['executive_phone'] : "1111111111";
$manager_name   = isset($_POST['manager_name']) ? $_POST['manager_name'] : "AAAAAAAAAA";

$query = " SELECT * FROM executive_manager_details WHERE  mobile_no = '$phone_id'  AND  manager_name = '$manager_name' ";

$result =mysqli_query($link,$query);
if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no = $row['mobile_no'];
 
//echo $row['mobile_no'] ;

if(strcmp($mobile_no,$phone_id)== 0)
    echo "OK";
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
