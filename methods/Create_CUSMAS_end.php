<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$VERIFY = $_POST['VERIFY'];
if($VERIFY == $_SESSION['COMMIT']){
        $CUSNM = $_SESSION['CUSNM'];
        $CUSPW = $_SESSION['CUSPW'];
        $CUSADD = $_SESSION['CUSADD'];
        $CUSTYPE = $_SESSION['CUSTYPE'];
        $CUSBIRTHY = $_SESSION['CUSBIRTHY'];
        $CUSBIRTHM = $_SESSION['CUSBIRTHM'];
        $CUSBIRTHD = $_SESSION['CUSBIRTHD'];
        $TEL = $_SESSION['TEL'];
        $EMAIL = $_SESSION['EMAIL'];
        $TAXID = $_SESSION['TAXID'];
        $KNOWTYPE = $_SESSION['KNOWTYPE'];
        $SPEINS = $_SESSION['SPEINS'];
        date_default_timezone_set('Asia/Taipei');
        $CREATEDATE = date("Y-m-d H:i:s");
        $UPDATEDATE = date("Y-m-d H:i:s");
        $sql = "insert into CUSMAS (CUSNM, CUSPW, CUSADD, CUSTYPE, CUSBIRTHY, CUSBIRTHM, CUSBIRTHD, TEL, EMAIL, TAXID, KNOWTYPE, SPEINS, CREATEDATE, UPDATEDATE) values ('$CUSNM', '$CUSPW', '$CUSADD', '$CUSTYPE', '$CUSBIRTHY', '$CUSBIRTHM', '$CUSBIRTHD', '$TEL', '$EMAIL', '$TAXID', '$KNOWTYPE', '$SPEINS', '$CREATEDATE', '$UPDATEDATE')";
        if(mysql_query($sql)){
                $_SESSION['CUSIDT'] = 'B';
                ?>
                <script>
                alert("註冊成功");
                </script>
                <?php
                unset($_SESSION['CUSNM']);
                unset($_SESSION['CUSPW']);
                unset($_SESSION['CUSADD']);
                unset($_SESSION['CUSTYPE']);
                unset($_SESSION['CUSBIRTHY']);
                unset($_SESSION['CUSBIRTHM']);
                unset($_SESSION['CUSBIRTHD']);
                unset($_SESSION['TEL']);
                unset($_SESSION['TAXID']);
                unset($_SESSION['KNOWTYPE']);
                unset($_SESSION['SPEINS']);
                unset($_SESSION['COMMIT']);
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePages/index_customer.php>';
        }
        else{
                ?>
                <script>
                alert("系統錯誤，註冊失敗");
                </script>
                <?php
                unset($_SESSION['COMMIT']);
                echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS1.php>';
        }
}
else{
        ?>
        <script>
        alert("驗證碼錯誤，註冊失敗");
        </script>
        <?php
        unset($_SESSION['COMMIT']);
        echo '<meta http-equiv=REFRESH CONTENT=2;url=Create_CUSMAS1.php>';
}