<!DOCTYPE html>

<html lang="en">

<head>
    <title>Praktikum SBD Modul 2</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css" />
    <link href="../assets/css/font-awesome.css" rel="stylesheet" />
    <link href="../assets/css/custom.css" rel="stylesheet" />
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script type='javascript' src="../assets/js/bootstrap.min.js"></script>
</head>

<body style="background-color : #fafafa;"> <br><br>
    <header class="main-header">
        <center>
            <h1 class="blog-title">CRUD Sederhana dengan PHP dan MYSQL</h1>
        </center>
        <center>
            <h4 class="blog-title">Praktikum Sistem Basis Data 2019</h4>
            <form method="POST" action="../search.php" class="form-horizontal">
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
            <a href="../index.php">home</a>
            <a href="../action/logout.php" title="">logout</a>
        </center>
    </header><br><br>
    <!-- Membuat navbar di sebelah kirihalaman -->
    <div class="col-md-2" align="left">
        <ul class="nav" id="main-menu">
            <br>
            <li>
                <a class="active-menu" href="../mahasiswa.php"><i class="fa	fa-user	fa-2x"></i>Mahasiswa</a>
            </li>
            <li>
                <a href="../dosen.php"><i class="fa fa-user fa-2x"></i>Dosen</a>
            </li>
        </ul>
    </div>
    <div class="container col-md-10">
        <div class="row">
            <div class="col-md-12">
                <table class="tabletable-striped table-bordered">
                    <thead>
                        <!-- Judul kolom -->
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nama Dosen</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!--  fungsi  select  padaphp taruh disini-->
                        <?php
                        include "../action/koneksi.php";
                        $query = "
                        select mahasiswa.nama AS name, mahasiswa.nim, dosen.nama , mahasiswa.id
                        from mahasiswa join dosen ON mahasiswa.id_dosen = dosen.id_dosen
                        ";
                        $result = mysqli_query($connect, $query) or die(mysqli_error($connect));
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <tr>
                                <td><?php echo $row['nim']; ?></td>
                                <td><?php echo $row['name']; ?></td>
                                <td><?php echo $row['nama']; ?></td>
                                <td><a href='../edit_mahasiswa.php?id=<?php echo $row['id'] ?>' class='btn btn-success'>
                                    <span class='glyphicon glyphicon-edit'></span>Edit</button></a>
                                    <a href='../action/hapus_mahasiswa.php?id=<?php echo $row['id'] ?>' class='btn btn-danger'>
                                    <span class='glyphicon glyphicon-remove-sign'>Delete</button></a></td>
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