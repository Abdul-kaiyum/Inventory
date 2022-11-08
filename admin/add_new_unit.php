


<?php

include('header.php');
include "connection.php";

?>
<!--main-container-part-->
<div id="content">
    <!--breadcrumbs-->
    <div id="content-header">
        <div id="breadcrumb"><a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>
            Add New Unit</a></div>
    </div>
    <!--End-breadcrumbs-->

    <!--Action boxes-->
    <div class="container-fluid">

        <div class="row-fluid" style="">
            <div class="span12">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Add New Unit</h5>
        </div>
        <div class="widget-content nopadding">
          <form name="form1" action="" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Unit Name :</label>
              <div class="controls">
                <input type="text" class="span11" placeholder="First name" name="unitname" />
              </div>
            </div>
           
           

            

            <div class="alert alert-danger" id="error" style="display: none;">
                This Username Already Exist! Please Try Another

            </div>

           
            
            <div class="form-actions">
              <button type="submit" name="submit2" class="btn btn-success">Save</button>
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
                  <th>Unit Id</th>
                  <th>Unit Name</th>
                  <th>Edit</th>
                  <th>Delete</th>
                </tr>
              </thead>
              <tbody>

                <?php
                   $res = mysqli_query($link, "select * from units_entry");

                   while ($row =mysqli_fetch_array($res)) {
                       ?>

                       <tr class="">


                  <td><?php echo $row["unit_id"]; ?></td>
                  <td><?php echo $row["unit_name"]; ?></td>
                  
                  
                  <td class="center"> <center> <a href="edit_unit.php?unit_id=<?php echo $row["unit_id"]; ?>" style="color: green;">Edit</a></center></td>
                  <td class="center"><center><a href="delete_unit.php?unit_id=<?php echo $row["unit_id"]; ?>" style="color: red;">Delete</a></center></td>
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

if (isset($_POST["submit2"])) {
    

$count =0;

$res = mysqli_query($link, "select * from units_entry where unit_name='$_POST[unitname]'") or die(mysqli_error($link));

$count= mysqli_num_rows($res);

if ($count>0) {
    

?>

<script type="text/javascript">
    
    document.getElementById("success").style.display="none";
    document.getElementById("error").style.display="block";


</script>


<?php




}else{

     mysqli_query($link, "insert into units_entry values(NULL, '$_POST[unitname]')");

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


