<?php
/*include 'connect_updated.php'; */
include 'unified_dbconnect.php';
    
$phone_id   = isset($_POST['executive_phone']) ? $_POST['executive_phone'] : "1234567890";

$query = " SELECT * FROM executive_details WHERE  mobile_no = '$phone_id' ";

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
