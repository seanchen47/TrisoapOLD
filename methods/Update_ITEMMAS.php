<?php session_start(); ?>
<title>三三吾鄉手工皂 管理商品頁</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
include("mysql_connect.php");
$EMAIL = $_SESSION['EMAIL'];
$CUSIDT = $_SESSION['CUSIDT'];

if($EMAIL != null){
        if($CUSIDT == 'A'){
        		echo "商品列表：<br>";
                $queryITEMMAS = "SELECT * FROM ITEMMAS";
                $result = mysql_query($queryITEMMAS);
                while($row = mysql_fetch_array($result)){
                    $PHOTOTYPE = $row['PHOTOTYPE'];
                    $PHOTO = base64_decode($row['PHOTO']);

  					echo "商品編號:".$row['ITEMNO']." 商品名稱:".$row['ITEMNM']." 商品數量:".$row['ITEMAMT']." 商品價格:".$row['PRICE']." 商品照片:";
                    // echo $PHOTO;
                    echo " 商品描述:".$row['DESCRIPTION']." 狀態:".$row['ACTCODE']."</br>";
  				}
  				echo "<br>";
?>
<a href="Create_ITEMMAS.php">新增商品</a> <br>
<a href="Edit_ITEMMAS.php">更新商品</a> <br>
<a href="Delete_ITEMMAS.php">下架商品</a> <br>
<a href="Upload_ITEMMAS.php">上市商品</a> <br>
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