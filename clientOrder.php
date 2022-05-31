<?php require_once '../php_action/db_connect.php';?>
<?php 
$Productprice = isset($_GET['price']) ? strval($_GET['price']) : null;
$flag=0;
	 if(isset($_POST["submit"])) {
   $clientName= $_POST['clientName'];
   $clientContact= $_POST['clientContact'];
   $orderQuantity= $_POST['quantity'];
   $totalPrice=$Productprice * $orderQuantity;
		
	 $sql = "INSERT INTO orders (order_date, client_name, client_contact, sub_total, vat, total_amount, discount, grand_total, paid, due, payment_type, payment_status,payment_place, gstn,order_status,user_id) 
	 VALUES (CURDATE(),'$clientName', '$clientContact', '0', '0', '$totalPrice', '0', '0', '0','0', 1, 1,1,'gstn', 1,0)";

	 if($connect->query($sql) === true) {
	 	echo "Order Placed Succesfully";
		 $flag=1;

	 }else {
		
	 	echo "Insertion Error";
	 }

		
	
 if($flag==1){
	sleep(12);
 header("location: ../public/home.php");
 }
}




?>



