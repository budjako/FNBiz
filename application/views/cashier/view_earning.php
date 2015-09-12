<script>
	window.onload = get_earnings();				// perform get_data after the page completely loads

	function get_earnings(){  
		$.ajax({
			url: base_url+"index.php/cashier/expense/get_earnings/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);

				for(var i=0; i<results.length; i++){
					console.log(results[i]);
					var string="<div class='expenseitem'> \
									<div class='expensedetails'> \
										<span class='expensename'>"+(results[i].expensename)+"</span> \
										<span class='expenseprice'> Php "+(results[i].amount)+"</span> \
										<span class='expensedate'> Php "+(results[i].datets)+"</span> \
									</div> \
								</div>";
					$('#expenselist').append(string);
				}
			},
			error: function(err){
				$('#expenselist').html(err);
			}
		});
	}
</script>

<div id="content">
	<div id="contentheader"><h3>earnings</h3></div>
	<div id="earningscontainer">
		<div id="addexpense">
			<?php
				echo validation_errors();						// show errors on search values
				$attrib=array('name' => 'order', 'id' => 'addexpense', 'class' => 'form-horizontal');
				echo form_open('cashier/expense/add_expense', $attrib);			
				if(isset($msg)){
					echo $msg;
				}
			?>
				<label>Expense Name</label>
				<input type="text" name="expensename"></input>
				<label>Amount</label>
				<input type="number" name="amount" step="any"></input> 
				<input class='buttonlogin col-sm-offset-2 btn btn-default' type='submit' name='submit' onclick='return validateexpense()' value='Add Expense' />
			</form>
		</div>
		<div id="expenselist"></div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>