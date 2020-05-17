<?php
session_start();
if(isset($_POST["submit"])){
	
	$con=mysqli_connect("localhost","root","","store");
	$link = mysqli_connect("localhost", "root", "", "store"); 
    $firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$nameoncard=$_POST['nameoncard'];
    $cardnumber=$_POST['cardnumber'];
	$expmonth=$_POST['expmonth'];
	$expyear=$_POST['expyear'];
	$cvv=$_POST['cvv'];
    if(!empty($_POST['firstname']) && !empty($_POST['firstname'])) {
	   $query=mysqli_query($con,"SELECT * FROM insertinventory WHERE firstname='".$firstname."' AND lastname='".$lastname."' ");
	   $numrows=mysqli_num_rows($query);
	   if($numrows==0) 
	{
	$sql="INSERT INTO insertinventory(firstname,lastname,nameoncard,cardnumber,expmonth,expyear,cvv) VALUES('$firstname','$lastname','$nameoncard',
	'$cardnumber','$expmonth','$expyear','$cvv')";

	$result=mysqli_query($con,$sql);
	if($result){
		foreach ($_SESSION["cart_item"] as $item){
			$sql2 = "UPDATE tblproduct SET quantity=quantity-".$item["quantity"]." WHERE code='".$item["code"]."'"; 
				if(mysqli_query($link, $sql2)){ 
				}
		}		
?>
<script>
		alert('succesfully stored');
        window.location.href='index.php';
        </script>
		<?php
	session_destroy();
 echo"<script> window.location.href = 'index.php' ; </script>";
 exit();

	} else{
		echo $con->error;
	}
	}else {
		?>
			<script>
			alert('plz enter different Names');
			window.location.href='index.php';
			</script>
			<?php
		}
	
}
}
?>