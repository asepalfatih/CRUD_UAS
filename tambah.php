<?php
//memanggil modul fungsi dgn cara require atau include
require ('function.php');

    //cek apakah tombol submit sudah ditekan apa belum
    if( isset($_POST["submit"])){

        //menjalankan fungsi tambah sekalian cek return sukses tambah atau tidak
        if(tambah($_POST)>0){
            echo "
            <script>
            alert('Data Berhasil Ditambahkan');
            document.location.href='index.php';
            </script>
            ";
        }else{
        echo "
            <script>
            alert('Data Gagal Ditambahkan!');
            document.location.href='index.php';   
            </script>
            ";
            // echo mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
        body{
            background: #FFF6BD;
        }
        .kotak-login{
            width: 350px;
            background: white;
            /*meletakkan form ke tengah*/
            margin: 80px auto;
            padding: 30px 20px;
        }

        h1{
            text-align: center;
        }

        .btn{
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
    <div class="kotak-login">
        <label for="nim" class="form-label">NIM :</label>
        <input type="text" class="form-control" name="NIM" required>        
        
        <label for="nama" class="form-label">Nama :</label>
        <input type="text" class="form-control" name="Nama" id="Nama">
        
        
        <label for="email" class="form-label">Kelas :</label>
        <input type="text" class="form-control" name="Kelas" id="Kelas">
        
        
        <label for="Usia" class="form-label">Usia :</label>
        <input type="text" class="form-control" name="Usia" id="Usia">
        
        <button type="submit" class="btn btn-warning" name="submit">Tambah Data</button>
    </div>
    </form>
    </div>
    
</body>
</html>