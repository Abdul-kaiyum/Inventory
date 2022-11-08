



<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Purchase</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Purchase</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Select Company</label>
              <div class="controls">
                <select class="span11" name="company_name" id="company_name" onchange="select_company(this.value)">

                  <option>Select</option>
                  

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
              <label class="control-label">Select Product Name :</label>
              <div class="controls" id="product_name_div">
                <select class="span11">
                       <option>Select</option>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select Unit</label>
              <div class="controls" id="unit_name_div">
                <select class="span11">
                  <option>Select</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Product Packing Size</label>
              <div class="controls" id="packing_size_div">
                <select class="span11">
                       <option>Select</option>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Enter Qty</label>
              <div class="controls" id="qty_size">
                 <input type="text" name="qty" id="qty" value="0" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Enter Price</label>
              <div class="controls" id="city_name">
                 <input type="text" name="price" id="price" value="0" class="span11">
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Select Party Name</label>
              <div class="controls">
                <select class="span11" name="party_name">

                       <?php

                       $res = mysqli_query($link, "select * from customer_info");

                          while ( $row=mysqli_fetch_array($res)) {
                            
                          echo "<option>";
                          echo $row["businessman_name"];
                          echo "</option>";



                          }

                        

                            ?>

                              

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Select purchase type</label>
              <div class="controls">
                <select class="span11" name="purchase_type" id="purchase_type">
                       <option>Cash</option>
                        <option>Debit</option>

                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Exipary date</label>
              <div class="controls" id="city_name">
                 <input type="text" name="dt" id="dt" class="span11" placeholder="YYYY-MM-dd" required-pattern="\d{4}-\d{2}-\d{2}">
              </div>
            </div>

            


           
            
            <div class="form-actions">
              <button type="submit" name="submit1" class="btn btn-success">Purchase Now</button>
            </div>

             <div class="alert alert-success" id="success" style="display: none;">
                Purchase Inserted Successfully!

            </div>
          </form>
        </div>








      </div>


     


      
    </div>
        </div>

    </div>
</div>

<script type="text/javascript">
  
  function select_company(company_name){

    var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange  = function () {
        if (xmlhttp.readyState== 4 && xmlhttp.status==200) {

          
         document.getElementById("product_name_div").innerHTML=xmlhttp.responseText;




        }
      }

      xmlhttp.open("GET", "forajax/load_product_using_compnay.php?company_name="+company_name, true);
      xmlhttp.send();

  }


  function select_product(product_name,company_name) {
    
               var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange  = function () {
        if (xmlhttp.readyState== 4 && xmlhttp.status==200) {

          
         document.getElementById("unit_name_div").innerHTML=xmlhttp.responseText;




        }
      }

      xmlhttp.open("GET", "forajax/load_unit_using_product.php?product_name="+product_name+"&company_name="+company_name, true);
      xmlhttp.send();

  }


  function select_unit(unit_name,product_name,company_name){

       var xmlhttp = new XMLHttpRequest();

      xmlhttp.onreadystatechange  = function () {
        if (xmlhttp.readyState== 4 && xmlhttp.status==200) {

          
         document.getElementById("packing_size_div").innerHTML=xmlhttp.responseText;




        }
      }

      xmlhttp.open("GET", "forajax/load_packingsize_using_unit.php?unit_name="+unit_name+"&product_name="+product_name+"&company_name="+company_name, true);
      xmlhttp.send();



  }
</script>


<?php

if (isset($_POST["submit1"])) {

  $today_date = date("Y-m-d");
    
        mysqli_query($link, "insert into purchase_master values(NULL, '$_POST[company_name]','$_POST[product_name]','$_POST[unit_name]','$_POST[packing_size]','$_POST[qty]','$_POST[price]','$_POST[party_name]','$_POST[purchase_type]','$_POST[dt]', '$today_date', '$_SESSION[admin]')") or die(mysqli_error($link));


        $count = 0;

        $res = mysqli_query($link, "select * from stock_master where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit_name]'") or die(mysqli_error($link));

        $count = mysqli_num_rows($res);
        if ($count==0) {
          mysqli_query($link, "insert into stock_master values(NULL, '$_POST[company_name]','$_POST[product_name]','$_POST[unit_name]','$_POST[packing_size]','$_POST[qty]','$_POST[price]')") or die(mysqli_error($link));
          
        }else{


          mysqli_query($link, "update stock_master set  product_qty=product_qty+$_POST[qty] where product_company='$_POST[company_name]' && product_name='$_POST[product_name]' && product_unit='$_POST[unit_name]'  " ) or die(mysqli_error($link));


        }

?>

<script type="text/javascript">
  
         document.getElementById("success").style.display="block";



</script>


<?php



}




?>


<?php

include('footer.php');

?>


