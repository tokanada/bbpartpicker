<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <title>Shopping Cart | BBPartPicker</title>
    <link rel="stylesheet" href="styles.css">

</head>

<body>

	<form>
		<h1>Shopping Cart</h1><br><br>
		
		<label for="user">Current User</label>
		<input type="text" id="user" name="user">
		<br><br><br>
		
		<table>
		<thead>
			<tr>
				<th class="parts" colspan="2">Parts</th>
				<th></th>
				<th class="selection" colspan="2">Selection</th>
				<th></th>
				<th class="price" colspan="2">Price</th>
				<th></th>
				<th class="picture" colspan="2">Picture</th>
				<th></th>
			</tr>
			
			<tbody>
				<tr rowspan="2">
					<td class="facebolt">facebolt</td>
				</tr>
				<tr rowspan="2">
					<td class="energyring">energy ring</td>
				</tr>
				<tr rowspan="2">
					<td class="fusionwheel">fusion wheel</td>
				</tr>
				<tr rowspan="2">
					<td class="spintrack">spintrack</td>
				</tr>
				<tr rowspan="2">
					<td class="performancetip">performancetip</td>
				</tr>	
			</tbody>	
		</thead>
		</table>
		
		<br><br>
		<button type="button" id="checkout" name="checkout">Checkout</button>
		
	</form>
</body>