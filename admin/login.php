<?php
// Initialize the session
session_start();
 
// Check if the user is already logged in, if yes then redirect him to welcome page
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: welcome.php");
    exit;
}
 
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$username = $password = "";
$username_err = $password_err = $login_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Check if username is empty
    if(empty(trim($_POST["username"]))){
        $username_err = "Please enter username.";
    } else{
        $username = trim($_POST["username"]);
    }
    
    // Check if password is empty
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter your password.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    // Validate credentials
    if(empty($username_err) && empty($password_err)){
        // Prepare a select statement
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        
        if($stmt = $conn->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("s", $param_username);
            
            // Set parameters
            $param_username = $username;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Store result
                $stmt->store_result();
                
                // Check if username exists, if yes then verify password
                if($stmt->num_rows == 1){                    
                    // Bind result variables
                    $stmt->bind_result($id, $username, $hashed_password);
                    if($stmt->fetch()){
                        if(password_verify($password, $hashed_password)){
                            // Password is correct, so start a new session
                            session_start();
                            
                            // Store data in session variables
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["username"] = $username;                            
                            
                            // Redirect user to welcome page
                            header("location: welcome.php");
                        } else{
                            // Password is not valid, display a generic error message
                            $login_err = "Invalid username or password.";
                        }
                    }
                } else{
                    // Username doesn't exist, display a generic error message
                    $login_err = "Invalid username or password.";
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            $stmt->close();
        }
    }
    
    // Close connection
    $conn->close();
}
?>
 
 <!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Inicio</title>
    <meta name="viewport" content="width=device-width height=device-height initial-scale=1.0">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/FT LOGO.jpg" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700,800%7CPoppins:300,400,500,600,700%7CMuli:200,300,400,500">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/fonts.css">
    <link rel="stylesheet" href="css/style.css">
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
    <!-- Slide-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
    .mySlides {display:none;}
    </style>
  </head>

  <body>

    <div class="ie-panel"><a href="http://windows.microsoft.com/en-US/internet-explorer/"><img src="images/ie8-panel/warning_bar_0000_us.jpg" height="42" width="820" alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."></a></div>
    <div class="preloader" id="loading">
      <div class="preloader-body">
        <div id="loading-center-object">
          <div class="object" id="object_four"></div>
          <div class="object" id="object_three"></div>
          <div class="object" id="object_two"></div>
          <div class="object" id="object_one"></div>
        </div>
      </div>
    </div>
    <div class="page">

      <!-- Cabeza de pagina-->
      
      <header class="section page-header">
        <!-- RD Navbar-->
        <div class="rd-navbar-wrap">
          <nav class="rd-navbar rd-navbar-modern" data-layout="rd-navbar-fixed" data-sm-layout="rd-navbar-fixed" data-md-layout="rd-navbar-fixed" data-md-device-layout="rd-navbar-fixed" data-lg-layout="rd-navbar-fixed" data-lg-device-layout="rd-navbar-fixed" data-xl-layout="rd-navbar-static" data-xl-device-layout="rd-navbar-static" data-xxl-layout="rd-navbar-static" data-xxl-device-layout="rd-navbar-static" data-lg-stick-up-offset="10px" data-xl-stick-up-offset="10px" data-xxl-stick-up-offset="10px" data-lg-stick-up="true" data-xl-stick-up="true" data-xxl-stick-up="true">
            <div class="rd-navbar-main">
              <!-- RD Navbar Panel-->
              <div class="rd-navbar-panel">
                <!-- RD Navbar Toggle-->
                <button class="rd-navbar-toggle" data-rd-navbar-toggle=".rd-navbar-nav-wrap"><span></span></button>
                <!-- RD Navbar Brand LOGO-->                                             
                <div class="rd-navbar-brand"> <a class="brand" href="index.htmlp"><img src="images/FT LOGO.jpg" alt="" width="199" height="41"/></a></div>
              </div>
              <div class="rd-navbar-nav-wrap">


                <!-- Menu -->
                <!-- RD Navbar Nav-->
                <ul class="rd-navbar-nav">
                  <li class="rd-nav-item active"><a class="rd-nav-link" href="index.html">Inicio</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="Categoria.html">Categoría</a>
                  </li>
                  <li class="rd-nav-item"><a class="rd-nav-link" href="contacts.html">Contactos</a>
                  </li>
                </ul>
              </div>
              <div class="rd-navbar-dummy"></div>
            </div>
          </nav>
        </div>
      </header>

      <!-- FScreen-->
      <!-- registrarse-->
      <section id="about" class="about">
    <div class="wrapper" >
        <center><h2>Inicio de sesión</h2></center>
        <center><p>Por favor escriba su usuario.</p></center>

        <?php 
        if(!empty($login_err)){
            echo '<div class="alert alert-danger">' . $login_err . '</div>';
        }        
        ?>

        <center><form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label class="col-sm-4 text-left">Usuario</label>
                <div class="col-sm-4">
                <input type="text" name="username" class="form-control <?php echo (!empty($username_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $username; ?>">
                <span class="invalid-feedback"><?php echo $username_err; ?></span>
                </div>
            </div>    
            <div class="form-group">
                <label class="col-sm-4 text-left">Contraseña</label>
                <div class="col-sm-4">
                <input type="password" name="password" class="form-control <?php echo (!empty($password_err)) ? 'is-invalid' : ''; ?>">
                <span class="invalid-feedback"><?php echo $password_err; ?></span>
            </div>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-danger" value="Login">
            </div>
        </form></center>
    </div>
    </section>

      <!-- Page Footer-->
      <a class="banner" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="images/monstroid_big.jpg" alt="" height="0"/></a>
      <footer class="section footer-classic">
        <div class="footer-classic-main">
          <div class="container">
            <div class="row row-50 justify-content-lg-between">
              <div class="col-sm-7 col-lg-3 col-xl-2"><a class="brand" href="index.html"><img src="images/FT LOGO.jpg" alt="" width="199" height="41"/></a>
                <p><span style="max-width: 250px;"></span></p>
              </div>
              <div class="col-sm-5 col-lg-9 col-xl-2">
                <h4 class="footer-classic-title">Contactanos</h4>
                <div class="row row-20 row-sm-35">
                  <div class="col-6 col-sm-12 col-lg-8 col-xl-12">
                    <div class="row row-10 text-default">
                      <div class="col-lg-6 col-xl-12"><a href="mailto:ferretecutch@gmail.com">ferretecutch@gmail.com</a></div>
                      <div class="col-lg-6 col-xl-12"><a class="big" href="tel:614-318-0932">614-318-0932</a></div>
                    </div>
                  </div>
                  <div class="col-6 col-sm-12 col-lg-4 col-xl-12 text-right text-sm-left">
                    <div class="group group-xs"></a><a class="link link-social-1 mdi mdi-facebook" href="https://www.facebook.com/profile.php?id=100087761088620&is_tour_dismissed=true"></a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
    <div class="snackbars" id="form-output-global"></div>
    <script src="js/core.min.js"></script>
    <script src="js/script.js"></script>
  </body>