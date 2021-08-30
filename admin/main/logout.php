<?php
session_start();
include("../includes/conn.php");
$_SESSION['username'] == "";
session_unset();
session_destroy();

?>
<script language="javascript">
    document.location = "../index.php";
</script>