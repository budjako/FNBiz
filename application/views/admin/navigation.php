<nav class="navbar navbar-default navbar-fixed-top">
	<div class="container-fluid">
		<div class="navbar-brand">FNBiz</div>
		<ul class="nav navbar-nav">
			<li><a href="<?php echo base_url(); ?>index.php/admin/account">Accounts</a></li>	<!-- View today's transactions-->
			<li><a href="<?php echo base_url(); ?>index.php/admin/menu">Menu</a></li>	<!-- View today's transactions-->
			<li><a href="<?php echo base_url(); ?>index.php/admin/category">Categories</a></li>	<!-- View today's transactions-->
			<li><a href="<?php echo base_url(); ?>index.php/admin/transaction">Transactions</a></li>	<!-- View today's transactions-->
			<li><a href="<?php echo base_url(); ?>index.php/admin/expense">Expenses</a></li>		<!-- View all and add expense-->
			<li><a href="<?php echo base_url(); ?>index.php/admin/earning">Earnings</a></li>		<!-- Compute today's earnings -->
		</ul>
		<ul class="nav navbar-nav navbar-right">
			<li><a href="<?php echo base_url(); ?>index.php/account"><?php echo $this->session->userdata('logged_in')['username']; ?> </a></li>
			<li><a href="<?php echo base_url(); ?>index.php/home/logout">Logout</a></li>
		</ul>
	</div>
</nav>