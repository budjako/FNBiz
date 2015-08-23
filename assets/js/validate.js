function validatelogin(){
	if(validateloginusername() && validateloginpassword()) return true;
	return false;
}

function validateloginusername(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("usernameerr")[0].innerHTML=msg;
	str=login.username.value.trim();
	if(str==""){
		msg="Username is required.";
	}
	else if (!str.match(/^[a-zA-Z0-9_]{3,}$/)){
		msg="Invalid Input: Only alphanumeric and underscore characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("usernameerr")[0].innerHTML=msg;
	return false;
}

function validateloginpassword(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("passworderr")[0].innerHTML=msg;
	str=login.password.value.trim();
	if(str==""){
		msg="Password is required.";
	}
	else if(str.length<5){
		msg="Invalid Input: Password length should be >= 5."
	}
	else if (!str.match(/^[a-zA-Z0-9_]{3,}$/)){
		msg="Invalid Input: Only alphanumeric and underscore characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("passworderr")[0].innerHTML=msg;
	return false;
}

function validatesignup(){
	if(validateusername() && validatepassword() && validatefirstname() && validatelastname()) return true;
	return false;
}

function validateusername(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("usernameerr")[0].innerHTML=msg;
	str=signup.username.value.trim();
	if(str==""){
		msg="Username is required.";
	}
	else if (!str.match(/^[a-zA-Z0-9_]{3,}$/)){
		msg="Invalid Input: Only alphanumeric and underscore characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("usernameerr")[0].innerHTML=msg;
	return false;
}

function validatepassword(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("passworderr")[0].innerHTML=msg;
	str=signup.password.value.trim();
	if(str==""){
		msg="Password is required.";
	}
	else if(str.length<5){
		msg="Invalid Input: Password length should be >= 5."
	}
	else if (!str.match(/^[a-zA-Z0-9_]{3,}$/)){
		msg="Invalid Input: Only alphanumeric and underscore characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("passworderr")[0].innerHTML=msg;
	return false;
}

function validatefirstname(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("firstnameerr")[0].innerHTML=msg;
	str=signup.firstname.value.trim();
	if(str==""){
		msg="First name is required.";
	}
	else if (!str.match(/^[a-zA-Z]{3,}$/)){
		msg="Invalid Input: Only alpha characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("firstnameerr")[0].innerHTML=msg;
	return false;
}

function validatelastname(){
	// alphanumeric and _ only
	msg="";
	document.getElementsByName("lastnameerr")[0].innerHTML=msg;
	str=signup.lastname.value.trim();
	if(str==""){
		msg="Last name is required.";
	}
	else if (!str.match(/^[a-zA-Z]{3,}$/)){
		msg="Invalid Input: Only alpha characters are allowed.";
	}
	if(msg=="") return true;
	document.getElementsByName("lastnameerr")[0].innerHTML=msg;
	return false;
}

function validateorder(){
	ctr=document.getElementsByClassName("count").length;
	console.log(ctr);

	hasItem=0;

	for(i=0; i<ctr; i++)
		// console.log(document.getElementsByClassName("count")[i].value);
		if(document.getElementsByClassName("count")[i].value > 0) hasItem++;
	

	if(hasItem==0) return false;
	return true;
}