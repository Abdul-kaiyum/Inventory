
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

$company_id = $_GET["company_id"];

mysqli_query($link, "delete from company_info where company_id=$company_id");


?>

<script type="text/javascript">
	

	window.location = "add_new_company.php";
</script>