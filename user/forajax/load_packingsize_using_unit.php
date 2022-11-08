<?php
include "../connection.php";

// $company_name =$_GET["company_name"];


$company_name =$_GET["company_name"];

$product_name =$_GET["product_name"];

$unit_name =$_GET["unit_name"];





// $company_name = (isset($_GET['company_name']) ? $_GET['company_name'] : '');

// $product_name = (isset($_GET['product_name']) ? $_GET['product_name'] : '');

$res = mysqli_query($link, "select * from product_info where product_name='$product_name' && company_name='$company_name' && product_unit='$unit_name' ");



?>

<select class="span11" name="packing_size" id="packing_size">
<option>Select</option>


<?php

while ( $row=mysqli_fetch_array($res)) {
	
echo "<option>";
echo $row["packing_size"];
echo "</option>";



}

echo "</select>";



?>

