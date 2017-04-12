<?php
	/*include 'connect_updated.php'; */

          include 'unified_dbconnect.php';
	
	$executive_id          =isset($_GET['executive_id']) ? $_GET['executive_id'] : '123qwer';
	$manager_id        =isset($_GET['manager_id']) ? $_GET['manager_id'] : '146euwy';
	$executive_name         =isset($_GET['executive_name']) ? $_GET['executive_name'] : 'naman';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : 12345678;
	$driving_licence_no         =isset($_GET['driving_licence_no']) ? $_GET['driving_licence_no'] :'';
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
	$id_proof_no         =isset($_GET['id_proof_no']) ? $_GET['id_proof_no'] :'';
	$address_proof_no         =isset($_GET['address_proof_no']) ? $_GET['address_proof_no'] :'';
	$executive_mail        =isset($_GET['executive_mail']) ? $_GET['executive_mail'] : 'abc@gmail.com';
	$id_proof_type            =isset($_GET['id_proof_type']) ? $_GET['id_proof_type'] : '';
	$address_proof_type        =isset($_GET['address_proof_type']) ? $_GET['address_proof_type'] : '';
	$executive_photo        =isset($_GET['executive_photo']) ? $_GET['executive_photo'] : '';
        $executive_token        =isset($_GET['executive_token']) ? $_GET['executive_token'] : '';
        $extra_info        =isset($_GET['extra_info']) ? $_GET['extra_info'] : '';


	
	if($mobile_no == 123456789) return;

	$query = "INSERT INTO executive_details(executive_id, manager_id,executive_name, mobile_no,driving_licence_no, vehicle_no,id_proof_no, address_proof_no,executive_mail,id_proof_type,address_proof_type,executive_photo ,executive_token)
	VALUES ('$executive_id','$manager_id','$executive_name','$mobile_no','$driving_licence_no','$vehicle_no','$id_proof_no','$address_proof_no', '$executive_mail','$id_proof_type', '$address_proof_type','$executive_photo','$executive_token')";
    $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

