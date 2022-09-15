<?php require_once('core/initialize.php'); ?>
<?php

if (!isset($_SESSION['loggedin']) && $_SESSION['loggedin'] !== false) {
    header('location: login.php');
    exit;
}

if (isset($_GET['theme'])) {
    $_SESSION['theme'] = $_GET['theme'];
    $theme = $_GET['theme'];
}else{
    $_SESSION['theme'] = 'light';
    $theme = 'light';
}

$inversetheme = $theme == 'dark' ? 'light' : 'dark';

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image/x-icon" href="src/kint.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js" integrity="sha256-+8RZJua0aEWg+QVVKg4LEzEEm/8RFez5Tb4JBNiV5xA=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" rel="stylesheet" />
    <title>JuanFi Agent Manager</title>
    <link href="assets/genman.dark.css" rel="stylesheet" />
</head>

<body class="<?php echo 'genman-dark'; ?>">
    <?php echo '    <nav class="navbar navbar-expand-lg navbar-' . $theme . ' bg-'. $theme .' shadow">
<div class="container-fluid">
    <a class="navbar-brand h1" href="#">
        <img src="src/kint.ico" alt="" width="30" height="24" class="d-inline-block align-text-top">
        Juanfi Agent Manager
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="https://github.com/Kintoyyy">Github</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="https://www.facebook.com/kint.oyyy508/">Facebook</a>
            </li>
        </ul>
        <form class="d-flex">
            <a href="index.php?theme='. $inversetheme . '" class="btn btn-block btn-outline-success mx-2">Dark</a>
            <a type="button" class="btn btn-block btn-outline-info" data-bs-toggle="modal" data-bs-target="#sessionInfoModal">Session</a>
            <a href="devices.php" class="btn btn-block btn-outline-success mx-2">Mikrotik</a>
            <a type="button" class="btn btn-block btn-outline-info" data-bs-toggle="modal" data-bs-target="#scriptInfoModal">Scripts</a>
            <a href="password_reset.php" class="btn btn-block btn-outline-warning mx-2">Reset Password</a>
            <a href="logout.php" class="btn btn-block btn-outline-danger">Sign Out</a>
        </form>
    </div>
</div>
</nav>'; ?>
    <div class="container">
        <div id="topstats" class="row mt-3">
        </div>
        <div class="row">
            <div class="col col-xl-12 col-lg-5">
                <div class="card shadow ">
                    <div class="card-body">

                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th class="text-right">#</th>
                                <th>Session Name</th>
                                <th class="text-center">Action</th> 
                                <th>Hotspot Name</th>             
                                
                                                               
                            </tr>
                        </thead>
                        <tbody id="table-router-list">
                            
                                <tr>
                                  <script>localStorage.setItem("?session749_idleto","30")</script>
                                  <td class="text-right" width="30px;">1</td>
                                  <td><i class="fa fa-tag" id="session749p"></i> session749</td>
                                  <td width="180px" class="text-center">
                                    <!-- <span class=" tooltip"><span class="tooltiptext hide"id="session749p"></span></span> -->
                                    <span title="Remove session session749" class="btn" id="session749r" onclick="removeRouter('session749')">
                                      <i class="fa fa-trash text-danger"></i></span>
                                    <span title="Edit session session749" class="btn" onclick="editRouter('session749')"><i class="fa fa-cog"></i></span> 
                                    <span title="Connect to session session749" class="btn" onclick="connect('session749p','session749')" id="session749">
                                      <i class="fa fa-plug"></i>
                                    </span>
                                                                   
                                  </td>
                                  <td><i class="fa fa-wifi"></i>  </td>
                                  
                                  
                                </tr>
             
                                
                                <tr>
                                  <script>localStorage.setItem("?session326_idleto","30")</script>
                                  <td class="text-right" width="30px;">2</td>
                                  <td><i class="fa fa-tag" id="session326p"></i> session326</td>
                                  <td width="180px" class="text-center">
                                    <!-- <span class=" tooltip"><span class="tooltiptext hide"id="session326p"></span></span> -->
                                    <span title="Remove session session326" class="btn" id="session326r" onclick="removeRouter('session326')">
                                      <i class="fa fa-trash text-danger"></i></span>
                                    <span title="Edit session session326" class="btn" onclick="editRouter('session326')"><i class="fa fa-cog"></i></span> 
                                    <span title="Connect to session session326" class="btn" onclick="connect('session326p','session326')" id="session326">
                                      <i class="fa fa-plug"></i>
                                    </span>
                                                                   
                                  </td>
                                  <td><i class="fa fa-wifi"></i>  </td>
                                  
                                  
                                </tr>
             
                                                        </tbody>
                    </table>
                        
                    </div>
                </div>
            </div>


        </div>

        <!-- echo '<div class="text-center align-self-center my-5 " id=crdts>Made by <a class="text-decoration-none" href=https://kintoyyy.github.io/Me/ id=kintoyyy>kintoyyy ❤</a> Modified by Genman</div>'; ?> -->

    </div>
    <div class="modal fade" id="scriptInfoModal" tabindex="-1" aria-labelledby="scriptInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="sessionInfoModal" tabindex="-1" aria-labelledby="sessionInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-body">
                    <!-- <p>tsfsdf</p> -->
                    
                </div>
            </div>
        </div>
    </div>
</body>


</html>