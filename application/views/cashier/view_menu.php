<script>
	window.onload = get_menu();				// perform get_data after the page completely loads

	function get_menu(){  
		$.ajax({
			url: base_url+"index.php/cashier/menu/get_menu/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);

				for(var i=0; i<results.length; i++){
					var string="<div class='col-xs-6 col-sm-3 itemcontainer'> \
									<div class='itemarray' name='item["+i+"]'><div class='itemdetails'> \
										<center><span class='itemname'>"+(results[i].itemname).toUpperCase()+"</span></center>\
										<center><span class='itemprice'> Php "+(results[i].itemprice)+"</span></center> \
									</div></div> \
									<div class='changecount'> \
										<span class='xsign'> X </span> \
										<input type='number' class='itemcount' value='0' min='0' max='999'></input> \
										<input type='hidden' class='itemid' value="+results[i].itemid+"> \
									</div> \
								</div>";
					$('#menulist').append(string);
				}
				$('#menulist').append("<div id='menusubmit'><center><input class='btn btn-default' type='submit' name='submit' value='Order' /></center></div>");
			},
			error: function(err){
				$('#menulist').html(err);
			}
		});
	}

	$(document).ready(function(){
		$(document).on("click", "#menusubmit", function(event){				// function to be executed when a company is approved
			event.preventDefault();
			if(!validateorder()) return;

			string=getOrderString();
			console.log(string);
			$.ajax({
				url: base_url+"index.php/cashier/menu/order/"+string,
				type: 'POST',

				success: function(result){
					$('.itemcount').val(0);
				},
				error: function(err){
					$('#menulist').html(err);
				}
			});
		})

		function getOrderString(){
			string="";
			for(i=0; i<$(".itemid").length; i++){
				if($(".itemcount")[i].value > 0){
					string+=($(".itemid")[i].value.trim())+"_";
					string+=($(".itemcount")[i].value.trim())+"_";
					string+=($(".itemprice")[i].innerHTML.trim().replace("Php ", ""))+"_";

				}
			}
			// console.log(string);
			return string;
		}
	})
</script>

<div id="content">
	<div id="contentheader"><h3>Menu</h3></div>
	<div id="menucontainer">
		<form name="order" id="menulist" class="form-horizontal"></form>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>