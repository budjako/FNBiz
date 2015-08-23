<div id="content">
	<h3>Sign up</h3>
	<?php 
		echo validation_errors();						// show errors on search values
		$attrib=array('name' => 'signup', 'id' => 'signup', 'class' => 'form-horizontal');
		echo form_open('home/signup_submit', $attrib);			
		if(isset($msg)){
			echo $msg;
		}
	?>

		<div class="form-group">
			<label class="col-sm-2 control-label" for="username">Username</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="username" name="username" onblur="validateusername()" />
				<span name="usernameerr"></span></br>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="password">Password</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" id="password" name="password" onblur="validatepassword()" />
				<span name="passworderr"></span></br>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="firstname">First Name</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="firstname" name="firstname" onblur="validatefirstname()" />
				<span name="firstnameerr"></span></br>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" for="lastname">Last Name</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="lastname" name="lastname" onblur="validatelastname()" />
				<span name="lastnameerr"></span></br>
			</div>
		</div>

		<input class="button-search col-sm-offset-2 btn btn-default" type="submit" name="submit" onclick="return validatesignup()" value="Sign up" />
	</form>
	<script src="<?php echo base_url() ?>assets/js/validate.js"></script>				<!-- validate values supplied -->
</div>