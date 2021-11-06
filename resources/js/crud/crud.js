renderCreateForm = function(){
	const form = document.getElementById("form-crud");
	
	let methodInput = document.getElementById("method-input");
	if(methodInput){
		methodInput.remove();
	}
	let cancelBtn = document.getElementById("btn-cancel");
	if(cancelBtn){
		cancelBtn.remove();
	}
	form.setAttribute("action",CREATE_URL);
	document.getElementById("input-id").value = "";
	form.reset();
	document.getElementById("btn-create").value = "Guardar";
}

renderUpdateForm = function(e){
	e.preventDefault();
	const form = document.getElementById("form-crud");
	
	let methodInput = document.getElementById("method-input");
	if(!methodInput){
		methodInput = document.createElement("input");
		methodInput.setAttribute("type","hidden");
		methodInput.setAttribute("name","_method");
		methodInput.setAttribute("value","PUT");
		methodInput.setAttribute("id","method-input");
		form.prepend(methodInput);
	}
	let cancelBtn = document.getElementById("btn-cancel");
	if(!cancelBtn){
		cancelBtn = document.createElement("input");
		cancelBtn.setAttribute("type","button");
		cancelBtn.setAttribute("value","Cancelar");
		cancelBtn.setAttribute("id","btn-cancel");
		cancelBtn.classList.add("btn","btn-warning","text-white");
		form.append(cancelBtn);
		cancelBtn.addEventListener("click",renderCreateForm)
	}
	const btn = e.currentTarget;
	const id = btn.getAttribute("data-id");
	const tr = btn.closest("tr");
	const name =tr.children[0].innerHTML;
	const lastname = tr.children[1].innerHTML;
	const gender = tr.children[2].innerHTML;
	const birthdate = tr.children[3].innerHTML;
	form.setAttribute("action",UPDATE_URL+"/"+id);
	document.getElementById("input-id").value = id;
	document.getElementById("name").value = name;
	document.getElementById("lastname").value = lastname;
	document.getElementById("gender").value = gender;
	document.getElementById("birthdate").value = birthdate;
	document.getElementById("btn-create").value = "Modificar";
}
renderCreateForm();
