<html>
<head>
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0;">
<?php include_once('jquery.php');?>
<?php include_once('bootstrap.php');?>
<?php include_once('stylesheets.php');?>
<script>
	var count = 1;
	$(document).ready(function(){
		$('#addRow').click(function(e){
			e.preventDefault();
			addRow();
		});
		$('.deleteRow').click(function(e){
			var id = parseInt($(this).attr('id').replace('deleteRow', ''));
			deleteRow(id);
			rearrange();
		});
	});
	function addRow() {
		count++;
		var html = '';
		html += '<tr id="itemRow' + count + '">';
		html += '<td><span class="itemNo">' + count + '</span></td>';
		html += '<td><select name="productId[]" class="form-control"></select></td>';
		html += '<td><input type="text" size="5" name="quantity[]" class="form-control" style="width: 50px"></td>';
		html += '<td><span name="amount"></span></td>';
		html += '<td><button id="deleteRow' + count + '" class="deleteRow btn btn-warning">Delete</button></td>';
		html += '</tr>';
		$('#orderItems').append(html);
		$('.deleteRow').click(function(e){
			var id = parseInt($(this).attr('id').replace('deleteRow', ''));
			deleteRow(id);
			rearrange();
		});
	}
	function deleteRow(rowId) {
		$('#itemRow' + rowId).remove();
	}
	function rearrange() {
		var i = 0;
		$('.itemNo').each(function(k, item){
			$(item).html('' + (++i));
		});
		count = i;
	}
</script>
<title>eDukaan Shop Owner Console</title>
</head>
<body>
<?php include_once('menu.php');?>
<h2>New Order</h2>
<hr>
<form method="post" action="placeOrder.php">
<div class="form-group">
<label for="customerPhone">Phone Number</label>
<input id="customerPhone" type="text" name="customerPhone" class="form-control">
</div>
<div class="form-group">
<label for="customerName">Customer Name</label>
<input id="customerName" type="text" name="customerName" class="form-control">
</div>
<div class="form-group">
<label for="customerAddress">Customer Address</label>
<input id="customerAddress" type="text" name="customerAddress" class="form-control">
</div>
<label class="radio-inline">
<input type="radio" name="mode" checked="checked" value="Home Delivery">Home Delivery</label>
<label class="radio-inline">
<input type="radio" name="mode" value="Pick Up">Pick Up</label>
<br>
<br>
<table class="table table-striped">
	<thead>
		<tr>
			<th nowrap="nowrap">Item No</th>
			<th style="width: 80%">Name</th>
			<th>Quantity</th>
			<th>Amount</th>
			<th></th>
		</tr>
	</thead>
	<tbody id="orderItems">
		<tr id="itemRow1">
			<td><span class="itemNo">1</span></td>
			<td><select name="productId[]" class="form-control"></select></td>
			<td><input type="text" size="5" name="quantity[]" class="form-control" style="width: 50px"></td>
			<td><span id="amount1"></span></td>
			<td><button id="deleteRow1" class="deleteRow btn btn-warning">Delete</button></td>
		</tr>
	</tbody>
</table>
<div style="text-align: right"><input id="addRow" value="Add Row" class="btn btn-default" value="Add Item" type="button">&nbsp;<input type="submit" value="Create Order" class="btn btn-primary"></div>
</form>
</body>
</html>
