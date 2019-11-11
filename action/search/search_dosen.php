<?php
//isikan dengan query select data
include "../koneksi.php";
$output = '';
$src_edit = 'edit_dosen.php';
$src_hapus = 'action/hapus_dosen.php';
if(isset($_POST["query"])) {
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query = "
		  SELECT * FROM dosen 
		  WHERE nama LIKE '%".$search."%'
		  OR nidn LIKE '%".$search."%' 
		  OR nama LIKE '%".$search."%' 
		  OR alamat LIKE '%".$search."%' 
		  OR email LIKE '%".$search."%'
	";
} else {
	$query = "SELECT * FROM dosen ORDER BY id_dosen";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_array($result)) {
		$output .= '
			<tr>
				<td>'.$row["nidn"].'</td>
			    <td>'.$row["nama"].'</td>
			    <td>'.$row["alamat"].'</td>
			    <td>'.$row["email"].'</td>
			    <td>
			    	<a href="'.$src_edit.'?id='.$row['id_dosen'].'" class="btn btn-success">
                        <span class="glyphicon glyphicon-edit"></span>Edit
                    </a>
                    <a href="'.$src_hapus.'?id='.$row['id_dosen'].'" class="btn btn-danger">
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