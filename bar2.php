
<?php session_start(); ?>

<?php 

    $connection = mysqli_connect('localhost','root','','hotel');
     if(!$connection){
         die("connection failed");
     }

   
?>

<!DOCTYPE html>
<html>
<head>
	<title>customer form</title>

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
    
    <link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
    <style>
.vl {
  border-left: 2px solid black;
  height: 50px;
}
</style>
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
            <h3 class="centered">Customer</h3>
          <h5 class="centered"><?php echo $_SESSION['username'] ?></h5>
          <li class="mt">
            <a class="active" href="customer.php">
              <i class="fas fa-phone-volume"></i>
              <span>Contact us</span>
              </a>
          </li>
            
            <li class="mt">
            <a href="c_hotel_services.php">
              <i class="fas fa-hotel"></i>
              <span>Hotel Services</span>
              </a>
          </li>

           <li class="mt">
            <a href="customer_bills.php">
              <i class="fas fa-calculator"></i>
              <span>Chech Bills</span>
              </a>
          </li>

           <li class="mt">
            <a  href="bar.php">
              <i class="fas fa-cart-arrow-down"></i>
              <span>Make order</span>
              </a>
          </li>
            
         <li class="mt">
            <a  href="profile.php">
              <i class="fas fa-cart-arrow-down"></i>
              <span>profile</span>
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
        <div class="row mt">
          <!-- /col-lg-12 -->
          <div class="col-lg-12 mt">
            <div class="row content-panel">
              <div class="panel-heading">
                <ul class="nav nav-tabs nav-justified">
                  <li class="active">
                    <a data-toggle="tab" href="#overview">Drinks</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#contact" class="contact-map">Food</a>
                  </li>
                  <li>
                    <a data-toggle="tab" href="#edit">Breakfast</a>
                  </li>
                </ul>
              </div>
              <!-- /panel-heading -->
              <div class="panel-body">
                <div class="tab-content">
                  <div id="overview" class="tab-pane active">
                    <div class="row">
                      <div class="col-md-4">
                        <div class="product-panel-2 pn">
                              <div class="badge badge-hot">Liquors</div>
                              <img src="img/liquors.jpg" width="300" alt="">
                              <h5 class="mt">FROM 10000RWF</h5>
<!--                              <h6>FROM 10000RWF</h6>-->
    
                            
                        </div>
                          <form id="details">
                                <h4>ALL LIQUORS</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Uganda Waragi</h5>
                                <P>waragi 1/4: 3000Rwf</P>
                                <P>waragi 1/2: 5000Rwf</P>
                                <P>waragi bottle: 15000Rwf</P>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Henessy</h5>
                                <P>Shot: 3000Rwf</P>
                                <P>Double: 5000Rwf</P>
                                <P>Bottle: 8000Rwf</P>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Jameson</h5>
                                <P>Shot: 2000Rwf</P>
                                <P>Double: 4000Rwf</P>
                                <P>Bottle: 6000Rwf</P>
                                <hr>
                                
                            </form>
                        <!-- /detailed -->
                          
                      </div>
                      <!-- /col-md-6 -->
                      <div class="col-md-4 ">
                        <div class="product-panel-2 pn">
                             <div class="badge badge-hot">
                                 <h5>Soft</h5>
                                 <h5>Drinks</h5>  
                             </div>
                             <img src="img/soft.jpg" width="300" alt="">
                             
                             <h6>FROM 500RWF</h6>
                             
                            
                       </div>
                          
                            <form id="detailss"  >
                                <h4>SOFT DRINKS</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Soda</h5>
                                <P>all: 1000rwf</P>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Juice</h5>
                                <P>Apple juice: 1000Rwf</P>
                                <P>Orange juice: 1000Rwf</P>
                                <P>Maracuja: 1000Rwf</P>
                                <p>Cocktail: 1500Rwf</p>
                                <hr>
                                <p>Water: 500Rwf</p>
                              
                              
                                
                            </form>
                        <!-- /row -->
                      </div>
                        
                        <div class="col-md-4">
                        <div class="product-panel-2 pn">
                             <div class="badge badge-hot">Wines</div>
                             <img src="img/wines.jpg" width="300" alt="">
                             
                             <h6>FROM 4000RWF</h6>
                             
                       </div>
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                            
                              
                              
                                
                            </form>
                        <!-- /row -->
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /OVERVIEW -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="contact" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12">
                         <div class="product-panel-2 pn">
                              <div class="badge badge-hot">Food</div>
                              <img src="img/food.jpg" width="300" alt="" style="margin-top:10px;">
                              <img src="img/food2.jpg" width="300" alt="" style="margin-top:10px;">
                              <img src="img/food3.jpg" width="300" alt="" style="margin-top: 10px;">
