<script>
	window.onload = get_accounts();				// perform get_data after the page completely loads
	var string1="", string2="";

	function get_accounts(){  
		$.ajax({
			url: base_url+"index.php/admin/account/get_accounts/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				for(i=0; i<results.length; i++){
					string="<tr id='"+results[i].username+"'><td>"+results[i].username+"</td>";
					string+="<td>"+results[i].firstname+"</td>";
					string+="<td>"+results[i].lastname+"</td>";
					if(results[i].admin==1)
						string+="<td></td></tr>";
					else
						string+="<td><input type='button' class='button co-admin' value='Add as co-admin'></td></tr>";
					$("#userlist").append(string);
				}
			},
			error: function(err){
				$('#userlist').html(err);
			}
		});

		$(document).ready(function(){
			$(document).on("click", ".co-admin", function(event){
				source=$(this);
				console.log(source);
				// console.log($(this).parent().parent().attr("id"));			// id of table row
				username=$(this).parent().parent().attr("id");

				$.ajax({
					url: base_url+"index.php/admin/account/add_admin/"+username,
					type: 'POST',
					data:{username:username},

					success: function(data){
						console.log($(this));
						source.remove();
					}
				});
			})
		})
	}
</script>

<div id="content">
	<div id="contentheader"><h3>Accounts</h3></div>
	<div id="accounts" class="contentcontainer">
		<h4>Add Account</h4>
		<div id="addaccountcontainer">
			<?php 
				echo validation_errors();						// show errors on search values
				$attrib=array('name' => 'addaccount', 'id' => 'addaccount', 'class' => 'formcontainer form-horizontal', 'onsubmit' => 'return validateaddacctinfo()' );
				echo form_open('admin/account/add_user', $attrib);			
				if(isset($msg)){
					echo $msg;
				}
			?>
				<div>
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-6">
						<input class="form-control" type="text" id="username" name="username" onblur="validateusername(this.value)"></input><span class="unameerr"></span></br>
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">Password</label>
					<div class="col-sm-6">
						<input class="form-control" type="password" id="password" name="password" onblur="validatepassword(this.value); string1=this.value; if(string2!='') matchPassword(string1, string2)"></input><span class="pworderr"></span></br> 
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">Confirm Password</label>
					<div class="col-sm-6">
						<input class="form-control" type="password" id="confirmpassword" name="confirmpassword" onblur="matchPassword(string1, this.value); string2=this.value"></input><span class="confpworderr"></span></br> 
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">First Name</label>
					<div class="col-sm-6">
						<input class="form-control" type="text" id="firstname" name="firstname" onblur="validatefname(this.value)"></input><span class="fnameerr"></span></br>
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">Last Name</label>
					<div class="col-sm-6">
						<input class="form-control" type="text" id="lastname" name="lastname" onblur="validatelname(this.value)"></input><span class="lnameerr"></span></br>
					</div>
				</div>
				</br>
				<label class="col-sm-4 control-label"></label>
				<input class='buttontab btn btn-default' type='submit' id="accountsubmit" name='submit' value='Add Account' />
			</form>
		</div>
		<h4>List of all Accounts</h4>
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
