<script>
	window.onload = get_expenses();				// perform get_data after the page completely loads

	function get_expenses(){  
		$.ajax({
			url: base_url+"index.php/cashier/expense/get_expenses/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				totalexpense=0;
				$('#expenselist').html("");
				for(var i=0; i<results.length; i++){
					var string="<div class='expenseitem'> \
									<div class='expensedetails'> \
										<span class='expensename'>"+(results[i].expensename)+"</span> \
										<span class='expenseprice'> Php "+(results[i].amount)+"</span> \
										<span class='expensedate'> Php "+(results[i].datets)+"</span> \
									</div> \
								</div>";
					$('#expenselist').append(string);
					totalexpense+=parseInt(results[i].amount);
				}
			},
			error: function(err){
				$('#expenselist').html(err);
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
			name=name.replace(" ", "_");		// ONLY FIRST OCCURRENCE
			
			$.ajax({
				url: base_url+"index.php/cashier/expense/add_expense/"+name+"_"+amount,
				type: 'POST',

				success: function(result){								// if approving was successfully updated on the server, update values 
					get_expenses();
				},
				error: function(err){
					$('#expenselist').html(err);				// on error, state error
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
		<div id="expenselist"></div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>