<?php
//mengambil modul fungsi dengn cara require include
require ('function.php');

//ambil data dari url
$nim=$_GET["NIM"];
//ambil data Mahasiswa
$mhs=query("SELECT * FROM data_mahasiswa WHERE NIM='$nim'")[0];

    //cek apakah tombol submit sudah ditekan atau belum
    if( isset($_POST["submit"])){

    $ubah = mysqli_query($conn, "UPDATE data_mahasiswa SET 
                                                                NIM = '$_POST[NIM]',
                                                                Nama = '$_POST[Nama]',
                                                                Kelas = '$_POST[Kelas]',
                                                                Usia = '$_POST[Usia]'
                                                                WHERE NIM = '$_POST[NIM]'
                                                                ");

        //menjalankan fungsi ubah sekalian cek return sukses Ubah atau Tidak
        if($ubah) {
            echo "<script>
            alert('Data Berhasil Diubah');
            document.location.href='index.php';
            </script>";
        }else{
            echo "<script>
            alert('Data Gagal Diubah');
            document.location.href='index.php';
            </script>";
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
    <title>Ubah Data Mahasiswa</title>
</head>
<body>
    <h1>Ubah Data Mahasiswa</h1>
    <ul>
        <form action="" method="post">
            <li>
                <label for="NIM">NIM :</label>
                <input type="text" name="NIM" id="NIM" require accesskey value="<?=$mhs["NIM"]; ?>">
            </li>
            <li>
                <label for="Nama">Nama :</label>
                <input type="text" name="Nama" id="Nama" value="<?php echo $mhs["Nama"]; ?>">
            </li>
            <li>
                <label for="Kelas">Kelas :</label>
                <input type="text" name="Kelas" id="Kelas" value="<?php echo $mhs["Kelas"]; ?>">
            </li>
            <li>
                <label for="Usia">Usia :</label>
                <input type="text" name="Usia" id="Usia" value="<?php echo $mhs["Usia"]; ?>">
            </li>
            <li><button type="submit" name="submit">Ubah Data</button></li>
        </form>
    </ul>
    
</body>
</html>