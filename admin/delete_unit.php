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

$unit_id = $_GET["unit_id"];

mysqli_query($link, "delete from units_entry where unit_id=$unit_id");


?>

<script type="text/javascript">
	

	window.location = "add_new_unit.php";
</script>