<?php
    include 'unified_dbconnect.php';
    
    $sessionid   = isset($_GET['sessionid']) ? $_GET['sessionid'] : '2017-03-18';
    $phoneNumber = isset($_GET['phoneNumber']) ? $_GET['phoneNumber'] : '8800213261';

    $stmt = $pdo->prepare('CALL prcGetLocationHistory(:sessionID,:phoneNumber)');     
	
    $stmt->execute(array(':sessionID' => $sessionid , ':phoneNumber' => $phoneNumber ));
    
    $json = '{ "locations": [';

    foreach ($stmt as $row) {
        $json .= $row['json'];
        $json .= ',';
    }

    $json = rtrim($json, ",");
    $json .= '] }';

    header('Content-Type: application/json');
    echo $json;

?>