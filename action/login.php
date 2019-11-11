<?php

require_once("koneksi.php");

if( isset($_POST['login']) ) {
    $username   = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password   = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $query = mysqli_query($connect, "SELECT * FROM users WHERE username='$username' OR email='$username'");
    $user = mysqli_fetch_array($query);
    
    if($user){
        
        // verifikasi password
        if($password == $user["password"]){
            // buat Session
            session_start();
            $_SESSION["user"] = $user;
            // login sukses, alihkan ke halaman timeline
            header("Location: ../homepage.php");
        } else {
        	header("Location: ../index.php");
        }
    } else {
    	header("Location: ../index.php");
    }


}

?>