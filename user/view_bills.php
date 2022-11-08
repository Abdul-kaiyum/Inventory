<?php

include('header.php');

include "connection.php";



?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            View Bills</a>




        </div>
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
                    <button type="submit" name="submit1" class="btn btn-success">Show Purchase From These Dates</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>

                <?php

                         if (isset($_POST["submit1"])) {

                            ?>
                             <table class="table table-bordered">
                 <tr>
                     <th>Bill No</th>
                     <th>Bill Generated BY</th>
                     <th>Full Name</th>
                     <th>Bill Type</th>
                     <th>Bill Date</th>
                     <th>Bill Total</th>
                     
                     <th>View Details</th>
                 </tr>

                 <?php

                     $res = mysqli_query($link, "select * from billing_header where (date>='$_POST[dt]' && date<='$_POST[dt2]') order by billion_id desc");
                     while ($row=mysqli_fetch_array($res)) {
                         ?>


                         <tr>
                             
                                <td><?php echo $row["bill_no"]; ?></td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["full_name"]; ?></td>
                                <td><?php echo $row["bill_type"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><a href=""><?php echo get_total($row["billion_id"], $link)."৳"; ?></a></td>
                                
                                <td><a href="view_bill_details.php?billion_id=<?php echo $row['billion_id']; ?>" style="color: blue;" >View Details</a></td>

                         </tr>


                         <?php
                     }

                 ?>



             </table>





                 <?php

                         }else{



                ?>

             <table class="table table-bordered">
                 <tr>
                     <th>Bill No</th>
                     <th>Bill Generated BY</th>
                     <th>Full Name</th>
                     <th>Bill Type</th>
                     <th>Bill Date</th>
                     <th>Bill Total</th>
                     
                     <th>View Details</th>
                 </tr>

                 <?php

                     $res = mysqli_query($link, "select * from billing_header order by billion_id desc");
                     while ($row=mysqli_fetch_array($res)) {
                         ?>


                         <tr>
                             
                                <td><?php echo $row["bill_no"]; ?></td>
                                <td><?php echo $row["username"]; ?></td>
                                <td><?php echo $row["full_name"]; ?></td>
                                <td><?php echo $row["bill_type"]; ?></td>
                                <td><?php echo $row["date"]; ?></td>
                                <td><a href=""><?php echo get_total($row["billion_id"], $link)."৳"; ?></a></td>
                                
                                <td><a href="view_bill_details.php?billion_id=<?php echo $row['billion_id']; ?>" style="color: blue;" >View Details</a></td>

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

function get_total($bill_id, $link){
    $total = 0;

$res2 = mysqli_query($link, "select * from billing_deatail where bill_id=$bill_id");

while ($row2=mysqli_fetch_array($res2)) {
    $total = $total + ($row2["price"]*$row2["qty"]);
}
return $total;

}



?>

<?php

include('footer.php');

?>

