<script>
    window.onload = get_categories();               // perform get_data after the page completely loads
    var results;
    function get_categories(){
        $.ajax({
            url: base_url+"index.php/admin/category/get_categories",
            type:'POST',

            success: function(result){
                results=JSON.parse(result);
                $(".categorybody").html("");
                for(var i=0; i<results.length; i++){
                    string="<tr id='"+results[i].categoryid+"'><td>"+results[i].categoryname+"</td>";
                    if(results[i].categorydesc==null) string+="<td></td>";
                    else string+="<td>"+results[i].categorydesc+"</td>";
                    string+="<td><input type='button' class='editbutton buttontab btn btn-default' value='Edit' /></td></tr>";
                    $(".categorybody").append(string);
                }
            }
        })
    }

    $(document).ready(function(){
        $(document).on("click", ".editbutton", function(event){
            idattrib=$(this).parent().parent().attr("id");
            var i;
            for(i=0; i<results.length; i++){
                if(results[i].categoryid==idattrib) break;
            }
            $("#editcategory").html("<h4>Edit Category</h4>");
            string="<input type='hidden' id='catidedit' name='catidedit' value="+results[i].categoryid+"></input><label class='col-sm-4 control-label' for='catnameedit'>Category Name</label>";
            string+="<div class='col-sm-8'><input class='form-control' type='text' id='catnameedit' name='catnameedit' value='"+results[i].categoryname+"' onblur='validatecatname(this.value, \"editcatnameerr\")'></input><span class=\"editcatnameerr\"></span></br>";
            string+="</div></br><label class='col-sm-4 control-label' for='catdescedit'>Category Description</label><div class='col-sm-8'>";

            if(results[i].categorydesc==null) string+="<input class='form-control' type='text' id='catdescedit' name='catdescedit' onblur='validatecatname(this.value, \"editcatdescerr\")'></input><span class=\"editcatdescerr\"></span></br>";
            else string+="<input class='form-control' type='text' id='catdescedit' name='catdescedit' value='"+results[i].categorydesc+"' onblur='validatecatname(this.value, \"editcatdescerr\")'></input><span class=\"editcatdescerr\"></span></br>";
            string+="</div></br><label class='col-sm-4 control-label'></label><input class='buttontab btn btn-default' type='submit' id='categorysubmit' name='submit' value='Edit Category' />";
            $("#editcategory").append(string);
        })
    })
</script>

<div id="content">
    <div id="contentheader"><h3>Categories</h3></div>
    <div id="category" class="contentcontainer">
        <h4>Add Category</h4>
        <?php 
            echo validation_errors();                       // show errors on search values 
            $attrib=array('name' => 'addcategory', 'id' => 'addcategory', 'class' => 'form-horizontal formcontainer', 'onsubmit' => "return validateaddcategory($('#catnameadd').val(), 'addcatnameerr', $('#catdescadd').val(), 'addcatdescerr')"); 
            echo form_open('admin/category/add_category', $attrib);         
            if(isset($msg)) echo $msg; 
        ?> 
            <label class="col-sm-4 control-label" for="catnameadd">Category Name</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="catnameadd" name="catnameadd" onblur="validatecatname(this.value, 'addcatnameerr')"></input><span class="addcatnameerr"></span></br>
            </div>
            </br>
            <label class="col-sm-4 control-label" for="catdescadd">Category Description</label>
            <div class="col-sm-8">
                <input class="form-control" type="text" id="catdescadd" name="catdescadd" onblur="validatecatname(this.value, 'addcatdescerr')"></input><span class="addcatdescerr"></span></br>
            </div>
            </br>
            <label class="col-sm-4 control-label"></label>
            <input class='buttontab btn btn-default' type='submit' id="addcategorysubmit" name='submit' value='Add Category' />
        </form>

        <?php 
            echo validation_errors();                       // show errors on search values 
            $attrib=array('name' => 'editcategory', 'id' => 'editcategory', 'class' => 'form-horizontal formcontainer', 'onsubmit' => "return validateeditcategory($('#catidedit'), $('#catnameedit').val(), 'editcatnameerr', $('#catdescedit').val(), 'editcatdescerr')"); 
            echo form_open('admin/category/edit_category', $attrib);            
            if(isset($msg)) echo $msg; 
        ?> 
        </form>

        <h4>List of Categories</h4>
        <table class=" table table-condensed categorytable">
            <thead>
                <tr>
                    <th>Category Name</th>
                    <th>Category Description</th>
                </tr>
            </thead>
            <tbody class="categorybody"></tbody>
        </table>
    </div>
</div>
<script src="<?php echo base_url() ?>assets/js/validate.js"></script>