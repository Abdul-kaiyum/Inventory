<?php
include "../connection.php";

// $company_name =$_GET["company_name"];


$company_name =$_GET["company_name"];

$product_name =$_GET["product_name"];

$unit_name =$_GET["unit_name"];

$packing_size =$_GET["packing_size"];





// $company_name = (isset($_GET['company_name']) ? $_GET['company_name'] : '');

// $product_name = (isset($_GET['product_name']) ? $_GET['product_name'] : '');

$res = mysqli_query($link, "select * from stock_master where product_company='$company_name' && product_name='$product_name' && product_unit='$unit_name' && packing_size='$packing_size' ") or die(mysqli_error($link));


while ($row = mysqli_fetch_array($res) ){
	echo $row["product_selling_price"];
}



?>



