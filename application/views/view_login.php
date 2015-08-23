<div id="logincontent">
	<div id="heading"><center><h3>FNBiz</h3></center></div>
	<?php 
		echo validation_errors();						// show errors on search values
		$attrib=array('name' => 'login', 'id' => 'loginform', 'class' => 'form-horizontal');
		echo form_open('home/login', $attrib);			
		if(isset($msg)){
			echo $msg;
		}
	?>

		<div>
			<label class="col-sm-2 control-label" for="stdno">Username</label>
			<div class="col-sm-10">
				<input class="form-control" type="text" id="username" name="username" onblur="validateloginusername()" />
				<span name="usernameerr"></span></br>
			</div>
		</div>
		<div>
			<label class="col-sm-2 control-label" for="password">Password</label>
			<div class="col-sm-10">
				<input class="form-control" type="password" id="password" name="password" onblur="validateloginpassword()" />
				<span name="passworderr"></span></br>
			</div>
		</div>
		<div>
			<input class="buttonlogin col-sm-offset-2 btn btn-default" type="submit" name="submit" onclick="return validatelogin()" value="Log in" />
			<span>No account? <a href="<?php echo base_url()?>index.php/home/signup">Sign up</a></span>
		</div>
	</form>
	<script src="<?php echo base_url() ?>assets/js/validate.js"></script>				<!-- validate values supplied -->
</div>