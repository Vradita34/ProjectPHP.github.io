<?php
include_once('config.php');

// register
if (isset($_POST['register'])) {
  if (!(empty($_POST['fullname']) or empty($_POST['username']) or empty($_POST['email']))) {
    $query = "INSERT INTO users(fullname, username, email, password)
    VALUES ('" . $_POST['fullname'] . "', '" . $_POST['username'] . "', '" . $_POST['email'] . "','" . md5($_POST['password']) . "')";
    // var_dump($query);
    $exec = mysqli_query($conn, $query);
    echo
    "<script> 
      alert('anda telah melakukan registrasi');
      document.location.href = 'sign.php';
    </script>
    ";
  } else {
    echo
    "<script> 
    alert('anda gagal melakukan registrasi');
    document.location.href = 'sign.php';
  </script>
  ";
  }
}


// LOGIN
if (isset($_POST['login'])) {
  session_start();

  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  $result = mysqli_query($conn, $sql);
  if ($result->num_rows > 0) {
    $row = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $row['username'];
    echo
    "<script> 
      alert('anda berhasil login dengan akun $username');
      document.location.href = 'from.php';
    </script>
    ";
  } else {
    echo "<script>alert('Email atau password Anda salah. Silahkan coba lagi!')</script>";
  }
}

// // cek data masuk
// if( mysqli_affected_rows($conn) > 0) {
//   echo "<script>alert
//        anda telah berhasil registrasi !</script>";
//  echo header('location: index.php');
// } else {
//  echo "<script>alert
//        gagal registrasi!</script>";
// }


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="ASSETS/css/sign.css" />
  <title>Sign in & Sign up Form</title>
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">
        <form action="#" class="sign-in-form" method="POST">
          <h2 class="title">Sign in</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required />
          </div>
          <input type="submit" value="Login" class="btn solid" name="login" />
          <p class="social-text">Or Sign in with social platforms</p>
          <div class="social-media">
            <a href="#" class="social-icon">
              <i class="fab fa-facebook-f"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-twitter"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-google"></i>
            </a>
            <a href="#" class="social-icon">
              <i class="fab fa-linkedin-in"></i>
            </a>
          </div>
        </form>
        <form action="" class="sign-up-form" method="POST">
          <h2 class="title">Sign up</h2>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="fullname" name="fullname" required />
          </div>
          <div class="input-field">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required />
          </div>
          <div class="input-field">
            <i class="fas fa-envelope"></i>
            <input type="email" placeholder="Email" name="email" required />
          </div>
          <div class="input-field">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password"" required />
          </div>
          <input type="submit" value="register" class="btn solid" name="register" />
          <p class="social-text">Or Sign up with social platforms</p>
          <div class="social-media">
              <a href="#" class="social-icon">
                <i class="fab fa-facebook-f"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-google"></i>
              </a>
              <a href="#" class="social-icon">
                <i class="fab fa-linkedin-in"></i>
              </a>
            </div>
        </form>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>Daftar disini ?</h3>
          <p>
            Selamat datang di web data mahasiswa
          </p>
          <button class="btn transparent" id="sign-up-btn">
            Sign up
          </button>
        </div>
        <img src="ASSETS/img/log.svg" class="image" alt="" />
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>Login disini ?</h3>
          <p>
            silahkan isi data dengan benar !
          </p>
          <button class="btn transparent" id="sign-in-btn">
            Sign in
          </button>
        </div>
        <img src="ASSETS/img/register.svg" class="image" alt="" />
      </div>
    </div>
  </div>

  <script src="ASSETS/Js/app.js"></script>
</body>

</html>