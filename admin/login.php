<?php
session_start();

if (isset($_SESSION['login'])) {
    header('location:index');
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Login</title>

    <!-- Custom fonts for this template-->
    <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../assets/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <!-- Nested Row within Card Body -->

                <div class="col-lg-12">
                    <div class="p-5">
                        <div class="text-center">
                            <h1 class="h4 text-gray-900 mb-4">Selamat Datang</h1>
                            <span>Username : admin</span><br>
                            <span>Password : admin</span>
                        </div>
                        <form class="user" action="" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Username" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="exampleInputPassword" placeholder="Password" name="password" id="password">
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block" name="login" value="Login">
                                Login
                            </button>
                        </form>
                        <?php
                        include '../config/koneksi.php';
                        if (isset($_POST['login']) && $_POST['login'] == "Login") {

                            $username = mysqli_escape_string($conn, ($_POST['username']));
                            $pass     = mysqli_escape_string($conn, (MD5($_POST['password'])));

                            $login = mysqli_query($conn, "SELECT * FROM tb_admin WHERE username = '$username' AND password='$pass'");
                            $row = mysqli_fetch_assoc($login);

                            if (mysqli_num_rows($login) > 0) {

                                $_SESSION['id_admin'] = $row['id_admin'];
                                $_SESSION['nama_admin'] = $row['nama_admin'];
                                $_SESSION['login'] = true;
                                echo "<script>alert('Berhasil Masuk');document.location='index'</script>";
                            } else {
                                $error = "Maaf, Nama Pengguna Atau Kata Sandi Salah !!";
                                echo "<script>alert('$error');document.location='login'</script>";
                            }
                        }
                        ?>
                        <hr>
                    </div>
                </div>
            </div>

        </div>

    </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../assets/vendor/jquery/jquery.min.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.min.js"></script>

</body>

</html>