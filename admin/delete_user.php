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

$user_id = $_GET["user_id"];

mysqli_query($link, "delete from user_registration where user_id=$user_id");


?>

<script type="text/javascript">
	

	window.location = "add_new_user.php";
</script>