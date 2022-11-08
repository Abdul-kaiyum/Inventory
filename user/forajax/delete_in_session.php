<?php

session_start();

$session_id = isset( $_GET['session_id']) ? $_GET['session_id'] : '' ;

// $b = array("company_name"=>"", "product_name"=>"", "unit_name"=>"", "packing_size"=>"","price"=>"","qty"=>"");

// $_SESSION['cart'][$session_id]=$b;

if($session_id !="" && isset($_SESSION['cart'][$session_id]))
{
   
unset($_SESSION['cart'][$session_id]);

echo "delete succeses";

}else {
	echo "session is not distroyed";
}

?>


