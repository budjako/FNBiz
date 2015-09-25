<script>
	window.onload = get_expenses();				// perform get_data after the page completely loads
	window.onload = get_all_expenses();				// perform get_data after the page completely loads

	function get_expenses(){  
		$.ajax({
			url: base_url+"index.php/cashier/expense/get_expenses/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				totalexpense=0;
				$('#tablebody').html("");
				for(var i=0; i<results.length; i++){
					var string="<tr><td class='expensename'>"+(results[i].expensename)+"</td> \
										<td class='expenseprice'> Php "+(results[i].amount)+"</td> \
										<td class='expensedate'> Php "+(results[i].datets)+"</td> \
									</td></tr>";
					$("#tablebody").append(string);
					totalexpense+=parseFloat(results[i].amount);
				}
				$('#total').text("Total: "+totalexpense);
			}
		});
	}

	function get_all_expenses(){  
		$.ajax({
			url: base_url+"index.php/admin/expense/get_all_expenses/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				totalexpense=0;
				$('#tablebodyfull').html("");
				for(var i=0; i<results.length; i++){
					var string="<tr><td class='expensename'>"+(results[i].expensename)+"</td> \
										<td class='expenseprice'> Php "+(results[i].amount)+"</td> \
										<td class='expensedate'> Php "+(results[i].datets)+"</td> \
									</td></tr>";
					$("#tablebodyfull").append(string);
					totalexpense+=parseFloat(results[i].amount);
				}
				$('#grandtotal').text("Total: "+totalexpense);
			}
		});
	}

	$(document).ready(function(){
		$(document).on("click", "#expensesubmit", function(event){			// function to be executed when a company is approved
			event.preventDefault();
			// console.log("validateexpense"+validateexpense());
			if(!validateexpense()) return;

			var name = $("#expensename").val();
			var amount = $("#expenseamount").val();
			name=name.replace(" ", "_");
			$("#expensename").val("");
			$("#expenseamount").val("");
			
			$.ajax({
				url: base_url+"index.php/cashier/expense/add_expense/"+name+"_"+amount,
				type: 'POST',

				success: function(result){								// if approving was successfully updated on the server, update values 
					get_expenses();
				}
			});
		})
	})
</script>

<div id="content">
	<div id="contentheader"><h3>Expenses</h3></div>
	<div id="expensescontainer">
		<div id="addexpense">
			<form name="order" id="addexpense" class="form-horizontal">
				<label>Expense Name</label>
				<input type="text" id="expensename" name="expensename"></input>
				<label>Amount</label>
				<input type="number" id="expenseamount" name="amount" step="any"></input> 
				<input class='buttonlogin col-sm-offset-2 btn btn-default' type='submit' id="expensesubmit" name='submit' value='Add Expense' />
			</form>
		</div>
		<h4>Today's Expenses</h4>
		<table class=" table table-condensed expensetable">
			<thead>
				<tr>
					<th>Expense Name</th>
					<th>Amount</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody id="tablebody"></tbody>
		</table>
		<h4 id="total"></h4>
		<h4>All Expenses</h4>
		<table class=" table table-condensed expensetablefull">
			<thead>
				<tr>
					<th>Expense Name</th>
					<th>Amount</th>
					<th>Date</th>
				</tr>
			</thead>
			<tbody id="tablebodyfull"></tbody>
		</table>
		<h4 id="grandtotal"></h4>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>