

 <?php session_start(); ?>


<?php 

    $connection = mysqli_connect('localhost','root','','hotel');
     if(!$connection){
         die("connection failed");
     }

   




?>

<html>

    <head>
        <time>orders</time>
    </head>
    
    <body>
        <section id="main-content">
      <section class="wrapper">
        <h3><i class="fa fa-angle-right"></i> List of Customers</h3>
        <div class="row mt">
          <div class="col-lg-12">
            <div class="content-panel">
              <section id="unseen">
                <?php 
                    $query = "select * from bills where id in(select id from bills group by id having count(*) > 1)";
                    $select = mysqli_query($connection, $query);
                    while($row = mysqli_fetch_assoc($select))
                    {
                        $username = $row['username'];
                        $name = $row['name'];
                        $price = $row['price'];
                    
                ?>
              <h6>orders by : <?php echo $username ?></h6>
              <h6><?php echo $name ?></h6>
              <h6><?php echo $price ?></h6>
                  <?php } ?>
              </section>
            </div>
            <!-- /content-panel -->
          </div>
          <!-- /col-lg-4 -->
        </div>
        <!-- /row -->
        
        <!-- /row -->
      </section>
      <!-- /wrapper -->
    </section>
    </body>
</html>