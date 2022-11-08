<?php

include('header.php');

include "connection.php";

$billion_id= $_GET['billion_id'];
$full_name = "";
$bill_type = "";
$date = "";
$bill_no = "";


$res = mysqli_query($link, "select * from billing_header where billion_id=$billion_id");
while ($row = mysqli_fetch_array($res)) {

    $full_name = $row["full_name"];
    $bill_type = $row["bill_type"];
    $date = $row["date"];
    $bill_no = $row["bill_no"];

    
}

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            View Bills</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">


           <center>
               <h4> Details Bills</h4>
           </center>
           <table>
               
               <tr>
                   <td>Bill NO:</td>
                   <td><?php echo $full_name;?></td>
               </tr>
                  <tr>
                   <td>Full Name:</td>
                   <td><?php echo $bill_type;?></td>

                </tr>
                  <tr>
                   <td>Bill Type:</td>
                   <td><?php echo $date;?></td>

               </tr>
                  <tr>
                   <td>Bill Date:</td>
                   <td><?php echo $bill_no;?></td>
                  </tr>
                  
           </table>
           <table class="table table-bordered" style="margin-top: 5px;">
               
               <tr>
                   <th>Product Company</th>
                   <th>Product Name</th>
                   <th>Product Unit</th>
                   <th>Packing Size</th>
                   <th>Price</th>
                   <th>Qty</th>
                   <th>Total</th>
                   <th>Return</th>
               </tr>
               <?php
                     
              $total =0;
               $res1 = mysqli_query($link, "select * from billing_deatail where bill_id=$billion_id");

               while($row1=mysqli_fetch_array($res1)){
                

                ?>
                <tr>
                  
                    <td><?php echo $row1["product_company"];?></td>
                    <td><?php echo $row1["product_name"];?></td>
                    <td><?php echo $row1["product_unit"];?></td>
                    <td><?php echo $row1["product_size"];?></td>
                    <td><?php echo $row1["price"];?></td>
                    <td><?php echo $row1["qty"];?></td>
                    <td><?php echo ($row1["qty"]*$row1["price"]);?></td>
                    <td style="..."><a style="color: red;" href="return.php?billing_d_id=<?php echo $row1['billing_d_id']; ?>">Return</a></td>

               </tr>

             <?php
             $total = $total + ($row1["qty"]*$row1["price"]) ;

               }



               ?>
           </table>


           <div align="right" style="font-weight: bold;">
               Grand Total: ৳
             <?php 
             echo $total; 
             ?> 

           </div>



        
        </div>

    </div>
</div>



<?php

include('footer.php');

?>


