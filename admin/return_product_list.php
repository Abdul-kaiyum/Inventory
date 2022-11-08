




<?php

include('header.php');

include "connection.php";



?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Return Product List</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">



          <form class="form-inline" action="" name="form1" method="post">
                    <div class="form-group">
                        <label for="email">Select Start Date</label>
                        <input type="text" name="dt" id="dt" autocomplete="off" class="form-control" required style="width:180px;border-style:solid; border-width:1px; border-color:#666666" placeholder="click here to open calender"  >
                    </div>
                    <div class="form-group">
                        <label for="email">Select End Date</label>
                        <input type="text" name="dt2" id="dt2" autocomplete="off" placeholder="click here to open calender"  class="form-control" style="width:180px;border-style:solid; border-width:1px; border-color:#666666" >
                    </div>
                    <button type="submit" name="submit1" class="btn btn-success">Show Return Products These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>

                  <?php

                      if (isset($_POST['submit1'])) {

                        ?>





 <table class="table table-bordered" style="margin-top: 5px;">
            <tr>
               <th>Bill NO</th>
               <th>Returned By</th>
               <th>Return Date</th>
               <th>Product Company</th>
               <th>Product Name</th>
               <th>Product Unit</th>
               <th>Packing Size</th>
               <th>Product Price</th>
               <th>Product Qty</th>
               <th>Total</th>
            </tr>
            <?php

               $res = mysqli_query($link, "select * from return_products where (return_date>='$_POST[dt]' && return_date<='$_POST[dt2]') order by r_id");

               while ($row=mysqli_fetch_array($res)) {
                   ?>

                   <tr>
                       <td><?php echo $row["bill_no"]; ?></td>
                       <td><?php echo $row["returned_product"]; ?></td>
                       <td><?php echo $row["return_date"]; ?></td>
                       <td><?php echo $row["product_company"]; ?></td>
                       <td><?php echo $row["product_name"]; ?></td>
                       <td><?php echo $row["product_unit"]; ?></td>
                       <td><?php echo $row["product_size"]; ?></td>
                       <td><?php echo $row["product_price"]; ?></td>
                       <td><?php echo $row["product_qty"]; ?></td>
                       <td><?php echo $row["total"]; ?></td>
                      

                  </tr>

                   <?php
               }


            ?>
            
           </table>










                        <?php

                   }else{

                    ?>



                             <table class="table table-bordered" style="margin-top: 5px;">
            <tr>
               <th>Bill NO</th>
               <th>Returned By</th>
               <th>Return Date</th>
               <th>Product Company</th>
               <th>Product Name</th>
               <th>Product Unit</th>
               <th>Packing Size</th>
               <th>Product Price</th>
               <th>Product Qty</th>
               <th>Total</th>
            </tr>
            <?php

               $res = mysqli_query($link, "select * from return_products order by r_id");

               while ($row=mysqli_fetch_array($res)) {
                   ?>

                   <tr>
                       <td><?php echo $row["bill_no"]; ?></td>
                       <td><?php echo $row["returned_product"]; ?></td>
                       <td><?php echo $row["return_date"]; ?></td>
                       <td><?php echo $row["product_company"]; ?></td>
                       <td><?php echo $row["product_name"]; ?></td>
                       <td><?php echo $row["product_unit"]; ?></td>
                       <td><?php echo $row["product_size"]; ?></td>
                       <td><?php echo $row["product_price"]; ?></td>
                       <td><?php echo $row["product_qty"]; ?></td>
                       <td><?php echo $row["total"]; ?></td>
                      

                  </tr>

                   <?php
               }


            ?>
            
           </table>



                    <?php

                   }

                   ?>

                      




          



        
        </div>

    </div>
</div>



<?php

include('footer.php');

?>


