
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

$stock_id = $_GET["stock_id"];

mysqli_query($link, "delete from stock_master where stock_id=$stock_id");


?>

<script type="text/javascript">
	

	window.location = "stock_master.php";
</script>