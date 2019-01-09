<html>

<html lang = "en">
	<head>
	<title> proj3PHP.php </title>
		<meta charset = "utf-8" />
	</head>

	<body>
	<p>
		<?php
		
		//variables from form
		$model1 = $_POST["model1"];
		$model2 = $_POST["model2"];
		$model3 = $_POST["model3"];
		
		$state = $_POST["State"];
		
		//quantity check
		if ($model1 == "") {$model1 = 0;}
		if ($model2 == "") {$model2 = 0;}
		if ($model3 == "") {$model3 = 0;}
		
		//calculate item cost + total cost
		$model1COST = 10.35 * $model1;
		$model2COST = 14.99 * $model2;
		$model3COST = 25.19 * $model3;
		
		$totalQuantity = $model1 + $model2 + $model3;
		$subTotalPrice = $model1COST + $model2COST + $model3COST;
		
		if ($totalQuantity > 40) 
			{$discounts = $subTotalPrice * .062;}
			else {$discounts = 0;}
		
		if ($totalQuantity < 25) 
			{$shipping = 8.74;}
			else {$shipping = 15.35;}
			
		if ($state = "ND") 
			{$salesTax = $subTotalPrice * .036;}
			elseif ($state = "CA") {$salesTax = ($subTotalPrice + $shipping) * .06375;}
				else {$salesTax = 0;}
		
		$finalTotal = ($subTotalPrice - $discounts) + $shipping + $salesTax;
		?>
		</p>
		<p>
		<table>
			<caption> Order Information Summary </caption>
			
			<tr>
				<th width="150" height="31"> Item Description </th>
				<th align="center" width="100" height="31"> Item Price </th>
				<th align="center" width="100" height="31"> Quantity Ordered </th>
				<th align="right" height="31" width="60"> Item Cost </th>
			</tr>
			<tr>
				<td align="center" width="100"> Model 37AX-L </td>
				<td align="center" width="100"> $10.35 </td>
				<td align="right" width="60"> <?php print ("$model1"); ?> </td>
				<td align="right" width="140"> <?php printf ("$ %4.2f", $model1COST); ?> </td>
			</tr>
			<tr>
				<td align="center" width="100"> Model 42XR-J </td>
				<td align="center" width="100"> $14.99 </td>
				<td align="right" width="60"> <?php print ("$model2"); ?> </td>
				<td align="right" width="140"> <?php printf ("$ %4.2f", $model2COST); ?> </td>
			</tr>
			<tr>
				<td align="center" width="100"> Model 93ZZ-A </td>
				<td align="center" width="100"> $25.19 </td>
				<td align="right" width="60"> <?php print ("$model3"); ?> </td>
				<td align="right" width="140"> <?php printf ("$ %4.2f", $model3COST); ?> </td>
			</tr>
		</table>
		</p>
		<p /> <p />
		
		<p>
		<?php 
			print "You ordered $totalQuantity Widgets <br />";
			printf ("Your subtotal was: $ %5.2f <br />", $subTotalPrice);
			printf ("Your discounts are: $ %5.2f <br />", $discounts);
			printf ("Your sales tax is: $ %5.2f <br />", $salesTax);
			printf ("Your final total is: $ %5.2f <br />", $finalTotal);
			print "Thanks for shopping with us <br />";
		?>
		</p>
	</body>
</html>
				