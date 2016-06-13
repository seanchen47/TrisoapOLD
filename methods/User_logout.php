<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
unset($_SESSION['EMAIL']);
unset($_SESSION['CUSIDT']);
unset($_SESSION['ITEMNO']);
unset($_SESSION['ORDNO']);
//echo "請稍等...<br>";
echo '<meta http-equiv=REFRESH CONTENT=1;url=../Homepages/index.php>';
?>