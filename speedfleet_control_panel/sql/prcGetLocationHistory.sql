DELIMITER $$
CREATE DEFINER=`tracker_root`@`localhost` PROCEDURE `prcGetLocationHistory`(IN `_sessionID` VARCHAR(50), IN `_phoneNumber` VARCHAR(50))
BEGIN
  SELECT
  CONCAT('{ "latitude":"', CAST(latitude AS CHAR),'", "longitude":"', CAST(longitude AS CHAR), '" , "lastupdate":"', CAST(gpsTime AS CHAR), '" }') json
  FROM gpslocations
  WHERE sessionID = _sessionID
  AND phoneNumber = _phoneNumber
  ORDER BY lastupdate;
END$$
DELIMITER ;