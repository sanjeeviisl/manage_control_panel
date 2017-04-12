<?php
    include 'unified_dbconnect.php';
    
    $latitude       = isset($_GET['latitude']) ? $_GET['latitude'] : '10';
    $latitude       = (float)str_replace(",", ".", $latitude); // to handle European locale decimals
    $longitude      = isset($_GET['longitude']) ? $_GET['longitude'] : '10';
    $longitude      = (float)str_replace(",", ".", $longitude);    
    $speed          = isset($_GET['speed']) ? $_GET['speed'] : 0;
    $direction      = isset($_GET['direction']) ? $_GET['direction'] : 0;
    $distance       = isset($_GET['distance']) ? $_GET['distance'] : '0';
    $distance       = (float)str_replace(",", ".", $distance);
    $date           = isset($_GET['date']) ? $_GET['date'] : '0000-00-00 00:00:00';
    $date           = urldecode($date);
    $locationmethod = isset($_GET['locationmethod']) ? $_GET['locationmethod'] : '';
    $locationmethod = urldecode($locationmethod);
    $username       = isset($_GET['username']) ? $_GET['username'] : 0;
	$usermail       = isset($_GET['usermail']) ? $_GET['usermail'] : 0;
	$usertype       = isset($_GET['usertype']) ? $_GET['usertype'] : 0;
    $phonenumber    = isset($_GET['phonenumber']) ? $_GET['phonenumber'] : '8235583058';
    $sessionid      = isset($_GET['sessionid']) ? $_GET['sessionid'] : 0;
    $accuracy       = isset($_GET['accuracy']) ? $_GET['accuracy'] : 0;
    $extrainfo      = isset($_GET['extrainfo']) ? $_GET['extrainfo'] : '';
    $eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$eventtype      = isset($_GET['eventtype']) ? $_GET['eventtype'] : '';
	$trackingType   = isset($_GET['trackingType']) ? $_GET['trackingType'] : '';
	$trackingState  = isset($_GET['trackingState']) ? $_GET['trackingState'] : '';
	$trackingField1 = isset($_GET['trackingField1']) ? $_GET['trackingField1'] : '';
	$trackingField2 = isset($_GET['trackingField2']) ? $_GET['trackingField2'] : '';
	$trackingField3 = isset($_GET['trackingField3']) ? $_GET['trackingField3'] : '';
    
    // doing some validation here
    if ($latitude == 0 && $longitude == 0) {
        exit('-1');
    }

	   $params1 = array(
                    ':phonenumber'       => $phonenumber
                );
				
    $params = array(':latitude'        => $latitude,
                    ':longitude'       => $longitude,
                    ':speed'           => $speed,
                    ':direction'       => $direction,
                    ':distance'        => $distance,
                    ':date'            => $date,
                    ':locationmethod'  => $locationmethod,
                    ':username'        => $username,
					':usermail'        => $usermail,
					':usertype'        => $usertype,
                    ':phonenumber'     => $phonenumber,
                    ':sessionid'       => $sessionid,
                    ':accuracy'        => $accuracy,
                    ':extrainfo'       => $extrainfo,
                    ':eventtype'       => $eventtype,
					':trackingType'       => $trackingType,
					':trackingState'       => $trackingState,
					':trackingField1'       => $trackingField1,
					':trackingField2'       => $trackingField2,
					':trackingField3'       => $trackingField3
                );

    switch ($dbType) {
        case DB_MYSQL:
            //$stmt = $pdo->prepare($sqlFunctionCallMethod.'prcDeleteUserByPhone_updated(:phonenumber)');     
            //$stmt->execute($params1);
            $stmt1 = $pdo->prepare( $sqlFunctionCallMethod.'prcSaveGPSLocation_updated(
                          :latitude, 
                          :longitude, 
                          :speed, 
                          :direction, 
                          :distance, 
                          :date, 
                          :locationmethod,
                          :username, 
						  :usermail, 
						  :usertype, 
                          :phonenumber, 
                          :sessionid, 
                          :accuracy, 
                          :extrainfo, 
                          :eventtype,
						  :trackingType,
						  :trackingState,
						  :trackingField1,
						  :trackingField2,
						  :trackingField3 );'
                      );
            break;

    }  
    $stmt1->execute($params);
    $timestamp = $stmt1->fetchColumn();

    $query = "INSERT INTO history_gps_tracker(device_id,latitude,longitude,speed ,direction)
	VALUES  ('$phonenumber','$latitude','$longitude','$speed ','$direction')";
   
     $query_run = mysqli_query($link,$query);
	if( $query_run)
      echo 'OK';

    echo $timestamp;    
?>
