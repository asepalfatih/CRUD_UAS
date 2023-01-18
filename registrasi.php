<?php
//mengambil modul fungsi dgn cara require atau include
require ('functions.php');
// require('function.php');



//cek apakah tombol submit 
if( isset($_POST["register"])){

    if(registrasi($_POST)>0){
        echo "
        <script>
        alert('User Baru Berhasil Ditambahkan');
        document.location.href='login.php';
        </script>
        ";
    }else{
        echo"
        <script>
        alert('User Baru Gagal Ditambahkan!');
        document.location.href='registrasi.php';
        </script>
        ";
        echo mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Regristasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background: #FFF6BD;
        }

        label {
            display : block;
        }

        h1{
            text-align:center;
        }
        .kotak-login{
            width: 350px;
            background: white;
            /*meletakkan form ke tengah*/
            margin: 80px auto;
            padding: 30px 20px;
        }

    </style>
</head>
<body>
    <div class = "container">
    <h1>Halaman Regristasi</h1>
        <form action="" method="post">
            <div class="kotak-login">
            <label for="username" class="form-label">User Nama :</label>
            <input class="form-control" type="text" name="username" id="username">
            <label for="password" class="form-label">Password :</label>
            <input class="form-control" type="password" name="password" id="password">
            <label for="password2" class="form-label">Konnfirmasi Password :</label>
            <input class="form-control" type="password" name="password2" id="password2">
            <br>
            <button class="btn btn-warning" type="submit" name="register">Regristasi</button>
            </div>
        </form>    
    </div>
</body>
</html>