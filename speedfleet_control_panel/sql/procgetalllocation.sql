/*!50003 SET character_set_client  = utf8 */ ;
/*!50003 SET character_set_results = utf8 */ ;
/*!50003 SET collation_connection  = utf8_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = '' */ ;
DELIMITER ;;

CREATE DEFINER=`tracker_root`@`localhost` PROCEDURE `prcGetAllLocation_updated`()
BEGIN
  CREATE TEMPORARY TABLE tempRoutes (
    sessionID VARCHAR(50),
    phoneNumber VARCHAR(50),
    latitude decimal(10,7),
	longitude decimal(10,7),
	locationMethod VARCHAR(50),
    eventType VARCHAR(50))
	
  ENGINE = MEMORY;

  INSERT INTO tempRoutes (sessionID, phoneNumber)
  SELECT DISTINCT sessionID, phoneNumber
  FROM gpslocations;

  UPDATE tempRoutes tr
  SET latitude = (SELECT latitude FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.phoneNumber = tr.phoneNumber  ORDER BY GPSLocationID  DESC LIMIT 1 );

  UPDATE tempRoutes tr
  SET longitude = (SELECT longitude FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.phoneNumber = tr.phoneNumber  ORDER BY GPSLocationID  DESC LIMIT 1 );

  UPDATE tempRoutes tr
  SET eventType = (SELECT eventType FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.phoneNumber = tr.phoneNumber  ORDER BY GPSLocationID  DESC LIMIT 1 );
  

  UPDATE tempRoutes tr
  SET locationMethod = (SELECT locationMethod FROM gpslocations gl
  WHERE gl.sessionID = tr.sessionID
  AND gl.phoneNumber = tr.phoneNumber  ORDER BY GPSLocationID  DESC LIMIT 1 );
  

  SELECT
  CONCAT('{ "sessionID": "', CAST(sessionID AS CHAR),  '", "phoneNumber": "', CAST(phoneNumber AS CHAR),  '","latitude": "', CAST(latitude AS CHAR),  '","longitude": "', CAST(longitude AS CHAR),  '","eventType": "', CAST(eventType AS CHAR),  '" ,"locationMethod": "', CAST(locationMethod AS CHAR),  '" }') json
  FROM tempRoutes
  ORDER BY sessionID;

  DROP TABLE tempRoutes;
END ;;

DELIMITER ;;