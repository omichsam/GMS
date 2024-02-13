<?php
include '../../includes/dbconn.php';
//total number of the checked in visitors
$sql = "SELECT * FROM `tblvisitorlog` WHERE
--  `status` = '0' AND 
 CheckingInTime > CURRENT_DATE";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$checkIn = $query->rowCount();

echo htmlentities($checkIn);

?>