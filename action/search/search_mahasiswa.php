<?php
//isikan dengan query select data
include "../koneksi.php";
$output = '';
$src_edit = 'edit_mahasiswa.php';
$src_hapus = 'action/hapus_mahasiswa.php';
if(isset($_POST["query"])) {
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
		  SELECT * FROM mahasiswa 
		  WHERE nama LIKE '%".$search."%'
		  OR nim LIKE '%".$search."%' 
		  OR alamat LIKE '%".$search."%' 
		  OR id_dosen LIKE '%".$search."%' 
		  OR jeniskelamin LIKE '%".$search."%'
		  OR id LIKE '%".$search."%'
	";
} else {
	$query = "SELECT * FROM mahasiswa ORDER BY id";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>'.$row["id"].'</td>
			    <td>'.$row["nim"].'</td>
			    <td>'.$row["nama"].'</td>
			    <td>'.$row["alamat"].'</td>
			    <td>'.$row["jeniskelamin"].'</td>
			    <td>'.$row["id_dosen"].'</td>
			    <td>
			    	<a href="'.$src_edit.'?id='.$row['id'].'" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>Edit
                    </a>
                    <a href="'.$src_hapus.'?id='.$row['id'].'" class="btn btn-danger">
                        <span class="glyphicon glyphicon-remove-sign">Delete
                    </a>
			    </td>
		    </tr>
		';
    }
    echo $output;
} else {
	echo 'Data Not Found';
}

?>