<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("../methods/mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];
$message = null;

if($EMAIL != null){
        if($CUSIDT == 'A'){
                $newEMAIL = $_POST['newEMAIL'];
                $PW = $_POST['CUSPW'];
                $queryPW = "SELECT CUSPW FROM CUSMAS where EMAIL = '$EMAIL'";
                $result = mysql_query($queryPW);
                $row = mysql_fetch_row($result);
                if($PW != $row[0]){
                        $message = $message . '密碼錯誤<br>';
                }

                if($message == null){
                        $sql = "UPDATE CUSMAS SET CUSIDT='A' WHERE EMAIL='$newEMAIL'";
                        if(mysql_query($sql)){
                                ?>
                                <script>
                                    alert("新增成功");
                                </script>
                                <?php
                                echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Update_Manager.php>';
                        }
                        else{
                                ?>
                                <script>
                                    alert("新增失敗");
                                </script>
                                <?php
                                echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Create_Manager.php>';
                        }
                }
                else{
                        ?>
                        <script>
                            alert("密碼錯誤");
                        </script>
                        <?php
                        echo '<meta http-equiv=REFRESH CONTENT=0.5;url=Create_Manager.php>';
                }
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