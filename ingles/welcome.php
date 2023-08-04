<?php

include("config.php");
$sql="SELECT * From Producto";
$resultado=$conn->query($sql);

// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
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
  </head>
  <style>
  th, td {
  border-style:solid;
  border-color: #96D4D4;
  }
</style>
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

                </ul>
              </div>
              <div class="rd-navbar-dummy"></div>
            </div>
          </nav>
        </div>
      </header>

<div class="container">
<div class="header"><center><h1>show of records</h1></center></div>
<div class="table-responsive">
<center><table class="table table-striped table-bordered table-hover">
        <tr>
        
        <th>Id</th>
        <br>
        <th>Name</th>
        <br>
        <th>Price</th>
        <br>
        <th>Brand</th>
        <br>
        <th>Description</th>
        <br>
        <th>number of stocks</th>
        <br>
        <th colspan="2">Edit</th>

        </tr>
<?php
if ($resultado->num_rows > 0)
{
    while($fila= $resultado -> fetch_assoc()) 
    {
        echo "<tr>";
        echo "<td>".$fila['Id_prod']."</td>";
        
        echo "<td>".$fila['Nombre_prod']."</td>";
        
        echo "<td>".$fila['Precio']."</td>";
        
        echo "<td>".$fila['Marca']."</td>";
        
        echo "<td>".$fila['Descripcion']."</td>";
       
        echo "<td>".$fila['no_exist']."</td>";

        echo "<td> <a href='Prodactualizar.php?id=".$fila['Id_prod']. " '> actualizar</a> </td>";
        echo "<td> <a href='Prodeliminar.php?id=".$fila['Id_prod']. " '> Eliminar</a> </td>";   
        echo "</tr>";

    }

}

?>
</table></center>
</div>
      <div class="rd-navbar-element"><center><a class="button button-sm button-default-outline button-winona" href="prodreg2.html">Register a new product</a></center>
      </div>
</div>

     
      <!-- Page Footer-->
      <a class="banner" href="https://www.templatemonster.com/website-templates/monstroid2.html" target="_blank"><img src="images/monstroid_big.jpg" alt="" height="0"/></a>
      <footer class="section footer-classic">
        <div class="footer-classic-main">
          <div class="container">
            <div class="row row-50 justify-content-lg-between">
              <div class="col-sm-7 col-lg-3 col-xl-2"><a class="brand" href="index.html"><img src="images/FT LOGO.jpg" alt="" width="199" height="41"/></a>
                <p><span style="max-width: 250px;"></span></p>
              </div>
              <div class="col-sm-7 col-lg-5 col-xl-3">
                <h4 class="footer-classic-title">Shortcuts</h4>
                <ul class="list footer-classic-list footer-classic-list_2-cols">
                  <li><a href="logout.php" class="btn btn-danger ml-3">Sign off</a></li>
                </ul>
              </div>
              <div class="col-sm-5 col-lg-9 col-xl-2">
                <h4 class="footer-classic-title">contact us</h4>
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