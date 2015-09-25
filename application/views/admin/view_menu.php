<script>
	window.onload = get_menu_full();				// perform get_data after the page completely loads
	window.onload = get_categories();				// perform get_data after the page completely loads

	function get_menu_full(){  
		$.ajax({
			url: base_url+"index.php/admin/menu/get_menu_full/",
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
										<input type='number' class='itemcount' value='0' min='0' max='999'";
										if(results[i].available == 0) string+=" disabled='disabled'";	// unavailable
										string+="></input> \
										<input type='hidden' class='itemid' value="+results[i].itemid+"></br> \
										<input type='checkbox' class='available'";
										if(results[i].available == 1) string+=" checked='checked'";		// available
										string+=">Available</input> \
									</div> \
								</div>";
					$('#menulist').append(string);
				}
				$('#menulist').append("<div id='menusubmit'><center><input class='btn btn-default' type='button' name='submit' value='Order' /></center></div>");
			},
			error: function(err){
				$('#menulist').html(err);
			}
		});
	}

	function get_categories(){
		$.ajax({
			url: base_url+"index.php/admin/menu/get_categories",
			type:'POST',

			success: function(result){
				var results=JSON.parse(result);
				for(var i=0; i<results.length; i++)
					$("#addmenucategory").append("<option value='"+results[i].categoryname+"'>"+results[i].categoryname+"</option>");
				$("#addmenucategory").append("<option id='newcategory' value='newcategory'>Add a new category...</option>");
			}
		})

	}

	$(document).ready(function(){
		$(document).on("click", "#menusubmit", function(event){				// function to be executed when a company is approved
			event.preventDefault();
			if(!validateorder()) return;

			string=getOrderString();
			console.log(string);
			$.ajax({
				url: base_url+"index.php/admin/menu/order/"+string,
				type: 'POST',

				success: function(result){
					$('.itemcount').val(0);
				},
				error: function(err){
					$('#menulist').html(err);
				}
			});
		})

		$(document).on("change", "#addmenucategory", function(event){
			console.log("new category");
			if($(this).val() == "newcategory")
				window.location=base_url+"index.php/admin/category";
		})

		$(document).on("click", ".available", function(event){				// function to be executed when a company is approved
			if(! $(event.target).parent().children(".itemcount")[0].disabled) $(event.target).parent().children(".itemcount")[0].disabled=true;
			else $(event.target).parent().children(".itemcount")[0].disabled=false;
			itemid=$(event.target).parent().children(".itemid")[0].value;
			toggle=0;
			if($(event.target).parent().children(".itemcount")[0].disabled) toggle=0;	// currently enabled -- set to unavaiable
			else toggle=1;																// currently disabled -- set to available
			$.ajax({
				url: base_url+"index.php/admin/menu/availability/"+itemid+"_"+toggle,
				type: 'POST'
			});
		})

		$(document).on("click", "#addmenusubmit", function(event){
			if(!validateaddmenu()) return false;
			

		})

		function getOrderString(){
			string="";
			for(i=0; i<$(".itemid").length; i++){
				console.log($(".itemcount")[i].value+" "+$(".available")[i].checked)
				if($(".itemcount")[i].value > 0 && $(".available")[i].checked){
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
	<div id="menu">
		<div id="addmenucontainer">
			<h4>Add Menu</h4>
			<div id="addmenu">
				<form name="order" id="addmenu" class="form-horizontal">
					<label>Item Name</label>
					<input type="text" id="addmenuname" name="addmenuname"></input>
					<label>Item Category</label>
					<select id="addmenucategory" name="addmenucategory"></select>
					<label>Price</label>
					<input type="number" id="addmenuprice" name="price" step="any"></input> 
					<input class='buttonlogin col-sm-offset-2 btn btn-default' type='submit' id="addmenusubmit" name='submit' value='Add Item in Menu' />
				</form>
			</div>
			<div id="addmenulist"></div>
		</div>
		<div id="menucontainer">
			<h4>Full Menu List</h4>
			<form name="order" id="menulist" class="form-horizontal"></form>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>