<?php session_start(); ?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>三三吾鄉手工皂 管理管理員頁</title>

<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
        		echo "管理員名單：<br>";
                $queryManager = "SELECT * FROM CUSMAS where CUSIDT = 'A'";
                $result = mysql_query($queryManager);
                while($row = mysql_fetch_array($result)){
  					echo "電子信箱:".$row['EMAIL']." 姓名:".$row['CUSNM']."</br>";
  				}
  				echo "<br>";
?>
<a href="Create_Manager.php">新增管理員</a> <br>
<a href="Delete_Manager.php">刪除管理員</a> <br>
<a href="../Homepages/index_manager.php">返回主頁</a> <br>
<?php
        }
        else{
                echo '您無權限觀看此頁面!';
                echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage_Customer.php>';
        }
}
else{
        echo '您無權限觀看此頁面!';
        echo '<meta http-equiv=REFRESH CONTENT=2;url=../HomePage/HomePage.php>';
}