<script>
	window.onload = get_earnings_today();				
	window.onload = get_earnings();						

	function get_earnings_today(){  
		$.ajax({
			url: base_url+"index.php/cashier/earning/get_earnings_today_info/",
			type: 'POST',

			success: function(results){
				var results=JSON.parse(results);
				console.log(results);
				// $('#earnings').append(results);
				$('.todaysales').html(results['sales']);
				$('.todayexpenses').html(results['expenses']);
				$('.todayearning').html(results['earning']);
			}
		});
	}

	function get_earnings(){  
		$.ajax({
			url: base_url+"index.php/admin/earning/get_earnings_info/",
			type: 'POST',

			success: function(results){
				var results=JSON.parse(results);
				console.log(results);
				$('.allsales').html(results['sales']);
				$('.allexpenses').html(results['expenses']);
				$('.allearning').html(results['earning']);
				// $('#earnings').append(results);
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
		<h4>Total Earnings</h4>
		<div>
			<span class="bold">Total Sales: </span>
			<span class="allsales"></span></br>
			<span class="bold">Total Expenses: </span>
			<span class="allexpenses"></span></br>
			<span class="bold">Earnings: </span>
			<span class="allearning"></span>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>