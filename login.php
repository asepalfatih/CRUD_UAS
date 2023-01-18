<?php
//mengambil modul fungsi dgn cara require atau include
require ('function.php');

$conn = mysqli_connect("localhost", "root", "", "user");

//cek apakah tombol submit 
if( isset($conn,$_POST["login"])){

    $username= $_POST["username"] ;
    $password= $_POST["password"];

    //cek ambl data
    $result= mysqli_query($conn,"SELECT * FROM users WHERE username='$username'");

    if(mysqli_num_rows($result) === 1){
        //cek pw
        $row=mysqli_fetch_assoc($result);
        if(password_verify($password,$row["password"])){
            // header("Location : index.php");
            echo "<script>
            document.location.href='index.php';
            </script>";
            exit;
        }
    }

    $error = true;
    if($password !== $password2){
        echo"<script>
        alert('konfirmasi password tidak sesuai!');
        document.location.href='login.php';
        </script>";
        return false;
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <?php if (isset($error)) : ?>
        <p style="color: red; font-style: italic">Username/Password Salah</p>
        <?php endif; ?>
    <style>
        label {
            display : block;
        }
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
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Halaman Login</h1>
        <form action="" method="post">
        <div class="kotak-login">
            <label for="username" class="form-label">User Nama :</label>
            <input class="form-control" type="text" name="username" id="username">
            <label for="password">Password :</label>
            <input class="form-control" type="password" name="password" id="password">
            <br>
            <button type="submit" class="btn btn-warning" name="login">Login</button>
        </div>        
        </form>
    </div>
    
</body>
</html>