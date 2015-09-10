<script>
	window.onload = get_menu();				// perform get_data after the page completely loads

	function get_menu(){  
		$.ajax({
			url: base_url+"index.php/cashier/menu/get_menu/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);

				for(var i=0; i<results.length; i++){
					console.log(results[i]);
					var string="<div class='itemcontainer'> \
									<div class='itemarray' name='item["+i+"]'><div class='itemdetails'> \
										<span class='itemname'>"+(results[i].itemname).toUpperCase()+"</span> \
										<span class='itemprice'> Php "+(results[i].itemprice)+"</span> \
									</div></div> \
									<div class='changecount'> \
										<span class='xsign'> X </span> \
										<input type='number' class='count' name='"+results[i].itemname+"[0]' value='0' min='0' max='999'></input> \
										<input type='hidden' class='price' name='"+results[i].itemname+"[1]' value="+results[i].itemprice+"> \
										<input type='hidden' class='id' name='"+results[i].itemname+"[2]' value="+results[i].itemid+"> \
									</div> \
								</div>";
					$('#menulist').append(string);
				}
				$('#menulist').append("<input class='buttonlogin col-sm-offset-2 btn btn-default' type='submit' name='submit' onclick='return validateorder()' value='Order' />");
			},
			error: function(err){
				$('#menulist').html(err);
			}
		});
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Menu</h3></div>
	<div id="menucontainer">
		<?php
			echo validation_errors();						// show errors on search values
			$attrib=array('name' => 'order', 'id' => 'menulist', 'class' => 'form-horizontal');
			echo form_open('cashier/menu/order', $attrib);			
			if(isset($msg)){
				echo $msg;
			}
		?>
		</form>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>