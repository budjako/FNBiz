<div id="content">
	<div id="logincontent">
		<div id="heading"><center><h3>FNBiz</h3></center></div>
		<?php 
			// echo validation_errors();						// show errors on search values
			$attrib=array('name' => 'login', 'id' => 'loginform', 'class' => 'form-horizontal formcontainer', 'onsubmit' => 'return validatelogin()');
			echo form_open('home/login', $attrib);			
			if(isset($msg)){
				echo $msg;
			}
		?>

			<div>
				<label class="col-sm-4 control-label" for="stdno">Username</label>
				<div class="col-sm-8">
					<input class="form-control" type="text" id="username" name="username" onblur="validateusername(this.value)">
					</br><span class="unameerr"></span>
				</div>
			</div>
			<div>
				<label class="col-sm-4 control-label" for="password">Password</label>
				<div class="col-sm-8">
					<input class="form-control" type="password" id="password" name="password" onblur="validatepassword(this.value)">
					</br><span class="pworderr"></span>
				</div>
			</div>
			<div>
				<input class="buttonlogin col-sm-offset-5 btn btn-default" type="submit" name="submit" onclick="return validatelogin()" value="Log in">
			</div>
		</form>
		<script src="<?php echo base_url() ?>assets/js/validate.js"></script>				<!-- validate values supplied -->
	</div>
</div>