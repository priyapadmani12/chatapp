const pswrdField = document.querySelector(".from input[type='password']"),
toggleIcon= document.querySelector(".from .field i");

toggleIcon.onclick=()=>{
	if (pswrdField.type==="password") 
	{
		pswrdField.type="text";
		toggleIcon.classList.add("active");
	}
	else
	{
		pswrdField.type==="password";
		toggleIcon.classList.remove("active");	
	}

}