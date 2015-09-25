<script>
	window.onload = get_categories();				// perform get_data after the page completely loads

	function get_categories(){
		$.ajax({
			url: base_url+"index.php/admin/category/get_categories",
			type:'POST',

			success: function(result){
				var results=JSON.parse(result);
				for(var i=0; i<results.length; i++)
					$(".categorytable").append("<tr><td>"+results[i].categoryname+"</td> \
						<td>"+results[i].categorydesc+"</td></tr>");
				}
		})

	}

	$(document).ready(function(){
		
	})
</script>

<div id="content">
	<div id="contentheader"><h3>Categories</h3></div>
	<div id="category">
		<table class=" table table-condensed categorytable">
			<thead>
				<tr>
					<th>Category Name</th>
					<th>Category Description</th>
				</tr>
			</thead>
		</table>
	</div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>