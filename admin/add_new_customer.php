


<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Customer</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Customer</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">First Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="firstname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" name="lastname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Businessman Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Businessman Name" name="businessmen" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Contact no" name="contact" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">

                <textarea class="span11" placeholder="Customer address" name="customeraddress"></textarea>
                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">City :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="City Name" name="cityname" />
              </div>
            </div>
            

            
            

<!-- 
            <div class="alert alert-danger" id="error" style="display: none;">
                This Username Already Exist! Please Try Another

            </div> -->

           
            
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
                  <th>First Name</th>
                  <th>Last Name</th>
                  <th>Businessman Name</th>
                  <th>Contact</th>
                  <th>Address</th>
                  <th>city</th>
                  
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                   $res = mysqli_query($link, "select * from customer_info");

                   while ($row =mysqli_fetch_array($res)) {
                       ?>

                       <tr class="">
                  <td><?php echo $row["firstname"]; ?></td>
                  <td><?php echo $row["lastname"]; ?></td>
                  <td><?php echo $row["businessman_name"]; ?></td>
                  <td><?php echo $row["contact"]; ?></td>
                  <td><?php echo $row["address"]; ?></td>
                  <td><?php echo $row["city"]; ?></td>
                  <td class="center"> <a href="edit_customer.php?customer_id=<?php echo $row["customer_id"]; ?>" style="color: green;">Edit</a></td>
                  <td class="center"><a href="delete_customer.php?customer_id=<?php echo $row["customer_id"]; ?>" style="color: red; ">Delete</a></td>
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
    

// $count =0;

// $res = mysqli_query($link, "select * from customer_info where businessman_name='$_POST[businessmen]'");

// $count= mysqli_num_rows($res);

// if ($count>0) {

  mysqli_query($link, "insert into customer_info values(NULL, '$_POST[firstname]','$_POST[lastname]','$_POST[businessmen]','$_POST[contact]','$_POST[customeraddress]','$_POST[cityname]')") or die(mysql_error($link));
    

?>

<!-- <script type="text/javascript">
    
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";


</script> -->




<script type="text/javascript">
    // document.getElementById("error").style.display="none";
    document.getElementById("success").style.display="block";
    

    setTimeout(function(){

        window.location.href = window.location.href;
    },1500);


</script>


<?php




}

     

?>








<?php

include('footer.php');

?>


