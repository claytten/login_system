<?php require_once("action/auth.php") ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Praktikum SBD Modul 4</title>
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
                <a href="mahasiswa.php"><i class="fa fa-user fa-2x"></i>Mahasiswa</a>
            </li>
            <li>
                <a class="active-menu" href="dosen.php"><i class="fa	fa-user	fa-2x"></i>Dosen</a>
            </li>
        </ul>
    </div>
    <div class="container col-md-10">
        <p><a href='tambah_dosen.php'><button type='button' class='btn	btn-primary'><span class='glyphiconglyphicon-plus-sign'></span> Add Dosen</button></a></p>
        <div class="form-group">
            <label class="col-sm-1 control-label">Search</label>
            <div class="col-sm-5">
                <input placeholder="type here" type="text" class="form-control" name='search_dosen' id="search_dosen">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="tabletable-striped table-bordered">
                    <thead>
                        <!-- Judul kolom -->
                        <tr>
                            <th>NIDN</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>Email</th>
                            <th>Opsi</th>
                        </tr>
                    </thead>
                    <tbody id="dsn">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    
    function load_data(query){
      $.ajax({
       url:"action/search/search_dosen.php",
       method:"POST",
       data:{query:query},
       success:function(data)
       {
        $('#dsn').html(data);
       }
      });
    }
    load_data();
   $("#search_dosen").keyup(function() {
       var search = $(this).val();
       console.log(search);
       if (search != '') {
           load_data(search);
       }
       else {
           load_data();
       }
   });
});
</script>
</body>

</html>