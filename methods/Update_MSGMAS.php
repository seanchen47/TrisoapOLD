<?php session_start(); ?>
<title>三三吾鄉手工皂 管理留心語頁</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
        		echo "留心語列表：<br>";
                $queryMSGMAS = "SELECT * FROM MSGMAS WHERE ACTCODE='1'";
                $result = mysql_query($queryMSGMAS);
                while($row = mysql_fetch_array($result)){
  					echo "留言編號:".$row['MSGNO']." 顧客編號:".$row['EMAIL']." 留言文字:".$row['MSGTXT']." 留言照片/影片:";
                    // 顯示影片或照片
                    echo " 留言狀態:".$row['MSGSTAT']." 建立日期:".$row['CREATEDATE']." 發佈日期:".$row['PUBLICDATE']."</br>";
  				}
  				echo "<br>";
?>
<a href="Update_MSGMAS_A.php">待審核留言</a> <br>
<a href="Update_MSGMAS_B.php">已通過留言</a> <br>
<a href="Update_MSGMAS_C.php">未通過留言</a> <br>
<a href="Update_MSGMAS_D.php">公開中留言</a> <br>
<a href="Update_MSGMAS_E.php">典藏留言</a> <br>
<a href="../HomePages/index_manager.php">返回主頁</a> <br>
<?php
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