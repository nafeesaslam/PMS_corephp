<?php
session_start();
unset($_SESSION);
session_destroy();
session_write_close();
header("Refresh:0; url=Login.php");
die;
?>