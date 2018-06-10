$('form').submit(function validarCliente() {
	var nomeEmpresa = $('#nomeEmpresa').val();
	var nomeResponsavel = $('#nomeResponsavel').val();
	var emailContato = $('#emailContato').val();
	var senha = $('#senha').val();
	var confirmaSenha = $('#confirmaSenha').val();
	var cep = $('#cep').val();
	var numero = $('#numero').val();

	if(nomeEmpresa == ""){
		alert("Preencha o campo nome da empresa.");
		return false;
	}

	if(nomeResponsavel == ""){
		alert("Preencha o campo nome do responsavel.");
		return false;
	}

	if(cep == ""){
		alert("Informe um CEP.");
		return false;
	}

	if(numero == ""){
		alert("Informe um numero de endereço.");
		return false;
	}

	if(emailContato == ""){
		alert("Preencha o email da empresa.");
		return false;
	}

	if(senha == ""){
		alert("Informe uma senha.");
		return false;
	} else if(senha.length <= 5 || senha.length > 8){
		alert("Informe uma senha de 6 a 8 caracteres.");
		return false;
	}

	if(confirmaSenha == ""){
		alert("Confirme a senha.");
		return false;
	}

	if(confirmaSenha != senha){
		alert("Digite uma senha igual a informada.");
		return false;
	}else{
		alert("Cadastrado com sucesso!");
		return true;
	}

});


