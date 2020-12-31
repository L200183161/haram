<?php
// require "function.php";
session_start();
// if (isset($_SESSION['user'])) {
//     if ($_SESSION['user']['status'] == 'perv') {
//         header('Location: /index.php');
//     } elseif ($_SESSION['user']['status'] == 'tobat') {
//         header('Location: /error.php');
//     } else {
//         session_destroy();
//         echo "<script>alert('Access Denied!! Unauthorize Status User.');window.location='./';</script>";
//     }
//     exit;
// }
$koneksi = new mysqli("localhost", "root", "", "smarthr");
if ($koneksi->connect_errno) {
    echo die("Failed to connect to MySQL: " . $koneksi->connect_error);
}

function registration($data)
{
    $koneksi = new mysqli("localhost", "root", "", "smarthr");
    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($koneksi, $data["password"]);
    $password2 = mysqli_real_escape_string(
        $koneksi,
        $data["password2"]
    );
    $result = mysqli_query($koneksi, "SELECT username FROM users WHERE username = '$username'");

    if (mysqli_fetch_assoc($result)) {
        echo "<script>
				alert('username sudah terdaftar!')
		      </script>";
        return false;
    }

    if ($password !== $password2) {
        echo "<script>
				alert('konfirmasi password tidak sesuai!');
		      </script>";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);
    mysqli_query($koneksi, "INSERT INTO `users`(`username`, `password`, `role`) VALUES('$username', '$password', DEFAULT)");
    return mysqli_affected_rows($koneksi);
}

if (isset($_POST["registration"])) {
    if (registration($_POST) > 0) {
        echo "<script>
				alert('User SUCCESSFULLY added!'); window.location='login.php';
			  </script>";
    } else {
        echo mysqli_error($koneksi);
    }
} ?>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Daftar disini bor</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    <!-- Bootstrap core CSS -->
    <link href="https://getbootstrap.com/docs/5.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel="apple-touch-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
    <link rel="manifest" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/manifest.json">
    <link rel="mask-icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/safari-pinned-tab.svg" color="#7952b3">
    <link rel="icon" href="https://getbootstrap.com/docs/5.0/assets/img/favicons/favicon.ico">
    <meta name="theme-color" content="#7952b3">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="https://getbootstrap.com/docs/5.0/examples/sign-in/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin form-control">
        <form method='POST' action=''>
            <img class="mb-4" src="https://getbootstrap.com/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Daftar dulu bor</h1>
            <label for="inputUsername" class="visually-hidden">Username</label>
            <input name='username' id="inputUsername" class="form-control" placeholder="Username" required autofocus>
            <label for="inputPassword" class="visually-hidden">Password</label>
            <input name='password' type="password" id="inputPassword" class="form-control" placeholder="Password" required>
            <label for="inputPassword2" class="visually-hidden">Confirmation Password</label>
            <input name='password2' type="password" id="inputPassword2" class="form-control" placeholder="Confirmation Password" required>
            <button class="w-100 btn btn-lg btn-primary" type="submit" name="registration">Daftar</button>
        </form>
        <p class="bg-amber text-danger">Sudah Punya Akun?</p>
        <a class="w-100 btn btn-lg btn-light btn-outline-dark" name="login" href="login.php">Login</a>
        <p class="mt-5 mb-3 text-muted">&copy; 2017-2020</p>
    </main>

</body>

</html>