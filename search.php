<?php require_once("action/auth.php") ?>
<!DOCTYPE html>

<html lang="en">

<head>
    <title>Praktikum SBD Modul 2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
    <link href="assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type='javascript' src="assets/js/bootstrap.min.js"></script>
</head>

<body style="background-color : #fafafa;"> <br><br>
    <header class="main-header">
        <center>
            <h1 class="blog-title">CRUD Sederhana dengan PHP dan MYSQL</h1>
        </center>
        <center>
            <h4 class="blog-title">Praktikum Sistem Basis Data 2019</h4>
            <form method="POST" action="search.php" class="form-horizontal">
                <div class="form-group" style="margin-left: 20%">
                    <label class="col-sm-2 control-label">Full Search</label>
                    <div class="col-sm-5">
                        <input placeholder="type here" type="text" class="form-control" name='search'>
                    </div>
                    <div class="col-sm-1">
                        <button type='submit' name='submit' class='btn btn-primary'>Submit</button>
                    </div>
                </div>
            </form>
            <a href="index.php">home</a>
            <a href="action/logout.php" title="">logout</a>
        </center>
    </header><br><br>
    <!-- Membuat navbar di sebelah kirihalaman -->
    <div class="col-md-2" align="left">
        <ul class="nav" id="main-menu">
            <br>
            <li>
                <a href="mahasiswa.php"><i class="fa    fa-user fa-2x"></i>Mahasiswa</a>
            </li>
            <li>
                <a href="dosen.php"><i class="fa fa-user fa-2x"></i>Dosen</a>
            </li>
        </ul>
    </div>
    <div class="container col-md-10" align="center" style="margin-left: -8%">
        <div class="row">
            <div class="col-md-12">
                <table class="tabletable-striped table-bordered">
                    <thead>
                        <!-- Judul kolom -->
                        <tr>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Id Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        //isikan dengan query select data
                        include "action/koneksi.php";
                        $search = $_POST['search'];
                        $query = mysqli_query($connect, " (select nama,alamat,id_dosen from mahasiswa 
                                                            WHERE nama LIKE '%$search%'
                                                            OR alamat LIKE '%$search%'
                                                            OR id_dosen LIKE '%$search%'
                                                          ) UNION 
                                                          (select nama,alamat,id_dosen from dosen 
                                                            WHERE nama LIKE '%$search%'
                                                            OR alamat LIKE '%$search%'
                                                            OR id_dosen LIKE '%$search%'
                                                          )
                                                        ") 
                                 or die(mysqli_error($connect));
                            while ($res = mysqli_fetch_array($query)) {
                            $nama = $res['nama'];
                            $alamat = $res['alamat'];
                            $id_dosen = $res['id_dosen'];
                            ?>
                            <tr>
                                <td><?php echo $nama ?></td>
                                <td><?php echo $alamat ?></td>
                                <td><?php echo $id_dosen ?></td>
                                
                            </tr>
                            <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>