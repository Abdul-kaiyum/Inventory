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

$customer_id = $_GET["customer_id"];

mysqli_query($link, "delete from customer_info where customer_id=$customer_id");


?>

<script type="text/javascript">
	

	window.location = "add_new_customer.php";
</script>