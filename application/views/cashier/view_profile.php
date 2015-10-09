<script>
	window.onload = get_account_info();				// perform get_data after the page completely loads

	function get_account_info(){  
		$.ajax({
			url: base_url+"index.php/account/get_account_info/",
			type: 'POST',

			success: function(result){
				var results=JSON.parse(result);
				$('#username').val(results['username']);
				$('#firstname').val(results['firstname']);
				$('#lastname').val(results['lastname']);
			}
		});
	}

	function username_available(available){
		$.ajax({
			url:base_url+"index.php/account/exists/"+$("#username")[0].value,
			type: 'POST',

			success: function(result){
				available(result);
			}
		})
	}

	$(document).ready(function(){
		$(document).on("blur", "#username", function(){
			if(validateusername($("#username")[0].value)){
				document.getElementsByClassName("unameerr")[0].innerHTML="";
				username_available(function(available){
					if(available=="no") document.getElementsByClassName("unameerr")[0].innerHTML="Username is available.";
					else if(available=="yes") document.getElementsByClassName("unameerr")[0].innerHTML="Username is not available.";
				})
			}
		})

		$(document).on("blur", "#oldpass", function(){
			if(validatepassword($('#oldpass')[0].value)){
				$.ajax({
					url: base_url+"index.php/account/verify_password/",
					type: 'POST',
					data:{'password':$('#oldpass')[0].value},

					success: function(result){
						if(result=="match"){
							string="<form name='editinfo' id='editinfo' class='form-horizontal formcontainer'> \
								<div> \
									<label class='col-sm-4 control-label'>New Password</label> \
									<div class='col-sm-8'> \
										<input class='form-control' type='password' id='password' name='password' onblur='validatepassword(this.value); if($(\"#confirmpassword\").val()!=\"\") matchPassword(this.value, $(\"#confirmpassword\").val())'></input><span class='pworderr'></span></br>  \
									</div> \
								</div> \
								</br> \
								<div> \
									<label class='col-sm-4 control-label'>Confirm Password</label> \
									<div class='col-sm-8'> \
										<input class='form-control' type='password' id='confirmpassword' name='confirmpassword' onblur='matchPassword($(\"#password\").val(), this.value); string2=this.value'></input><span class='confpworderr'></span></br>  \
									</div> \
								</div> \
								</br> \
								<label class='col-sm-4 control-label'></label> \
								<input class='buttontab btn btn-default' type='submit' id='newpasssubmit' name='submit' value='Update Password' /> \
							</form>";
							$('#editpass').html(string);
						}
						else{
							$('.pworderr').html("Invalid password.");
						}
					}
				});
			}
		})
	})
</script>

<div id="content">
	<div id="contentheader"><h3>Profile</h3></div>
	<div id="profile" class="contentcontainer">
		<div id="editinfocontainer">
			<h4>Edit Personal Information</h4>
			<?php 
				echo validation_errors();						// show errors on search values
				$attrib=array('name' => 'editinfo', 'id' => 'editinfo', 'class' => 'formcontainer form-horizontal', 'onsubmit' => 'return validateeditacctinfo()' );
				echo form_open('account/edit_info', $attrib);			
				if(isset($msg)){
					echo $msg;
				}
			?>
				<div>
					<label class="col-sm-4 control-label">Username</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="username" name="username" onblur="validateusername(this.value); "></br><span class="unameerr"></span>
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">First Name</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="firstname" name="firstname" onblur="validatefname(this.value)"></br><span class="fnameerr"></span>
					</div>
				</div>
				</br>
				<div>
					<label class="col-sm-4 control-label">Last Name</label>
					<div class="col-sm-8">
						<input class="form-control" type="text" id="lastname" name="lastname" onblur="validatelname(this.value)"></br><span class="lnameerr"></span>
					</div>
				</div>
				</br>
				<label class="col-sm-4 control-label"></label>
				<input class='buttontab btn btn-default' type='submit' id="infosubmit" name='submit' value='Update Info' />
			</form>
		</div>
		<div id="editpassword">
			<h4>Update Password</h4>
			<form name="editpass" id="editpass" class="form-horizontal formcontainer">
				<div>
					<label class="col-sm-4 control-label">Old Password</label>
					<div class="col-sm-8">
						<input class="form-control" type="password" id="oldpass" name="oldpass"></br><span class="pworderr"></span>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>