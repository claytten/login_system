<?php
include "koneksi.php";
$id = $_GET['id'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$jk = $_POST['jk'];
$doswal = $_POST['doswal'];
$query = mysqli_query($connect, "update mahasiswa set 
	nim='$nim',
	nama='$nama',
	alamat='$alamat',
	jeniskelamin='$jk',
	id_dosen='$doswal'
	where id='$id'
") or die(mysqli_error($connect));
if($query) {
        header('location:../mahasiswa.php');
} else {
        echo mysqli_error($connect);
}
?>

