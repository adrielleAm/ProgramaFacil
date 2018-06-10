$('form').submit(function validarProjeto() {

var nomeProjeto = $('#nomeProjeto').val();
var descProjeto = $('#descProjeto').val();
var web = $('#web').is(':checked');
var mobile = $('#mobile').is(':checked');
var desktop = $('#desktop').is(':checked');
var outrosPlataforma = $('#outrosPlataforma').val();
var estoque = $('#estoque').is(':checked');
var ecomerce = $('#ecomerce').is(':checked');
var blog = $('#blog').is(':checked');
var outrosProjeto = $('#outrosProjeto').val();


	if(nomeProjeto == ""){
		alert("Preencha o campo nome do projeto.");
		return false;
	}

	if(descProjeto == ""){
		alert("Preencha uma breve descrição do projeto.");
		return false;
	}

	if(web == "" && mobile == "" && desktop == "" && outrosPlataforma == ""){
		alert("Escolha uma das plataformas disponiveis ou informe outra.");
		return false;
	}

	if(estoque == "" && ecomerce == "" && blog == "" && outrosProjeto == ""){
		alert("Escolha uma das opções de projetos disponiveis ou informe outra.");
		return false;
	} else{
		alert("Cadastrado realizado com sucesso!");
		return true;
	}


});