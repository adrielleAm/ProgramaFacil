$('form').submit(function validarProgramador() {

var nome = $('#nome').val();
var telefone = $('#telefone').val();
var linkedin = $('#linkedin').val();
// var curriculo = $('#curriculo').val();
var projeto = $('#projeto').val();
var emailContato = $('#emailContato').val();
var senha = $('#senha').val();
var confirmaSenha = $('#confirmaSenha').val();
var java = $('#java').is(':checked');
var web = $('#web').is(':checked');
var php = $('#php').is(':checked');
var android = $('#android').is(':checked');
var outros = $('#outros').val();


	if(nome == ""){
		alert("Preencha o campo nome.");
		return false;
	}

	if(telefone == ""){
		alert("Preencha o campo telefone.");
		return false;
	}

	// if(curriculo == ""){
	// 	alert("Anexe seu currículo.");
	// 	return false;
	// }

	if(projeto == ""){
		alert("Informe ao menos um de seus projetos ja realizados.");
		return false;
	}

	if(java == "" && web == "" && php == "" && android == "" && outros == ""){
		alert("Selecione  pelo menos um conhecimento.");
		return false;
	}

	if(emailContato == ""){
		alert("Preencha o email de contato.");
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
	} else{
		alert("Cadastrado com sucesso!");
		
	}

});
