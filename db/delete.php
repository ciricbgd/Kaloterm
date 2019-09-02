<?php session_start();
include('../db/konekcija.inc');
echo $_REQUEST['lokacija'].'<br>'.$_REQUEST['id'];
$delete_query="DELETE FROM ".$_REQUEST['lokacija']." WHERE id=".$_REQUEST['id'].";";
$delete=mysqli_query($konekcija, $delete_query);
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>