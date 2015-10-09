// GENERICS

function alpha(str){	// minimum of length 1
	if(str.match(/^[a-zA-Z]+$/)) return true;
	return false;
}

function intfloat(str){
	if(integer(str) || decimal(str)) return true;
	return false;
} 

function integer(str){
	if(str.match(/^(-)?[0-9]+$/)) return true;
	return false;
}

function decimal(str){
	if(str.match(/^(-)?[0-9]*\.[0-9]*[1-9]+[0-9]*$/)) return true;
	return false;
}

function alphaspace(str){	// minimum 1 alpha
	if(str.match(/^[a-zA-Z]+[a-zA-Z\s]*$/)) return true;
	return false;
}

function alphanum(str){	// minimum of length 1
	if(str.match(/^[a-zA-Z0-9]+$/)) return true;
	return false;
}

function alphanumuscore(str){	// minimum of length 1
	if(str.match(/^[a-zA-Z0-9_]$/)) return true;
	return false;
}

function alphanumuscorespace(str){	// minimum of length 1
	if(str.match(/^[a-zA-Z0-9_\s]+$/)) return true;
	return false;
}

// =================================================================================================================================

// USER LOGIN VALIDATION

function validatelogin(){
	if(validateusername(login.username.value.trim()) && validatepassword()) return true;
	return false;
}

// =================================================================================================================================

// USER INFORMATION VALIDATION

function validateaddacctinfo(){
	if(validateusername(addaccount.username.value.trim()) && validatepassword(addaccount.password.value.trim()) && validatefname(addaccount.firstname.value.trim()) && validatelname(addaccount.lastname.value.trim())) return true;
	return false;
}

function validateeditacctinfo(){
	username_available(function(available){
		if(available=="yes"){
			console.log("not available");
			return false;
		}
		else{
			if(validateusername(editinfo.username.value.trim()) && validatefname(editinfo.firstname.value.trim()) && validatelname(editinfo.lastname.value.trim())) return true;
			return false;
		}
	})
	
}

function validateaddaccount(){
	if(validateusername(login.username.value.trim()) && validatepassword(login.password.value.trim())) return true;
	return false;
}

function validatesignup(){
	if(validateusername(signup.username.value.trim()) && validatepassword(signup.password.value.trim()) && validatefirstname(signup.firstname.value.trim()) && validatelastname(signup.lastname.value.trim())) return true;
	return false;
}

function validateusername(str){
	msg="";
	document.getElementsByClassName("unameerr")[0].innerHTML=msg;
	if(str=="") msg="Username is required.";
	else if(str.length<7) msg="Enter at least eight characters."
	else if (!str.match(/^[a-zA-Z0-9_]{7,}$/)) msg="Only alphanumeric and underscore characters are allowed.";
	if(msg=="") return true;
	document.getElementsByClassName("unameerr")[0].innerHTML=msg;
	return false;
}

function validatepassword(str){
	msg="";
	document.getElementsByClassName("pworderr")[0].innerHTML=msg;
	if(str=="") msg="Password is required.";
	else if(str.length<7) msg="Enter at least seven characters.";
	else if (!str.match(/^[a-zA-Z0-9_]{7,}$/)) msg="Only alphanumeric and underscore characters are allowed.";
	if(msg=="") return true;
	document.getElementsByClassName("pworderr")[0].innerHTML=msg;
	return false;
}

function matchPassword(str1, str2){
	document.getElementsByClassName("confpworderr")[0].innerHTML="";
	if(validatepassword(str1)){
		msg="";
		if(str2=="")msg="Confirm password required.";
		else if(str1!=str2) msg="Passwords don't match";
		if(msg=="") return true;
		document.getElementsByClassName("confpworderr")[0].innerHTML=msg;
		return false;
	}
}

function validatefname(str){
	msg="";
	document.getElementsByClassName("fnameerr")[0].innerHTML=msg;
	if(str=="") msg="First name is required.";
	else if(str.length < 3) msg="Enter at least three characters."
	else if (!str.match(/^[A-Za-zñÑ]{1}[A-Za-zñÑ\s]*\.?((\.\s[A-Za-zñÑ]{2}[A-Za-zñÑ\s]*\.?)|(\s[A-Za-zñÑ][A-Za-zñÑ]{1,2}\.)|(-[A-Za-zñÑ]{1}[A-Za-zñÑ\s]*))*$/)) msg="Invalid name.";
	if(msg=="") return true;
	document.getElementsByClassName("fnameerr")[0].innerHTML=msg;
	return false;
}

