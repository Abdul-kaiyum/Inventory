





<?php

include('header.php');
include "connection.php";

$product_id = $_GET["product_id"];

$company_name ="";
$product_name ="";
$product_unit ="";
$packing_size ="";

$res = mysqli_query($link, "select * from product_info where product_id=$product_id");

while ($row=mysqli_fetch_array($res)) {
    $company_name = $row["company_name"];
    $product_name = $row["product_name"];
    $product_unit = $row["product_unit"];
    $packing_size = $row["packing_size"];
   

}

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Edit Products</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Edit Products</h5>
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
                    
                      ?>
                    <option <?php if($row['company_name']==$company_name){ echo "selected";}?>>
                    
                     <?php
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
                <input type="text" class="span11" placeholder="Product name" name="productname" value="<?php echo $company_name; ?>" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls">
                <select class="span11" name="unit_name">
                  

                  <?php
                  $res = mysqli_query($link, "select * from units_entry");

                  while ($row=mysqli_fetch_array($res)) {

                    ?>
                    <option <?php if($row['unit_name']==$product_unit){ echo "selected";}?>>
                    
                     <?php
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
                <input type="text"  class="span11" placeholder="Product Packing Size" name="product_packing_size" value="<?php echo $packing_size; ?>" />
              </div>
            </div>

            
            

            

            <div class="alert alert-danger" id="error" style="display: none;">
                This Product Already Exist! Please Try Another

            </div>

           
            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Save</button>
            </div>

             <div class="alert alert-success" id="success" style="display: none;">
                Record Updated Successfully!

            </div>
          </form>
        </div>








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

     // mysqli_query($link, "insert into product_info values(NULL, '$_POST[company_name]','$_POST[productname]','$_POST[unit_name]','$_POST[product_packing_size]')") or die(mysqli_error($link));

  mysqli_query($link, "update product_info set company_name='$_POST[company_name]',product_name='$_POST[productname]',product_unit='$_POST[unit_name]',packing_size='$_POST[product_packing_size]' where product_id=$product_id") or mysqli_error($link);

?>


<script type="text/javascript">
    document.getElementById("error").style.display="none";
    document.getElementById("success").style.display="block";
    

    setTimeout(function(){

        window.location="add_new_product.php";
    },1000);


</script>


<?php


}
}




?>


<?php

include('footer.php');

?>


