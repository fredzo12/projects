<?php session_start(); ?>




<?php 

    $connection = mysqli_connect('localhost','root','','hotel');
     if(!$connection){
         die("connection failed");
     }

    if(isset($_POST['add'])){
        $username = $_POST['username'];
        $roomno = $_POST['room'];
        
        $query = "select * from users where user_name = '{$username }'";
            $select_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_query)){
                $dbname = $row['user_name'];
            }
            if( $username != $dbname){
                
                header("Location: ./gallery.php");
            }
        else{
        
        $query = "update rooms set status = 'booked' where roomNo = '$roomno'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed");
        }
        
        
         $query = "insert into booked(roomno,names) values('$roomno','$username')";
         $results = mysqli_query($connection, $query);
         if(!$results){
            die("query failed");
        }
    }
    }

    
    if(isset($_POST['adds'])){
        $username = $_POST['name'];
        $roomno = $_POST['rooms'];
        
            $query = "select * from users where user_name = '{$username }'";
            $select_query = mysqli_query($connection, $query);
            while($row = mysqli_fetch_assoc($select_query)){
                $dbname = $row['user_name'];
            }
            if( $username != $dbname){
                
                header("Location: ./gallery.php");
            }
        else{
        $query = "update rooms set status = 'booked' where roomNo = '$roomno'";
        $result = mysqli_query($connection, $query);
        if(!$result){
            die("query failed");
        }
        
         $query = "insert into booked(roomno,names) values('$roomno','$username')";
         $results = mysqli_query($connection, $query);
         if(!$results){
            die("query failed");
        }
        }
    }

     if(isset($_GET['delete'])){
        $roomno = $_GET['delete'];
        
        $query = "delete from booked where roomno = {$roomno} ";
        $delete_query = mysqli_query($connection , $query);
        header("location: gallery.php");
        if(!$delete_query){
            die("query failed" . mysqli_error($connection));
        }
         
         $query = "select * from rooms"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomNo'];
                        if($roomno == $number){
                            $query = "update rooms set status = 'available' where roomNo = '$number'";
                                $result = mysqli_query($connection, $query);
                                if(!$result){
                                    die("query failed");
                                }
                        }
         
    }
     }
?>

<!DOCTYPE html>
<html>
<head>
	<title>admin form</title>

  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <link rel="stylesheet" type="text/css" href="css/zabuto_calendar.css">
  <link rel="stylesheet" type="text/css" href="lib/gritter/css/jquery.gritter.css" />
  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet">
  <link href="css/style-responsive.css" rel="stylesheet">
   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <script src="lib/chart-master/Chart.js"></script>
    
<link href="lib/fancybox/jquery.fancybox.css" rel="stylesheet" />
<script src="lib/jquery/jquery.min.js"></script>
    
 <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>

