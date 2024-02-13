<?php
include '../../includes/dbconn.php';

$sql = "SELECT * FROM `tblvisitors` ";
$query = $dbh->prepare($sql);
$query->execute();
$results = $query->fetchAll(PDO::FETCH_OBJ);
$totalVisitors = $query->rowCount();

echo htmlentities($totalVisitors);

?>