<?php

$conn = mysqli_connect("localhost","root","","user");
    function registrasi($data){
        global $conn;
                $username= strtolower(stripslashes($data["username"])) ;
                $password= mysqli_real_escape_string($conn,$data["password"]) ;
                $password2=mysqli_real_escape_string($conn,$data["password2"]) ;

                //cek username sudah ada apa belom
                $result= mysqli_query($conn,"SELECT username FROM users WHERE username='$username'");
                    if(mysqli_fetch_assoc($result)){
                        echo "<script>
                        alert('Username sudah terdaftar');
                        </script>";
                        return false;
                    }

                    //konfirmasi paasword
                    if( $password !== $password2){
                        echo "
                        <script>
                        alert('Password tidak sesuai');
                        </script>";
                        return false;
                    }

                    //enkripsi password
                    $password=password_hash($password,PASSWORD_DEFAULT);

                    //QUERY insert data
                    $sql="INSERT INTO users (username,password) VALUES ('$username','$password')";

                mysqli_query($conn,$sql);
                return mysqli_affected_rows($conn);
    }
?>