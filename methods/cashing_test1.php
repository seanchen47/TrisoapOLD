<?php session_start(); ?>
<!--<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
-->
<?php
include('AllPay.Payment.Integration.php');    //include the AllPay file
include("mysql_connect.php");

$ORDNO = $_SESSION['ORDNO'];                  //get the order node
$sql = "SELECT TOTALAMT FROM ORDMAS where ORDNO = '$ORDNO'";  //get the total amount
$result = mysql_query($sql);
$row = mysql_fetch_row($result);
$totalamount = $row[0];

try {
    $obj = new AllInOne();

    //AllPay Service Parameter
    $obj->ServiceURL = "https://payment-stage.allpay.com.tw/Cashier/AioCheckOut/V2"; //Environment
    $obj->HashKey    = '5294y06JbISpM5x9';                                           //Hashkey
    $obj->HashIV     = 'v77hoKGq4kWxNNIS';                                           //HashIV
    $obj->MerchantID = '2000132';                                                    //MerchantID
    //Basic Order Parameter
    $obj->Send['ReturnURL']         = "http://140.112.222.143/methods/cashing_feedback.php" ;    //付款完成通知回傳的網址
    $TradeNo = "Test".time();
    $obj->Send['MerchantTradeNo']   = $TradeNo;                             //Order_id  "Test".time()
    $obj->Send['MerchantTradeDate'] = date("Y/m/d H:i:s");                        //Order_time
    $obj->Send['TotalAmount']       = $totalamount;                               //Order_amount
    $obj->Send['TradeDesc']         = "trisoap";                                  //Order_Description
    $obj->Send['ChoosePayment']     = PaymentMethod::ALL;                         //Payment Method
    $obj->Send['ClientBackURL']     = "http://140.112.222.143/Homepages/index.php";    //get back to HomePage
    $sql = "UPDATE ORDMAS SET MerchantTradeNo = '$TradeNo' WHERE ORDNO = '$ORDNO'";
    mysql_query($sql);

    //Order Item Lists
    $ItemNo = array("ItemNo");
    $ItemName = array("ItemName");
    $Price = array(0);
    $ItemAmount = array(0);

    $sql = "SELECT ITEMNO FROM ORDITEMMAS where ORDNO = '$ORDNO'";
    $no_result = mysql_query($sql);
    while($no_row = mysql_fetch_row($no_result, MYSQL_NUM)){         //get item node
        $node = $no_row[0];
        $sql = "SELECT ITEMNM FROM ITEMMAS where ITEMNO = '$node'";  //get item name
        $nm_result = mysql_query($sql);
        $nm_row = mysql_fetch_row($nm_result);
        $name = $nm_row[0];
        array_push($ItemName, $name);

        $sql = "SELECT PRICE FROM ITEMMAS where ITEMNO = '$node'";  //get item price
        $p_result = mysql_query($sql);
        $p_row = mysql_fetch_row($p_result);
        $price = $p_row[0];
        array_push($Price, $price);
    }

    $sql = "SELECT ORDAMT FROM ORDITEMMAS where ORDNO = '$ORDNO'";  //get item amount
    $amt_result = mysql_query($sql);
    $number = mysql_num_rows($amt_result);
    while($amt_row = mysql_fetch_row($amt_result, MYSQL_NUM)){
        $amt = $amt_row[0];
        array_push($ItemAmount, $amt);
    }

    $sql = "SELECT SHIPFEE FROM ORDMAS where ORDNO = '$ORDNO'";  //get shipfee
    $fee_result = mysql_query($sql);
    $fee_row = mysql_fetch_row($fee_result);
    $shipfee = $fee_row[0];

    for($i=1; $i<=$number; $i++){
    	array_push($obj->Send['Items'], array('Name' => $ItemName[$i], 'Price' => $Price[$i],
               'Currency' => "元", 'Quantity' => $ItemAmount[$i], 'URL' => "xxx"));
    }
    array_push($obj->Send['Items'], array('Name' => "運費", 'Price' => $shipfee,
        'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "xxx"));
    
    //Create Order(auto submit to AllPay)
    $obj->CheckOut();
      
    //Exception
    } catch (Exception $e) {
    	echo $e->getMessage();
    } 

?>