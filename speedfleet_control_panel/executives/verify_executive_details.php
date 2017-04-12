<?php
/*include 'connect_updated.php'; */
include 'unified_dbconnect.php';
    
$phone_id   = isset($_POST['executive_phone']) ? $_POST['executive_phone'] : "8800213260";
$name_id   = isset($_POST['executive_name']) ? $_POST['executive_name'] : "exeutive_name";
$mail_id   = isset($_POST['executive_mail']) ? $_POST['executive_mail'] : "executive_mail";
$photo_id   = isset($_POST['executive_photo']) ? $_POST['executive_photo'] : "executive_photo";

$query = " SELECT * FROM executive_details WHERE  mobile_no = '$phone_id' ";

$result =mysqli_query($link,$query);
if($result)
{
$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
$mobile_no = $row['mobile_no'];
$new_executive_id =  $name_id.$phone_id;
 
//echo $row['mobile_no'] ;

if(strcmp($mobile_no,$phone_id)== 0)
{
	$query = "UPDATE executive_details
			SET executive_id = '$new_executive_id', executive_name = '$name_id', executive_mail = '$mail_id', executive_photo = '$photo_id'
			WHERE mobile_no = '$mobile_no'";

	$query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
		echo 'NOT_UPDATED';
}
else
    echo "NOK";
}
else
{
  echo mysql_error;
}

?>
