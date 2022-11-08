<?php
include "../connection.php";

// $company_name =$_GET["company_name"];


$company_name =$_GET["company_name"] or die($link);

$product_name =$_GET["product_name"] or die($link);





// $company_name = (isset($_GET['company_name']) ? $_GET['company_name'] : '');

// $product_name = (isset($_GET['product_name']) ? $_GET['product_name'] : '');

$res = mysqli_query($link, "select * from product_info where product_name='$product_name' && company_name='$company_name' ");



?>

<select class="span11" name="unit_name" id="unit_name" onchange="select_unit(this.value, '<?php echo $product_name; ?>','<?php echo $company_name;?>')">
<option>Select</option>


<?php

while ( $row=mysqli_fetch_array($res)) {
	
echo "<option>";
echo $row["product_unit"];
echo "</option>";



}

echo "</select>";



?>

