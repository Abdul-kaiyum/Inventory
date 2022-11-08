


<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Products</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Company</label>
              <div class="controls">
                <select class="span11" name="company_name">
                  

                  <?php
                  $res = mysqli_query($link, "select * from company_info");

                  while ($row=mysqli_fetch_array($res)) {
                    
                      echo "<option>";
                      echo $row["company_name"];
                      echo "</option>";

                  }


                  ?>
                </select>
              </div>
            </div>


            <div class="control-group">
              <label class="control-label">Enter Product Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Product name" name="productname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls">
                <select class="span11" name="unit_name">
                  

                  <?php
                  $res = mysqli_query($link, "select * from units_entry");

                  while ($row=mysqli_fetch_array($res)) {
                    
                      echo "<option>";
                      echo $row["unit_name"];
                      echo "</option>";

                  }


                  ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Packing Size</label>
              <div class="controls">
                <input type="text"  class="span11" placeholder="Product Packing Size" name="product_packing_size" />
              </div>
            </div>

            
            

            

            <div class="alert alert-danger" id="error" style="display: none;">
                This Product Already Exist! Please Try Another

            </div>

           
            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

             <div class="alert alert-success" id="success" style="display: none;">
                Record Inserted Successfully!

            </div>
          </form>
        </div>








      </div>


      <div class="widget-content nopadding">
            <table class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Product ID</th>
                  <th>Company Name</th>
                  <th>Product Name</th>
                  <th>Unit Name</th>
                  <th>Packing Size</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                   $res = mysqli_query($link, "select * from product_info");

                   while ($row =mysqli_fetch_array($res)) {
                       ?>

                       <tr class="">
                  <td><?php echo $row["product_id"]; ?></td>
                  <td><?php echo $row["company_name"]; ?></td>
                  <td><?php echo $row["product_name"]; ?></td>
                  <td><?php echo $row["product_unit"]; ?></td>
                  <td><?php echo $row["packing_size"]; ?></td>
                  
                  <td class="center"> <a href="edit_product.php?product_id=<?php echo $row["product_id"]; ?>" style="color: green;">Edit</a></td>
                  <td class="center"><a href="delete_product.php?product_id=<?php echo $row["product_id"]; ?>" style="color: red; ">Delete</a></td>
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

if (isset($_POST["submit1"])) {
    

$count =0;

$res = mysqli_query($link, "select * from product_info where company_name='$_POST[company_name]' && product_name='$_POST[productname]' && product_unit='$_POST[unit_name]'");

$count= mysqli_num_rows($res);

if ($count>0) {
    

?>

<script type="text/javascript">
    
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";


</script>


<?php




}else{

     mysqli_query($link, "insert into product_info values(NULL, '$_POST[company_name]','$_POST[productname]','$_POST[unit_name]','$_POST[product_packing_size]')") or die(mysqli_error($link));

?>


<script type="text/javascript">
    document.getElementById("error").style.display="none";
    document.getElementById("success").style.display="block";
    

    setTimeout(function(){

        window.location.href = window.location.href;
    },1500);


</script>


<?php


}
}




?>


<?php

include('footer.php');

?>