function validatelname(str){
	msg="";
	document.getElementsByClassName("lnameerr")[0].innerHTML=msg;
	if(str=="") msg="Last name is required.";
	else if(str.length < 3) msg="Enter at least three characters."
	else if (!str.match(/^([A-Za-zñÑ]){1}([A-Za-zñÑ]){1,}(\s([A-Za-zñÑ]){1,})*(\-([A-Za-zñÑ]){1,}){0,1}$/)) msg="Invalid name.";
	if(msg=="") return true;
	document.getElementsByClassName("lnameerr")[0].innerHTML=msg;
	return false;
}

// =================================================================================================================================

// ORDER VALIDATION

function validateorder(){
	ctr=document.getElementsByClassName("itemcount").length;
	
	hasItem=0;
	for(i=0; i<ctr; i++)
		if(document.getElementsByClassName("itemcount")[i].value > 0) hasItem++;
	
	if(hasItem==0) return false;
	return true;
}

// =================================================================================================================================

// ADD MENU VALIDATION

function validateaddmenu(){
	if(validatemenuname(addmenu.addmenuname.value.trim()) && validatemenucategory(addmenu.addmenucategory.value.trim()) && validatemenuprice(addmenu.addmenuprice.value.trim())) return true;
	return false;
}

function validatemenuname(str){
	console.log(str);
	msg="";
	document.getElementsByClassName("addmenunameerr")[0].innerHTML=msg;
	if(! alphaspace(str)) msg="Alphanumeric characters only.";
	else if(str.length<3) msg="Input at least three characters.";
	if(msg=="") return true;
	document.getElementsByClassName("addmenunameerr")[0].innerHTML=msg;
	return false;
}

function validatemenucategory(str){
	msg="";
	document.getElementsByClassName("addmenucategoryerr")[0].innerHTML=msg;
	if(! integer(str)) msg="Invalid chosen category.";
	if(msg=="") return true;
	document.getElementsByClassName("addmenucategoryerr")[0].innerHTML=msg;
	return false;
}

function validatemenuprice(str){
	msg="";
	document.getElementsByClassName("addmenupriceerr")[0].innerHTML=msg;
	if(! intfloat(str)) msg="Indicate price.";
	if(msg=="") return true;
	document.getElementsByClassName("addmenupriceerr")[0].innerHTML=msg;
	return false;
}

// =================================================================================================================================

// EXPENSE VALIDATION

function validateexpense(name, amount){
	if(validateexpensename(name) && validateexpenseamount(amount)) return true;
	return false;
}

function validateexpensename(name){
	msg="";
	document.getElementsByClassName('expensenameerr')[0].innerHTML="";
	if(name.length<5) msg="Input at least five characters.";
	else if(!alphaspace(name)) msg="Alpha Characters only.";
	if(msg=="") return true;
	document.getElementsByClassName('expensenameerr')[0].innerHTML=msg;
	return false;
}

function validateexpenseamount(amount){
	msg="";
	document.getElementsByClassName('expenseamounterr')[0].innerHTML="";
	if(!intfloat(amount)) msg="Numeric Characters only.";
	else if(amount<1) msg="Amount should be greater than 0.";
	if(msg=="") return true;
	document.getElementsByClassName('expenseamounterr')[0].innerHTML=msg;
	return false;
}

// =================================================================================================================================

// CATEGORY VALIDATION

function validateaddcategory(name, nameclassname, desc, descclassname){
	if(validatecatname(name, nameclassname) && validatecatdesc(desc, descclassname)) return true;
	return false;
}

function validateeditcategory(id, name, nameclassname, desc, descclassname){
	if(integer(id) && validatecatname(name, nameclassname) && validatecatname(desc, descclassname)) return true;
	return false;
}

function validatecatname(str, classname){
	msg="";
	document.getElementsByClassName(classname)[0].innerHTML="";
	if(str.length<5) msg="Input at least five characters.";
	else if(!alphaspace(str)) msg="Alpha Characters only.";
	if(msg=="") return true;
	document.getElementsByClassName(classname)[0].innerHTML=msg;
	return false;
}
