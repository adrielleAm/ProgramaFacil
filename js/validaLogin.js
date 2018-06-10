$('form').submit(function validarLogin() {

	var email = $('#email').val();
	var senha = $('#senha').val();

	if(email == ""){
		alert("Informe seu email!");
		return false;
	}

	if(senha == ""){
		alert("Informe sua senha!");
		return false;
	} 
});