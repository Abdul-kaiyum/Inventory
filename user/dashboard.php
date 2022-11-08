<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="dashboard.php" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Dashboard</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
            

             <div class="card" style="width: 18rem;border-style: solid; border-width: 1px; border-radius: 10px; float: left;">
                <div class="card-body">
                    
                  <h3 class="card-title text-center">No of Products</h3>
                  <h1 class="card-text text-center">
                         <?php 

                              $count = 0;
                              $res = mysqli_query($link, "select * from product_info");

                              $count = mysqli_num_rows($res);

                              echo $count;
                         ?>

                  </h1>

                </div>
                
             </div>

             <div class="card" style="width: 18rem;border-style: solid; border-width: 1px; border-radius: 10px; float: left; margin-left: 5px;">
                <div class="card-body">
                    
                  <h3 class="card-title text-center">Total Orders</h3>
                  <h1 class="card-text text-center">
                         <?php 

                              $count = 0;
                              $res = mysqli_query($link, "select * from billing_header");

                              $count = mysqli_num_rows($res);

                              echo $count;
                         ?>

                  </h1>

                </div>
                
             </div>

             <div class="card" style="width: 18rem;border-style: solid; border-width: 1px; border-radius: 10px; float: left; margin-left: 5px;">
                <div class="card-body">
                    
                  <h3 class="card-title text-center">Total Company</h3>
                  <h1 class="card-text text-center">
                         <?php 

                              $count = 0;
                              $res = mysqli_query($link, "select * from company_info");

                              $count = mysqli_num_rows($res);

                              echo $count;
                         ?>

                  </h1>

                </div>
                
             </div>



        </div>

    </div>
</div>



<?php

include('footer.php');

?>


