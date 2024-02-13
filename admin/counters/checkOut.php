<?php
include '../../includes/dbconn.php';
//total number of the checked out visitors
$sql = "SELECT * FROM `tblvisitorlog` WHERE `status` = '1' AND CheckingOutTime > CURRENT_DATE";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$checkOut = $query->rowCount();

echo htmlentities($checkOut);

?>