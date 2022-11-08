<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Stock Master</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      


      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Sr No</th>
                  <th>Product Company</th>
                  <th>Product Name</th>
                  <th>Product Unit</th>
                  <th>Product Qty</th>
                  <th>Product Selling Price</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
              
                </tr>
              </thead>
              <tbody>

                <?php
                   $res = mysqli_query($link, "select * from stock_master");

                   $count =0;

                   while ($row =mysqli_fetch_array($res)) {

                    $count = $count+1;
                       ?>

                       <tr class="">
                  <td><?php echo $count; ?></td>
                  <td><?php echo $row["product_company"]; ?></td>
                  <td><?php echo $row["product_name"]; ?></td>
                  <td><?php echo $row["product_unit"]; ?></td>
                  <td><?php echo $row["product_qty"]; ?></td>
                  <td><?php echo $row["product_selling_price"]; ?></td>
                  
                  <td class="center"><center><a href="edit_stock_master.php?stock_id=<?php echo $row["stock_id"]; ?>" style="color: green;">Edit</a></center> </td>

                  <td class="center"><a href="delete_stock_product.php?stock_id=<?php echo $row["stock_id"]; ?>" style="color: red; ">Delete</a></td>
                  
                </tr>


                       <?php
                   }



                ?>
                
                
              </tbody>
            </table>
          </div>


      
    </div>
        </div>

    </div>
</div>


<?php

include('footer.php');

?>


