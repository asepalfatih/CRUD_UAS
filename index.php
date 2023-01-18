<?php
    require ('function.php');
    $mahasiswa=query("SELECT * FROM data_mahasiswa");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  </head>

    <style>
        body{
            background: #FFF6BD;
        }
        h1{
            color: #0A2647;
            text-align:center;
            margin-top: 30px;
            
        }
    </style>
</head>
<body>
    <div class = "container">
    <h1> Daftar Mahasiswa</h1>
        <style>
            @media print{
                .tambah,.aksi{
                    display: none;
                }
            }
        </style>
    <a type="button" class="btn btn-warning" href="tambah.php" class="tambah">Tambah Data Mahasiwa</a> | <a type="button" class="btn btn-warning" href="cetak.php">Cetak</a>
    <br><br>
    <table class="table table-striped" border="1" cellpadding="10" cellspacing="0">
        <tr class="table-dark">
            <th scope="col">No.</th>
            <th scope="col">NIM</th>
            <th scope="col">Nama</th>
            <th scope="col">Kelas</th>
            <th scope="col">Usia</th>
            <th class="aksi" scope="col">Aksi</th>
            
        </tr>

        <?php $i = 1; ?>
        <?php foreach( $mahasiswa as $mhs): ?>
        <tr>
            <td><?= $i; ?></td>
            <td><?= $mhs["NIM"]; ?></td>
            <td><?= $mhs["Nama"]; ?></td>
            <td><?= $mhs["Kelas"]; ?></td>
            <td><?= $mhs["Usia"]; ?></td>
            <td class="aksi">
                <a class="btn btn-primary" href="ubah.php?NIM=<?= $mhs["NIM"]; ?>">Ubah</a>
                <a class="btn btn-success" href="hapus.php?NIM=<?= $mhs["NIM"]; ?>"
                onclick="return confirm('Apakah Anda yakin Menghapus Data Ini...?');">Hapus</a> 
            
            </td>
        </tr>
        <?php $i++; ?>
        <?php endforeach; ?>

    </table>
    
    </div>
</body>
</html>