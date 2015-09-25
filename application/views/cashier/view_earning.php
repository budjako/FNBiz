<script>
	window.onload = get_earnings();				// perform get_data after the page completely loads

	function get_earnings(){  
		$.ajax({
			url: base_url+"index.php/cashier/earning/get_earnings/",
			type: 'POST',

			success: function(result){
				// $('#earnings').html(result);
				var results=JSON.parse(result);
				// console.log(results);
				$('#earnings').append(results);
			},
			error: function(err){
				$('#earnings').html(err);
			}
		});
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Earnings</h3></div>
	<div id="earnings"></div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>