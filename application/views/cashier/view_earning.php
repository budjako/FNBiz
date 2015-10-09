<script>
	window.onload = get_earnings_today();			// perform get_data after the page completely loads

	function get_earnings_today(){  
		$.ajax({
			url: base_url+"index.php/cashier/earning/get_earnings_today_info/",
			type: 'POST',

			success: function(results){
				var results=JSON.parse(results);
				$('.todaysales').html(results['sales']);
				$('.todayexpenses').html(results['expenses']);
				$('.todayearning').html(results['earning']);
			}
		});
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Earnings</h3></div>
	<div id="earnings" class="contentcontainer">
		<h4>Today's Earnings</h4>
		<div>
			<span class="bold">Today's Sales: </span>
			<span class="todaysales"></span></br>
			<span class="bold">Today's Expenses: </span>
			<span class="todayexpenses"></span></br>
			<span class="bold">Earnings: </span>
			<span class="todayearning"></span>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>