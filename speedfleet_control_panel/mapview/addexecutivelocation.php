<?php
	include 'unified_dbconnect.php';
	date_default_timezone_set('Asia/Kolkata');
        
        $device_id          =isset($_GET['device_id']) ? $_GET['device_id'] : 'devid1';
	$executive_id          =isset($_GET['executive_id']) ? $_GET['executive_id'] : 'exeid1';
	$manager_id        =isset($_GET['manager_id']) ? $_GET['manager_id'] : 'manid2';
	$lastUpdate         =date('Y-m-d H:i:s');
	$latitude          =isset($_GET['latitude']) ? $_GET['latitude'] : 0.0;
	$longitude         =isset($_GET['longitude']) ? $_GET['longitude'] : 0.0;
	$utctime_stamp          =isset($_GET['utctime_stamp']) ? $_GET['utctime_stamp'] : "time ";
	$utcdate_stamp         =isset($_GET['utcdate_stamp']) ? $_GET['utcdate_stamp'] : "date";
        
        $speed          =isset($_GET['speed']) ? $_GET['speed'] : '00000';
	 $direction         =isset($_GET['direction']) ? $_GET['direction'] : '00000';


	if($latitude == 123456789) return;

	$query = "INSERT INTO history_gps_tracker(device_id,executive_id,manager_id,lastUpdate,latitude,longitude,
        utctime_stamp,utcdate_stamp,speed ,direction)
	VALUES  ('$device_id','$executive_id','$manager_id','$lastUpdate','$latitude','$longitude',
        '$utctime_stamp','$utcdate_stamp','$speed ','$direction')";
   
     $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';
    else
      echo mysql_error;

?>

