<?php
	/*include 'connect_updated.php'; */

          include 'unified_dbconnect.php';

	$executive_id          =isset($_GET['executive_id']) ? $_GET['executive_id'] : 'dgggwwthgg4577899866';
	$executive_name         =isset($_GET['executive_name']) ? $_GET['executive_name'] : 'naman';
	$mobile_no          =isset($_GET['mobile_no']) ? $_GET['mobile_no'] : '12345678';
	$driving_licence_no         =isset($_GET['driving_licence_no']) ? $_GET['driving_licence_no'] :'';
	$vehicle_no         =isset($_GET['vehicle_no']) ? $_GET['vehicle_no'] :'UP-01 6787';
	$id_proof_no         =isset($_GET['id_proof_no']) ? $_GET['id_proof_no'] :'';
	$address_proof_no         =isset($_GET['address_proof_no']) ? $_GET['address_proof_no'] :'';
	$executive_mail        =isset($_GET['executive_mail']) ? $_GET['executive_mail'] : 'abc@gmail.com';
	$id_proof_type            =isset($_GET['id_proof_type']) ? $_GET['id_proof_type'] : '';
	$address_proof_type        =isset($_GET['address_proof_type']) ? $_GET['address_proof_type'] : '';



	$query = "DELETE FROM executive_details
			WHERE executive_id = '$executive_id'";


	$query_run = mysqli_query($link,$query);
	
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

