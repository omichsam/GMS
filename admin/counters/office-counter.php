<?php
include '../../includes/dbconn.php';

$sql = "SELECT * FROM `tbloffice`";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$leavtypcount = $query->rowCount();

echo htmlentities($leavtypcount);

?>