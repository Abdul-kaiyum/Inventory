<?php
session_start();
   if (!isset($_SESSION["admin"])) {
        ?>
        <script type="text/javascript">
            window.location="index.php"

        </script>

        <?php
   }

?>




<?php


include "connection.php";


$billing_d_id= $_GET['billing_d_id'];
$bill_id = "";
$product_company = "";
$product_name = "";
$product_unit = "";
$product_size="";
$price = "";
$qty = "";
$total = 0;

$res = mysqli_query($link, "select * from billing_deatail where billing_d_id='$billing_d_id'");

while ($row = mysqli_fetch_array($res)) {
	$bill_id = $row["bill_id"];
	$product_company = $row["product_company"];
	$product_name = $row["product_name"];
	$product_unit = $row["product_unit"];
	$product_size = $row["product_size"];
	$price = $row["price"];
	$qty = $row["qty"];
	$total = $price*$qty;
}

$bill_no = "";

$res2 = mysqli_query($link, "select * from billing_header where billion_id=$bill_id");

while($row2=mysqli_fetch_array($res2)){

     $bill_no = $row2["bill_no"];
}



// echo $qty;

$today_date = date('Y-m-d');


mysqli_query($link, "insert into return_products values(NULL, '$_SESSION[admin]','$bill_no', '$today_date','$product_company','$product_name','$product_unit','$product_size','$price','$qty','$total') ");
mysqli_query($link, "update stock_master set product_qty=product_qty+$qty where product_company='$product_company' && product_name='$product_name' && product_unit='$product_unit' && packing_size='$product_size'  ");

mysqli_query($link, "delete from billing_deatail where billing_d_id=$billing_d_id");



?>

<script type="text/javascript">
	
	alert("Product Take As a Return Successfully");
	window.location = "view_bill_details.php?billion_id=<?php echo $bill_id?>";
</script>