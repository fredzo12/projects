<?php ob_start(); ?>
<?php session_start(); ?>

<?php 
     $connection = mysqli_connect('localhost','root','','hotel');
     if(!$connection){
         die("connection failed");
     }
 


if(isset($_POST['login'])){
    
    $username = $_POST['username'];
    $password = $_POST['password'];
    
    $username = mysqli_real_escape_string( $connection,  $username);
    $password = mysqli_real_escape_string( $connection,  $password);
    
    $query = "select * from users where user_name = '{$username}'";
    $select_query = mysqli_query($connection,  $query);
    if(!$select_query){
        die("query failed");
    }
    
    while($row = mysqli_fetch_array($select_query)){
        $db_id = $row['user_id'];
        $db_name = $row['user_name'];
        $db_password = $row['user_password'];
        $db_role = $row['user_role'];
    }
    
    if($username != $db_name && $password != $db_password ){
        
        
         header("Location: ./login.php ");
        
    }
    
    else if($username == $db_name && $password == $db_password ){
        
        $_SESSION['username'] = $db_name;
        $_SESSION['userole'] = $db_role;
        $_SESSION['user_id'] = $db_id;
        
            if($_SESSION['userole'] == 'customer'){
                header("Location: ./customer.php ");
            }
            else if($_SESSION['userole'] == 'admin'){
                header("Location: ./admin.php ");
            }
        
            else if($_SESSION['userole'] == 'waiter'){
                header("Location: ./waiter.php ");
            }
        
    }
}

?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- external css -->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>
<style type="text/css">
  body{
   background-color: #1F2730;
    background-repeat: no-repeat;
    background-size: cover;
    height: 100%;
  }
</style>
<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login"  method="post">
        <h2 class="form-login-heading">sign in now</h2>
          
        <div class="login-wrap">
          <input type="text" name="username" class="form-control" placeholder="User name" autofocus required="true">
          <br>
          <input type="password" name="password" class="form-control" placeholder="Password" required="true">
          <label class="checkbox">
            <input type="checkbox" value="remember-me"> Remember me
            <span class="pull-right">
            <a data-toggle="modal" href="login.html#myModal"> Forgot Password?</a>
            </span>
            </label>
          <button class="btn btn-theme btn-block" name="login" type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
         <!--  <div class="login-social-link centered">
            <p>or you can sign in via your social network</p>
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div> -->
          <div class="registration">
            Don't have an account yet?<br/>
            <a class="" href="create.html">
              Create an account
              </a>
          </div>
        </div>
        <!-- Modal -->
        <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title">Forgot Password ?</h4>
              </div>
              <div class="modal-body">
                <p>Enter your e-mail address below to reset your password.</p>
                <input type="text" name="email" placeholder="Email" autocomplete="off" class="form-control placeholder-no-fix">
              </div>
              <div class="modal-footer">
                <button data-dismiss="modal" class="btn btn-default" type="button">Cancel</button>
                <button class="btn btn-theme" type="button">Submit</button>
              </div>
            </div>
          </div>
        </div> -->
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="lib/jquery.backstretch.min.js"></script>
  <!-- <script>
    $.backstretch("img/ny.jpg", {
      speed: 500
    });
  </script> -->
</body>

</html>

