<?php
$dbhost = "localhost";
$dbuser = "zerocool";
//ini berlaku di xampp
$dbpass = 'Gordon_1';
//ini berlaku di xampp
$dbname = "modul2_kel04";
$connect = new mysqli($dbhost, $dbuser, $dbpass, $dbname);

if($connect->connect_error) {
	die('maaf koneksi gagal: '. $connect->connect_error);
}
?>
