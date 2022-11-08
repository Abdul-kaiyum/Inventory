




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
                        <label for="party_name">Select party Name</label>
                        <select class="form-control" name="party_name">
                            
                           <?php
                            $res = mysqli_query($link, "select * from customer_info");
                            while($row= mysqli_fetch_array($res)){
                                ?>

                                <option>
                                    
                                    <?php echo $row["businessman_name"];?>
                                </option>

                                <?php

                            }

                           ?>
                        </select>
                        
                    </div>
                    
                    <button type="submit" name="submit1" class="btn btn-success">Show purchase from these company</button>
                    <button type="button" name="submit2" class="btn btn-warning" onclick="window.location.href=window.location.href">Clear Search</button>
                </form>

                <br>

                  <?php

                      if (isset($_POST['submit1'])) {

                        ?>





 <table class="table table-bordered" style="margin-top: 5px;">
            <tr>
               <th>company_name</th>
               <th>product_name</th>
               <th>unit</th>
               <th>packing_size</th>
               <th>quantity</th>
               <th>price</th>
               <th>party_name</th>
               <th>purchase_type</th>
               <th>expiry_date</th>
               <th>purchase_date</th>
               <th>username</th>
               
            </tr>
            <?php

               $res = mysqli_query($link, "select * from purchase_master where party_name='$_POST[party_name]'");

               while ($row=mysqli_fetch_array($res)) {
                   ?>

                   <tr>
                       <td><?php echo $row["company_name"]; ?></td>
                       <td><?php echo $row["product_name"]; ?></td>
                       <td><?php echo $row["unit"]; ?></td>
                       <td><?php echo $row["packing_size"]; ?></td>
                       <td><?php echo $row["quantity"]; ?></td>
                       <td><?php echo $row["price"]; ?></td>
                       <td><?php echo $row["party_name"]; ?></td>
                       <td><?php echo $row["purchase_type"]; ?></td>
                       <td><?php echo $row["expiry_date"]; ?></td>
                       <td><?php echo $row["purchase_date"]; ?></td>
                       <td><?php echo $row["username"]; ?></td>
                      

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
               <th>company_name</th>
               <th>product_name</th>
               <th>unit</th>
               <th>packing_size</th>
               <th>quantity</th>
               <th>price</th>
               <th>party_name</th>
               <th>purchase_type</th>
               <th>expiry_date</th>
               <th>purchase_date</th>
               <th>username</th>
            </tr>
            <?php

               $res = mysqli_query($link, "select * from purchase_master");

               while ($row=mysqli_fetch_array($res)) {
                   ?>

                   <tr>
                       <td><?php echo $row["company_name"]; ?></td>
                       <td><?php echo $row["product_name"]; ?></td>
                       <td><?php echo $row["unit"]; ?></td>
                       <td><?php echo $row["packing_size"]; ?></td>
                       <td><?php echo $row["quantity"]; ?></td>
                       <td><?php echo $row["price"]; ?></td>
                       <td><?php echo $row["party_name"]; ?></td>
                       <td><?php echo $row["purchase_type"]; ?></td>
                       <td><?php echo $row["expiry_date"]; ?></td>
                       <td><?php echo $row["purchase_date"]; ?></td>
                       <td><?php echo $row["username"]; ?></td>
                      

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


