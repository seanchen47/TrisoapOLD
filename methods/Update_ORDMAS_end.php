<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$ORIGIN = $_SESSION['ORIGIN'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $INVOICENO = $_POST['INVOICENO'];
                date_default_timezone_set('Asia/Taipei');
                $UPDATEDATE = date("Y-m-d H:i:s");
                $sql = "UPDATE ORDMAS SET INVOICENO='$INVOICENO' WHERE ORDNO='$ORDNO'";
                mysql_query($sql);
                $sql = "UPDATE ORDMAS SET ORDSTAT='C', UPDATEDATE='$UPDATEDATE' WHERE ORDNO='$ORDNO'";
                if(mysql_query($sql)){
                        $queryDetail = "SELECT * FROM ORDITEMMAS WHERE ORDNO='$ORDNO'";
                        $Detail = mysql_query($queryDetail);
                        while($item = mysql_fetch_array($Detail)){
                                $ITEMNO = $item['ITEMNO'];
                                $ITEMAMT = $item['ORDAMT'];
                                $amt = "UPDATE ITEMMAS SET ITEMAMT=ITEMAMT-'$ITEMAMT' WHERE ITEMNO='$ITEMNO'";
                                mysql_query($amt);
                        }
                        echo "儲存成功";
                }
                else
                        echo "儲存失敗";
                }
                unset($_SESSION['ORIGIN']);
                if($ORIGIN == '1')
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_1.php>';
                elseif($ORIGIN == 'F')
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_F.php>';
                else
                        echo '<meta http-equiv=REFRESH CONTENT=2;url=Update_ORDMAS_R.php>';
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index_customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index.php>';
}
?>