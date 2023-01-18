<?php
    //Konek ke Dtbase
    $conn=mysqli_connect("localhost","root","","db_kampus");
    

    function query($sql){
        global $conn;
        //ambil data dari tabel mhs/ query data
        $result=mysqli_query($conn,$sql);
        $rows=[];

        if(!$result){
        echo mysqli_error($conn);
        }

    //ambil data mhs dari object Result
    //mysqli_fetch_row() // mengambil array numerik
    //mysqli_fetch_assoc() // mengambil array asosiatif
    //mysqli_fetch_array() // mengambalikan array keduanya
    //mysqli_fetch_onject // mengembalikan array assosiative
    while ($row=mysqli_fetch_assoc($result)) {
        $rows[]=$row;
    }
    return $rows;
    }

    function tambah($data){
        global $conn;
            // ambil data dari tiap elemen dalam form
            $NIM= htmlspecialchars($data["NIM"]) ;
            $Nama= $data["Nama"] ;
            $Kelas= $data["Kelas"] ;
            $Usia= $data["Usia"] ;
            
            //Query insert data
            $sql="INSERT INTO data_mahasiswa(NIM,Nama,Kelas,Usia)
            VALUES
            ('$NIM','$Nama','$Kelas','$Usia')";

        mysqli_query($conn,$sql);

        return mysqli_affected_rows($conn);
    }

    function hapus($nim){
        global $conn;

        $sql= "DELETE FROM data_mahasiswa WHERE NIM='$nim'";
     
        mysqli_query($conn,$sql);

        return mysqli_affected_rows($conn);
    }

