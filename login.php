<?php require_once('core/initialize.php'); ?>
<?php
if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
  header("location: index.php");
  exit;
}

error_reporting(0);
ini_set('display_errors', 0);

include_once('core/routeros_api.class.php');

$username = $password = '';
$username_err = $password_err = '';

foreach (file('./core/genman.php',FILE_SKIP_EMPTY_LINES) as $line) {
  
  $ssa = explode("'", $line);
  

  if(isset($ssa)){
    $ss = $ssa[1];
  }else{
    echo 'no config file.';
  }
  // var_dump($ssa);

  clearstatcache(); //clear cache for better results.

  if ($ss === 'genman') {
    $useradm = get_config($line,'genman<|<', "'");
    $passadm = get_config($line,'genman>|>', "'");


    if (isset($_POST['login'])) {
  
      if (empty(trim($_POST['username']))) {
        $username_err = 'Please enter username.';
      } else {
        $user = trim($_POST['username']);
      }
      if (empty(trim($_POST['password']))) {
        $password_err = 'Please enter your password.';
      } else {
        $pass = trim($_POST['password']);
      }
    
      
      if ($user === $useradm && $pass === dec_rypt($passadm)) {
        $_SESSION["loggedin"] = true;
        
        // echo $urlLogin;
        redirect_to('index.php');
      }else{
        // echo 'Wrong username / password';
        // $messa ge = 'Wrong username / password.';
        $has_error = 'Wrong username / password.';
      }
    }


  }


}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Sign in</title>
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="icon" type="image/x-icon" href="src/kint.ico">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/notify.min.js"></script>
</head>

<body>
  <main>
    <section class="container wrapper py-lg-5 sm" style="max-width: 500px;">
      <div class="text-center">
        <img src="src/logo.png" class="rounded" alt="..." style="width: 150px;">
        <h2 class="display-6 pt-5">Login - Router Manager</h2>
      </div>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group mb-3 ">
          <label for="username">Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group mb-3 <?php (!empty($password_err)) ? 'has_error' : ''; ?>">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" class="form-control" value="<?php echo $password ?>">
          <span class="help-block"><?php echo $password_err; ?></span>
        </div>
        <div class="mb-3 mt-3 text-danger">
            <?php (!empty($has_error)) ?  $has_error : ''; ?>
            <?php echo $has_error; ?>
        </div>
        <div class="form-group d-grid gap-2">
          <input type="submit" name="login" class="btn col btn-outline-primary" value="login">
        </div>
      </form>
      
      
    </section>


    <!-- <section class="container wrapper py-lg-5 sm" style="max-width: 500px;">
      <div class="text-center">       
        <h2 class="display-6 pt-2">Setup Connection</h2>
      </div>

      <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <div class="form-group mb-3 ">
          <label for="username">Mikrotik IP Address</label>
          <input type="text" name="ipaddress" id="ipaddress" class="form-control" value="">
          <span class="help-block"></span>
        </div>
        <div class="form-group mb-3 ">
          <label for="username">Mikrotik Username</label>
          <input type="text" name="username" id="username" class="form-control" value="<?php echo $username ?>">
          <span class="help-block"></span>
        </div>
        <div class="form-group mb-3 <?php (!empty($username_err)) ? 'has_error' : ''; ?>">
          <label for="username">Mikrotik Password</label>
          <input type="password" name="password" id="password" class="form-control" value="">
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group mb-3 <?php (!empty($username_err)) ? 'has_error' : ''; ?>">
          <label for="username">Mikrotik Port</label>
          <input type="text" name="port" id="port" class="form-control" value="8728" readonly>
          <span class="help-block"><?php echo $username_err; ?></span>
        </div>
        <div class="form-group d-grid gap-2">
          <input type="submit" class="btn col btn-outline-primary" value="Connect">
        </div>
      </form>
      
      
    </section> -->
  </main>
  
</body>

</html>