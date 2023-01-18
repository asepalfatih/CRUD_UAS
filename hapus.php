<?php
    require ('function.php');

    $nim=$_GET["NIM"];

    $hapus = mysqli_query($conn, "DELETE FROM data_mahasiswa WHERE NIM = '$_POST[NIM]'");
    

    //cek apakah tombol submit sudah ditekan atau belum
        if (hapus($nim)>0) {
            echo "
                <script>
                alert('Data Berhasil Dihapus');
                document.location.href='index.php';
                </script>
                ";
        } else {
            echo "
                <script>
                alert('Data Gagal Dihapus!');
                document.location.href='index.php';
                </script>
                ";
            echo mysqli_error($conn);
        }
?>