<!--                              <h5 class="mt">FROM 1000Rwf</h5>-->
<!--                              <h6>FROM 10000RWF</h6>-->
    
                            
                        </div>
                          <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Food</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Burgers</h5>
                                <P>Cheese burger: 2500Rwf</P>
                                <p>Chicken burger: 3000Rwf</p>
                                <p>Fish burger: 3500Rwf</p>
                                <p>Beef burger: 3000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Salads</h5>
                                
                                <P>Bean salad: 2500Rwf</P>
                                <p>Caesar salad: 3000Rwf</p>
                                <p>Chef salad: 3500Rwf</p>
                                <p>Chicken salad: 3000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Full Plates</h5>
                                <P>Plain chips: 1500Rwf</P>
                                <p>Chips and rice: 3000Rwf</p>
                                <p>Chips,rice and chicken: 4000Rwf</p>
                                <p>Spaghetti with chicken: 5000Rwf</p>
                                <hr>
                                
                              </form>
                          </div>
                          
                          <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                              </form>
                          </div>
                          
                           <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                              </form>
                          </div>
                      </div>
                        
                      <!-- /col-md-6 -->
                      <div class="col-md-6 detailed">
                        
                      </div>
                      <!-- /col-md-6 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                  <div id="edit" class="tab-pane">
                    <div class="row">
                      <div class="col-md-12">
                         <div class="product-panel-2 pn">
                              <div class="badge badge-hot">
                                <h5>Break</h5>
                                 <h5>Fast</h5> 
                             </div>
                              <img src="img/break.jpg" width="300" alt="" style="margin-top:10px;">
                              <img src="img/break2.jpg" width="300" alt="" style="margin-top:10px;">
                              <img src="img/break3.jpg" width="300" alt="" style="margin-top: 10px;">
<!--                              <h5 class="mt">FROM 1000Rwf</h5>-->
<!--                              <h6>FROM 10000RWF</h6>-->
    
                            
                        </div>
                          <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                              </form>
                          </div>
                          
                          <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                              </form>
                          </div>
                          
                           <div class="col-md-4">
                            <form id="detailss"  >
                                <h4>Wines</h4>
                                <hr>
                                <h5 style="color:rgb(203, 51, 44);">Merlot</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                              
                              <h5 style="color:rgb(203, 51, 44);">Pinot noir</h5>
                                <P>piche: 5000Rwf</P>
                                <p>Bottle: 10000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Chardonnay</h5>
                                <P>piche: 6000Rwf</P>
                                <p>Bottle: 15000Rwf</p>
                                <hr>
                                
                                <h5 style="color:rgb(203, 51, 44);">Sauvignon blanc</h5>
                                <P>piche: 7000Rwf</P>
                                <p>Bottle: 20000Rwf</p>
                                <hr>
                              </form>
                          </div>
                      </div>
                      <div class="col-lg-8 col-lg-offset-2 detailed mt">
                       
                      </div>
                      <!-- /col-lg-8 -->
                    </div>
                    <!-- /row -->
                  </div>
                  <!-- /tab-pane -->
                </div>
                <!-- /tab-content -->
              </div>
              <!-- /panel-body -->
            </div>
            <!-- /col-lg-12 -->
          </div>
          <!-- /row -->
        </div>
        <!-- /container -->
      </section>
      <!-- /wrapper -->
    </section>
    <!--main content end-->
    <!--footer start-->
    <footer class="site-footer">
      <div class="text-center">
        <p>
          &copy; Copyrights <strong>Rwihimba Fred</strong>. All Rights Reserved
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
    
     <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    <script type="text/javascript" src="lib/style.js"></script>
    
<script
  src="https://code.jquery.com/jquery-3.1.1.min.js"
  integrity="sha256-hVVnYaiADRTO2PzUGmuLJr8BLUSjGIZsDYGmIJLv2b8="
  crossorigin="anonymous"></script>
<script src="semantic/dist/semantic.min.js"></script>
</body>
</html>