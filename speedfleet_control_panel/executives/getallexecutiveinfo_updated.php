<?php
$method = $_SERVER['REQUEST_METHOD'];
$request = explode('/list', trim($_SERVER['PATH_Documents'],'/list'));




          include 'unified_dbconnect.php';



$query    = "SELECT * FROM executive_details";
$query_run= mysqli_query($link,$query);
$rows     = mysqli_num_rows($query_run);
$arr      =array();
if($query_run)
{
	if($rows>0)
	{
         
        while($result=mysqli_fetch_array($query_run, MYSQLI_ASSOC))
        {
        	$foo = new stdClass();
        	$foo->id            =     $result['id'];
            $foo->executive_id     =     $result['executive_id'];
            $foo->manager_id   =     $result['manager_id'];
            $foo->executive_name          =     $result['executive_name'];
            $foo->executive_mail          =     $result['executive_mail'];
            $foo->mobile_no     =     $result['mobile_no'];
            $foo->driving_licence_no   =     $result['driving_licence_no'];
            $foo->vehicle_no    =     $result['vehicle_no'];
            $foo->id_proof_no      =     $result['id_proof_no'];
            $foo->id_proof_type      =     $result['id_proof_type'];
            $foo->address_proof_no =     $result['address_proof_no'];
            $foo->address_proof_type =     $result['address_proof_type'];
            $foo->executive_photo       =     $result['executive_photo'];
			$foo->executive_token       =     $result['executive_token'];
			$foo->extra_info       =     $result['extra_info'];
        

           array_push($arr, $foo);

        } 

        $data=json_encode($arr);
        echo $data;

    }
	else
	  echo  "No_driver";
}
else
{
echo mysqli_connect_error;
}

?>