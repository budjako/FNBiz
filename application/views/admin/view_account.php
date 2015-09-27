<script>
	window.onload = get_accounts();				// perform get_data after the page completely loads

	function get_accounts(){  
		$.ajax({
			url: base_url+"index.php/admin/account/get_accounts/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				console.log(results);
				for(i=0; i<results.length; i++){
					string="<tr><td>"+results[i].username+"</td>";
					string+="<td>"+results[i].firstname+"</td>";
					string+="<td>"+results[i].lastname+"</td>";
					if(results[i].admin==1)
						string+="<td><input type='button' class='button co-admin' value='Add as co-admin'></td></tr>";
						// string+="<td></td></tr>";
					else
						string+="<td><input type='button' class='button' value='Add as co-admin'></td></tr>";
					$("#userlist").append(string);
				}
			},
			error: function(err){
				$('#userlist').html(err);
			}
		});

		$(document).ready(function(){
			$(document).on("click", ".co-admin", function(event){
				console.log(this.parent);
			})
		})
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Accounts</h3></div>
	<div id="accounts">
		<table class="table table-hover table-condensed">
			<thead>
				<tr>
					<th>Username</th>
					<th>First Name</th>
					<th>Last Name</th>
					<th>Status</th>
				</tr>
			</thead>
			<tbody id="userlist"></tbody>
		</table>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>
