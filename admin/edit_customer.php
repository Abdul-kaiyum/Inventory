







<?php

include('header.php');
include "connection.php";

$customer_id = $_GET["customer_id"];

$firstname ="";
$lastname ="";
$businessmen ="";
$contact ="";
$customeraddress = "";
$cityname ="";
$res = mysqli_query($link, "select * from customer_info where customer_id=$customer_id");

while ($row=mysqli_fetch_array($res)) {
    $firstname = $row["firstname"];
    $lastname = $row["lastname"];
    $businessmen = $row["businessman_name"];
    $contact = $row["contact"];
    $customeraddress = $row["address"];
    $cityname = $row["city"];


}

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Home</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="background-color: white; min-height: 1000px; padding:10px;">
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
                <input type="text" class="span11" placeholder="First name" value=" <?php echo $firstname; ?>" name="firstname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Last Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Last name" value=" <?php echo $lastname; ?>" name="lastname" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Businessman Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Businessman Name" value=" <?php echo $businessmen; ?>" name="businessmen" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Contact :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="Contact no" value=" <?php echo $contact; ?>" name="contact" />
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Address</label>
              <div class="controls">

                <textarea class="span11" placeholder="Customer address" name="customeraddress"><?php echo htmlspecialchars($customeraddress); ?></textarea>
                
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">City :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="City Name" value=" <?php echo $cityname; ?>" name="cityname" />
              </div>
            </div>
            

            
            


            <div class="alert alert-danger" id="error" style="display: none;">
                This Username Already Exist! Please Try Another

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


     


      
    </div>


        </div>

    </div>
</div>


<?php


if (isset($_POST["submit1"])) {

    mysqli_query($link, "update customer_info set firstname='$_POST[firstname]',lastname='$_POST[lastname]',businessman_name='$_POST[businessmen]',contact='$_POST[contact]',address='$_POST[customeraddress]',city='$_POST[cityname]' where customer_id=$customer_id") or die(mysqli_error($link));

    ?>


    <script type="text/javascript">
    
    document.getElementById("success").style.display="block";
    

    setTimeout(function(){

        window.location="add_new_customer.php";
    },1500);


</script>




    <?php
    
}


?>



<?php

include('footer.php');

?>