</head>
<body>
	 <section id="container">
    <!-- **********************************************************************************************************************************************************
        TOP BAR CONTENT & NOTIFICATIONS
        *********************************************************************************************************************************************************** -->
    <!--header start-->
    <header class="header black-bg">
      <div class="sidebar-toggle-box">
        <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
      </div>
      <!--logo start-->
      <a href="index.html" class="logo"><b>BLOOM BACK <span>HOTEL</span></b></a>
      <!--logo end-->
      <div class="nav notify-row" id="top_menu">
        <!--  notification start -->
        
        <!--  notification end -->
      </div>
      <div class="top-menu">
        <ul class="nav pull-right top-menu">
          <li><a class="logout" href="logout.php">Logout</a></li>
        </ul>
      </div>
    </header>
    <!--header end-->
    <!-- **********************************************************************************************************************************************************
        MAIN SIDEBAR MENU
        *********************************************************************************************************************************************************** -->
    <!--sidebar start-->
    <aside>
      <div id="sidebar" class="nav-collapse ">
        <!-- sidebar menu start-->
        <ul class="sidebar-menu" id="nav-accordion">
          <p class="centered"><a href="profile.html"><img src="img/ui-sam.jpg" class="img-circle" width="80"></a></p>
          <h3 class="centered">Admin</h3>
            <h5 class="centered"><?php echo $_SESSION['username'] ?></h5>

           <li class="mt">
            <a href="hotel_services.php">
              <i class="fas fa-hotel"></i>
              <span>Hotel Services</span>
              </a>
          </li>

           <li class="mt">
            <a  href="hotel_services.php">
              <i class="fas fa-glass-cheers"></i>
              <span>Hotel Services Category</span>
              </a>
          </li>

           <li class="mt">
            <a  href="users.php">
              <i class="fas fa-chalkboard-teacher"></i>
              <span>Users</span>
              </a>
          </li>

           <li class="mt">
            <a  href="#">
              <i class="fas fa-money-bill-alt"></i>
              <span>Billing</span>
              </a>
          </li>

           <li class="mt">
            <a  href="#">
              <i class="fas fa-book"></i>
              <span>Reporting</span>
              </a>
          </li>
         <!--  <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-desktop"></i>
              <span>UI Elements</span>
              </a>
            <ul class="sub">
              <li><a href="general.html">General</a></li>
              <li><a href="buttons.html">Buttons</a></li>
              <li><a href="panels.html">Panels</a></li>
              <li><a href="font_awesome.html">Font Awesome</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-cogs"></i>
              <span>Components</span>
              </a>
            <ul class="sub">
              <li><a href="grids.html">Grids</a></li>
              <li><a href="calendar.html">Calendar</a></li>
              <li><a href="gallery.html">Gallery</a></li>
              <li><a href="todo_list.html">Todo List</a></li>
              <li><a href="dropzone.html">Dropzone File Upload</a></li>
              <li><a href="inline_editor.html">Inline Editor</a></li>
              <li><a href="file_upload.html">Multiple File Upload</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-book"></i>
              <span>Extra Pages</span>
              </a>
            <ul class="sub">
              <li><a href="blank.html">Blank Page</a></li>
              <li><a href="login.html">Login</a></li>
              <li><a href="lock_screen.html">Lock Screen</a></li>
              <li><a href="profile.html">Profile</a></li>
              <li><a href="invoice.html">Invoice</a></li>
              <li><a href="pricing_table.html">Pricing Table</a></li>
              <li><a href="faq.html">FAQ</a></li>
              <li><a href="404.html">404 Error</a></li>
              <li><a href="500.html">500 Error</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-tasks"></i>
              <span>Forms</span>
              </a>
            <ul class="sub">
              <li><a href="form_component.html">Form Components</a></li>
              <li><a href="advanced_form_components.html">Advanced Components</a></li>
              <li><a href="form_validation.html">Form Validation</a></li>
              <li><a href="contactform.html">Contact Form</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-th"></i>
              <span>Data Tables</span>
              </a>
            <ul class="sub">
              <li><a href="basic_table.html">Basic Table</a></li>
              <li><a href="responsive_table.html">Responsive Table</a></li>
              <li><a href="advanced_table.html">Advanced Table</a></li>
            </ul>
          </li> -->
         <!--  <li>
            <a href="inbox.html">
              <i class="fa fa-envelope"></i>
              <span>Mail </span>
              <span class="label label-theme pull-right mail-info">2</span>
              </a>
          </li> -->
          <!-- <li class="sub-menu">
            <a href="javascript:;">
              <i class=" fa fa-bar-chart-o"></i>
              <span>Charts</span>
              </a>
            <ul class="sub">
              <li><a href="morris.html">Morris</a></li>
              <li><a href="chartjs.html">Chartjs</a></li>
              <li><a href="flot_chart.html">Flot Charts</a></li>
              <li><a href="xchart.html">xChart</a></li>
            </ul>
          </li>
          <li class="sub-menu">
            <a href="javascript:;">
              <i class="fa fa-comments-o"></i>
              <span>Chat Room</span>
              </a>
            <ul class="sub">
              <li><a href="lobby.html">Lobby</a></li>
              <li><a href="chat_room.html"> Chat Room</a></li>
            </ul>
          </li>
          <li>
            <a href="google_maps.html">
              <i class="fa fa-map-marker"></i>
              <span>Google Maps </span>
              </a>
          </li> -->
        </ul>
        <!-- sidebar menu end-->
      </div>
    </aside>
    <!--sidebar end-->
    <!-- **********************************************************************************************************************************************************
        MAIN CONTENT
        *********************************************************************************************************************************************************** -->
    <!--main content start-->
         
        <section id="main-content">
      <section class="wrapper site-min-height">
        <h3><i class="fa fa-angle-right"></i> VIP Rooms  <button type="button" class="btn btn-success">Book a Room</button></h3>
              <form  id="form" style="display:none;" action="gallery.php" method="post">
                  
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">enter your username</label>
                  <div class="col-sm-2">
                    <input type="text" name="username" class="form-control round-form" required="true">
                  </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">rooms available</label>
                    <div class="col-sm-2">
                    <select  name="room" class="form-control round-form" required="true">
                        <?php 
                            $query = "select * from rooms where status = 'available' and category = 'vip' ";
                            $select_query = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_query)){
                            $roomno = $row['roomNo'];
                        ?>
                        <option><?php echo $roomno; ?></option>
                        <?php } ?>
                    </select>
                    </div>
                     <label class="col-sm-2 col-sm-2 control-label">price: 25000rwf</label>
                  </div>
                  
                  <div class="form-send">
                <button type="submit"  name="add" class="btn btn-large btn-primary">BOOK</button>
              </div>
                 
            </form>
          <hr>
        <div class="row mt" style="padding-top:5%;">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room.jpg"><img class="img-responsive" src="img/room.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '1' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status: <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                  <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                             <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room22.jpg"><img class="img-responsive" src="img/room2.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                 <?php 
                     $query = "select * from rooms where roomNo = '2' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room3.jpg"><img class="img-responsive" src="img/room3.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '3' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
        <div class="row mt" >
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room4.jpg"><img class="img-responsive" src="img/room4.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '4' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room5.jpg"><img class="img-responsive" src="img/room5.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
            </div>
              <?php 
                     $query = "select * from rooms where roomNo = '5' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
              
              <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room6.jpg"><img class="img-responsive" src="img/room6.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '6' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
          <hr>
          <h3><i class="fa fa-angle-right"></i> Medium  <button type="button" class="btn btn-success">Book a Room</button></h3>
            <form  id="forms" style="display:none;" action="gallery.php" method="post">
                  
                  <div class="form-group">
                  <label class="col-sm-2 col-sm-2 control-label">enter your username</label>
                  <div class="col-sm-2">
                    <input type="text" name="name" class="form-control round-form" required="true">
                  </div>
                </div>
                 <div class="form-group">
                    <label class="col-sm-2 col-sm-2 control-label">rooms available</label>
                    <div class="col-sm-2">
                    <select  name="rooms" class="form-control round-form" required="true">
                        <?php 
                            $query = "select * from rooms where status = 'available' and category = 'medium' ";
                            $select_query = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_query)){
                            $roomno = $row['roomNo'];
                        ?>
                        <option><?php echo $roomno; ?></option>
                        <?php } ?>
                        
                        <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
                    </select>
                    </div>
                     <label class="col-sm-2 col-sm-2 control-label">price: 15000rwf</label>
                  </div>
                  
                  <div class="form-send">
                <button type="submit"  name="adds" class="btn btn-large btn-primary">BOOK</button>
              </div>
                 
            </form>
        <hr>
        <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room.jpg"><img class="img-responsive" src="img/room.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '7' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room2.jpg"><img class="img-responsive" src="img/room2.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '8' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room3.jpg"><img class="img-responsive" src="img/room3.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '9' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
        <div class="row mt">
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room4.jpg"><img class="img-responsive" src="img/room4.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '10' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room5.jpg"><img class="img-responsive" src="img/room5.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '11' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
          <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 desc">
            <div class="project-wrapper">
              <div class="project">
                <div class="photo-wrapper">
                  <div class="photo">
                    <a class="fancybox" href="img/room6.jpg"><img class="img-responsive" src="img/room6.jpg" alt=""></a>
                  </div>
                  <div class="overlay"></div>
                </div>
              </div>
                <?php 
                     $query = "select * from rooms where roomNo = '12' ";
                     $select_query = mysqli_query($connection, $query);
                      while($row = mysqli_fetch_assoc($select_query)){
                            $status = $row['status'];
                            $roomno = $row['roomNo']
                ?>
                <h6>status:  <?php echo $status ?></h6>
                <h6>room number: <?php echo $roomno ?></h6>
                <?php } ?>
                
                <?php 
                    $query = "select * from booked"; 
                    $select_query = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select_query)){
                        $number = $row['roomno'];
                        $name = $row['names'];
                        if($roomno == $number){ ?>
                            <h6>booked by: <?php echo $name ?></h6>
                            <a href='gallery.php?delete=<?php echo $number ?>'>cancel booking</a>
                    <?php    } 
                    }
                ?>
            </div>
          </div>
          <!-- col-lg-4 -->
        </div>
        <!-- /row -->
        
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Umurage technologies</strong>. All Rights Reserved
        </p>
       <!--  <div class="credits">
          
            You are NOT allowed to delete the credit link to TemplateMag with free version.
            You can delete the credit link only if you bought the pro version.
            Buy the pro version with working PHP/AJAX contact form: https://templatemag.com/dashio-bootstrap-admin-template/
            Licensing information: https://templatemag.com/license/
          
          Created with Dashio template by <a href="https://templatemag.com/">TemplateMag</a>
        </div> -->
        <a href="index.html#" class="go-top">
          <i class="fa fa-angle-up"></i>
          </a>
      </div>
    </footer>
    <!--footer end-->
  </section>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="lib/jquery/jquery.min.js"></script>

  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <script src="lib/jquery.sparkline.js"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <script type="text/javascript" src="lib/gritter/js/jquery.gritter.js"></script>
  <script type="text/javascript" src="lib/gritter-conf.js"></script>
  <!--script for this page-->
  <script src="lib/sparkline-chart.js"></script>
  <script src="lib/zabuto_calendar.js"></script>
 <!--  <script type="text/javascript">
    $(document).ready(function() {
      var unique_id = $.gritter.add({
        // (string | mandatory) the heading of the notification
        title: 'Welcome to Dashio!',
        // (string | mandatory) the text inside the notification
        text: 'Hover me to enable the Close Button. You can hide the left sidebar clicking on the button next to the logo.',
        // (string | optional) the image to display on the left
        image: 'img/ui-sam.jpg',
        // (bool | optional) if you want it to fade out on its own or just sit there
        sticky: false,
        // (int | optional) the time you want it to be alive for before fading out
        time: 8000,
        // (string | optional) the class name you want to apply to that specific message
        class_name: 'my-sticky-class'
      });

      return false;
    });
  </script> -->
  <script type="application/javascript">
    $(document).ready(function() {
      $("#date-popover").popover({
        html: true,
        trigger: "manual"
      });
      $("#date-popover").hide();
      $("#date-popover").click(function(e) {
        $(this).hide();
      });

      $("#my-calendar").zabuto_calendar({
        action: function() {
          return myDateFunction(this.id, false);
        },
        action_nav: function() {
          return myNavFunction(this.id);
        },
        ajax: {
          url: "show_data.php?action=1",
          modal: true
        },
        legend: [{
            type: "text",
            label: "Special event",
            badge: "00"
          },
          {
            type: "block",
            label: "Regular event",
          }
        ]
      });
    });

    function myNavFunction(id) {
      $("#date-popover").hide();
      var nav = $("#" + id).data("navigation");
      var to = $("#" + id).data("to");
      console.log('nav ' + nav + ' to: ' + to.month + '/' + to.year);
    }
  </script>
 <script src="lib/fancybox/jquery.fancybox.js"></script>
  <script src="lib/bootstrap/js/bootstrap.min.js"></script>
  <script class="include" type="text/javascript" src="lib/jquery.dcjqaccordion.2.7.js"></script>
  <script src="lib/jquery.scrollTo.min.js"></script>
  <script src="lib/jquery.nicescroll.js" type="text/javascript"></script>
  <!--common script for all pages-->
  <script src="lib/common-scripts.js"></script>
  <!--script for this page-->
  <script type="text/javascript">
    $(function() {
      //    fancybox
      jQuery(".fancybox").fancybox();
    });
    
      
  </script>
    <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="lib/style.js"></script>
</body>
</html>