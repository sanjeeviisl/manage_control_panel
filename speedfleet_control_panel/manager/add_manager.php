<?php
	/*include 'connect_updated.php'; */
        include 'unified_dbconnect.php';
	
	
	$manager_id        =isset($_GET['manager_id']) ? $_GET['manager_id'] : 'sanajyid';
	$manager_name         =isset($_GET['manager_name']) ? $_GET['manager_name'] : 'sanjay';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 8800213260;
	$manager_email         =isset($_GET['manager_email']) ? $_GET['manager_email'] :'xxxxxx@gamil.com';
	$company_name         =isset($_GET['company_name']) ? $_GET['company_name'] :'intime information';
	$payment_type        =isset($_GET['payment_type']) ? $_GET['payment_type'] :'card';
	$payment_status        =isset($_GET['payment_status']) ? $_GET['payment_status'] :'yes';
	$subscription_type       =isset($_GET['subscription_type']) ? $_GET['subscription_type'] : 'monthly';
	$subscription_status    =isset($_GET['subscription_status']) ? $_GET['subscription_status'] : 'active';
	
	if($mobile_no == 1234567890) return;

	$query = "INSERT INTO executive_manager_details( manager_id,manager_name, mobile_no,manager_email, company_name,payment_type, payment_status,subscription_type,
	subscription_status	)
	VALUES (  '$manager_id','$manager_name', '$mobile_no','$manager_email','$company_name','$payment_type','$payment_status', '$subscription_type',
	'$subscription_status')";
    $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

