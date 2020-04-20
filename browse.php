<?php

header("Content-type:text/event-stream");		
header('Cache-Control: no-cache');
$username="root";
$passwd="";
$conn=new PDO("mysql:host=localhost;dbname=onlineshop",$username,$passwd);
$array_products=array();
$stmt=$conn->prepare("SELECT * FROM products WHERE product_id BETWEEN 60 AND 80"); 
$stmt->execute();
$conn=null;
while($row=$stmt->fetch(PDO::FETCH_ASSOC))
{
     array_push($array_products,$row);
	 $row1 = $row;

echo "data: $pcode.$pname.$price\n\n";
}



for($i=0;$i<=10;$i++)
{
$pcode=$array_products[$i]["product_id"];
$pname=$array_products[$i+1]["product_title"];
$price=$array_products[$i+2]["product_price"];






echo "event:update\n";
 		echo "retry:100\n";
 		echo "data:$pcode.\n";
		ob_flush();
 		flush();
		echo "data:,$pname.\n";
		ob_flush();
 		flush();
		echo "data:,$price.\n\n";
 		
 		ob_flush();
 		flush();
 		sleep(1);

//echo "data: ".$pcode."\n";
//echo "data: ".$pname."\n";
//echo "data: ".$price."\n";

//flush();
//ob_flush();	


if($i==$row){
echo "data: end\n\n";
flush();
ob_flush();	
}
}








	         
    

?>