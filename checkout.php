<?php 
session_start();
?>
<HTML>
<HEAD>
<TITLE>Shopping Cart</TITLE>
<link href="styles.css" type="text/css" rel="stylesheet" />
</HEAD>
<BODY>
<div id="shopping-cart">
<div class="txt-heading">Shopping Cart</div>
<?php
    $total_quantity = 0;
    $total_price = 0;
?>
<form action="action.php" method="POST">
      
      <div class="row">
        <div class="col-50">
          <h3>Billing Address</h3>
          <label for="firstname"><i class="fa fa-user"></i> First Name</label>
          <input type="text" id="firstname" name="firstname" placeholder="Enter firstname">
          <label for="lastname"><i class="fa fa-envelope"></i> Last Name</label>
           <input type="text" id="lastname" name="lastname" placeholder="Enter lastname">
         
          </div>
        </div>

        <div class="col-50">
          <h3>Payment</h3>
          
          <label for="nameoncard">Name on Card</label>
          <input type="text" id="nameoncard" name="nameoncard" placeholder="ex:John More Doe">
          <label for="cardnumber">Card number</label>
          <input type="text" id="cardnumber" name="cardnumber" placeholder="ex:1111-2222-3333-4444">
          <label for="expmonth">Exp Month</label>
          <input type="text" id="expmonth" name="expmonth" placeholder="Ex:04">
          <div class="row">
            <div class="col-50">
              <label for="expyear">Exp Year</label>
              <input type="text" id="expyear" name="expyear" placeholder="Ex:2018">
            </div>
            <div class="col-50">
              <label for="cvv">CVV</label>
              <input type="text" id="cvv" name="cvv" placeholder="Ex:352">
            </div>
          </div>
        </div>
        
      
      <input type="submit" value="Continue to checkout" name="submit" id="clear_cart"  class="btn">
    </form>
<table class="tbl-cart" cellpadding="10" cellspacing="1">
<tbody>
<tr>
<th style="text-align:left;">Name</th>
<th style="text-align:left;">Code</th>
<th style="text-align:right;" width="5%">Quantity</th>
<th style="text-align:right;" width="10%">Unit Price</th>
<th style="text-align:right;" width="10%">Price</th>
</tr>	
<?php		
    foreach ($_SESSION["cart_item"] as $item){
        $item_price = $item["quantity"]*$item["price"];
		?>
				<tr>
				<td><img src="<?php echo $item["image"]; ?>" class="cart-item-image" /><?php echo $item["name"]; ?></td>
				<td><?php echo $item["code"]; ?></td>
				<td style="text-align:right;"><?php echo $item["quantity"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ".$item["price"]; ?></td>
				<td  style="text-align:right;"><?php echo "$ ". number_format($item_price,2); ?></td>
				</tr>
				<?php
				$total_quantity += $item["quantity"];
				$total_price += ($item["price"]*$item["quantity"]);
		}
		?>

<tr>
<td colspan="2" align="right">Total:</td>
<td align="right"><?php echo $total_quantity; ?></td>
<td align="right" colspan="2"><strong><?php echo "$ ".number_format($total_price, 2); ?></strong></td>
<td></td>
</tr>
</tbody>
</table>
</div></BODY>
</HTML>