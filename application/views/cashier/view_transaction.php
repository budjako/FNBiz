<script>
	window.onload = get_transactions();				// perform get_data after the page completely loads

	function get_transactions(){	
		$.ajax({
			url: base_url+"index.php/cashier/transaction/get_transactions/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				var transactionid=0, total=0, sales=0;
				for(var i=0; i<results.length; i++){
					transactionid=results[i].transaction_id;
					string="<div class='panel panel-default transaction["+transactionid+"]'> \
						<div class='panel-heading' role='tab' id='heading"+transactionid+"'> \
							<h4 class='panel-title'> \
								<a class='collapsed' role='button' data-toggle='collapse' data-parent='#accordion' href='#collapse"+transactionid+"' aria-expanded='false' aria-controls='collapse"+transactionid+"'> \
									Transaction #"+transactionid+": "+results[i].time+" \
								</a> \
							</h4> \
						</div> \
						<div id='collapse"+transactionid+"' class='panel-collapse collapse' role='tabpanel' aria-labelledby='heading"+transactionid+"'> \
							<div class='panel-body'> \
								<table class='table table-hover'><thead><tr><th>Item Name</th><th>Unit Price</th><th>Count</th><th>Price</th></tr></thead>";
								
								while(true){
									total+=results[i].count*results[i].itemprice;
									string+="<tr><td class='itemname'>"+(results[i].itemname)+"</td> \
											<td class='itemprice'> Php "+(results[i].itemprice)+"</td> \
											<td class='count'>"+results[i].count+"</td> \
											<td class='price'>Php "+results[i].count*results[i].itemprice+"</td> \
											</tr>";
									if(i+1>=results.length || results[i+1].transaction_id != transactionid) break;
									i++;
								}
					
								string+="</table><span class='bold'>Transaction Total: Php "+results[i].total+"</span> \
							</div> \
						</div> \
					</div>";
					
					$('.todayexp').append(string);
				}
			}
		});
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Transactions</h3></div>
	<div id="transactions" class="contentcontainer">
		<h4>Today's Transactions</h4>
		<div class="todayexp panel-group" id="accordion" role="tablist" aria-multiselectable="true"></div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>