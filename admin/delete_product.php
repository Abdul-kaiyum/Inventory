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

$product_id = $_GET["product_id"];

mysqli_query($link, "delete from product_info where product_id=$product_id");


?>

<script type="text/javascript">
	

	window.location = "add_new_product.php";
</script>