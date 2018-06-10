<?php
session_start();
//var_dump($_POST); exit;
// recebe o tipo de ação que vai executar
$tipo = isset($_POST['tipo'])?$_POST['tipo']:null;
$acao = isset($_POST['acao'])?$_POST['acao']:null;
//var_dump($tipo,$acao ); exit;
if($tipo === 'cliente'){
	require ('Classes\ClienteCRUD.php');
	$cliente = new ClienteCRUD();
	switch ($acao)
	{
		case 'incluirCliente':
			$cliente->setEmpresa(isset($_POST['nomeEmpresa'])?$_POST['nomeEmpresa']:null);
			$cliente->setNome(isset($_POST['nomeResponsavel'])?$_POST['nomeResponsavel']:null);
			$cliente->setSite(isset($_POST['site'])?$_POST['site']:null);

			 $cliente->setCep(isset($_POST['cep'])?$_POST['cep']:null);
			 $cliente->setRua(isset($_POST['rua'])?$_POST['rua']:null);
			 $cliente->setNumero(isset($_POST['numero'])?$_POST['numero']:null);
			 $cliente->setBairro(isset($_POST['bairro'])?$_POST['bairro']:null);
			 $cliente->setCidade(isset($_POST['cidade'])?$_POST['cidade']:null);
			 $cliente->setUf(isset($_POST['uf'])?$_POST['uf']:null);

			 $cliente->setEmail(isset($_POST['emailContato'])?$_POST['emailContato']:null);
			 $cliente->setSenha(isset($_POST['senha'])?$_POST['senha']:null, isset($_POST['confirmaSenha'])?$_POST['confirmaSenha']:null);
			
			 $cliente->incluirCliente();
			break;
		case 'incluirProjeto':
			$conhecimento[0] = (isset($_POST['mobile'])?$_POST['mobile']:null);
			$conhecimento[1] = (isset($_POST['web'])?$_POST['web']:null);
			$conhecimento[2] = (isset($_POST['desktop'])?$_POST['desktop']:null);
			$cliente->setOutrosProjetos($conhecimento,isset($_POST['outrosProjetos'])?$_POST['outrosProjetos']:null);

			$plataformas[0] = (isset($_POST['estoque'])?$_POST['estoque']:null);
			$plataformas[1] = (isset($_POST['ecomerce'])?$_POST['ecomerce']:null);
			$plataformas[2] = (isset($_POST['blog'])?$_POST['blog']:null);
			$cliente->setOutrosPlataformas($plataformas,(isset($_POST['outrosPlataformas'])?$_POST['outrosPlataformas']:null));
			
			$cliente->setProjeto(isset($_POST['nomeProjeto'])?$_POST['nomeProjeto']:null);
			$cliente->setDescProjeto(isset($_POST['descProjeto'])?$_POST['descProjeto']:null);
			$cliente->incluirProjeto();
			break;
		case 'atualizarProjeto':
		
			$conhecimento[0] = (isset($_POST['mobile'])?$_POST['mobile']:null);
			$conhecimento[1] = (isset($_POST['web'])?$_POST['web']:null);
			$conhecimento[2] = (isset($_POST['desktop'])?$_POST['desktop']:null);
			$cliente->setOutrosProjetos($conhecimento,isset($_POST['outrosProjetos'])?$_POST['outrosProjetos']:null);

			$plataformas[0] = (isset($_POST['estoque'])?$_POST['estoque']:null);
			$plataformas[1] = (isset($_POST['ecomerce'])?$_POST['ecomerce']:null);
			$plataformas[2] = (isset($_POST['blog'])?$_POST['blog']:null);
			$cliente->setOutrosPlataformas($plataformas,(isset($_POST['outrosPlataformas'])?$_POST['outrosPlataformas']:null));

			$cliente->setProjeto(isset($_POST['nomeProjeto'])?$_POST['nomeProjeto']:null);
			$cliente->setDescProjeto(isset($_POST['descProjeto'])?$_POST['descProjeto']:null);
			$cliente->setIdProjeto(isset($_POST['idProjetoHidden'])?$_POST['idProjetoHidden']:null);
			$cliente->atualizaProjeto();
			break;
	}
	
} elseif($tipo === 'programador'){
	require ('Classes\ProgramadorCRUD.php');
	$programador = new ProgramadorCRUD();
	switch ($acao)
	{
		case 'incluirProgramador':
		
			$conhecimento[0] = (isset($_POST['java'])?$_POST['java']:null);
			$conhecimento[1] = (isset($_POST['web'])?$_POST['web']:null);
			$conhecimento[2] = (isset($_POST['php'])?$_POST['php']:null);
			$conhecimento[3] = (isset($_POST['android'])?$_POST['android']:null);
			$programador->setConhecimentosOutros($conhecimento,isset($_POST['outros'])?$_POST['outros']:null);
			
			$programador->setEmpresa(isset($_POST['nomeEmpresa'])?$_POST['nomeEmpresa']:null);
			$programador->setNome(isset($_POST['nome'])?$_POST['nome']:null);
			$programador->setTelefone(isset($_POST['telefone'])?$_POST['telefone']:null);
			$programador->setLinkedin(isset($_POST['linkedin'])?$_POST['linkedin']:null);
			$programador->setCurriculoFile(isset($_FILES['curriculo'])?$_FILES['curriculo']:null);

			$programador->setEmail(isset($_POST['emailContato'])?$_POST['emailContato']:null);
			$programador->setSenha(isset($_POST['senha'])?$_POST['senha']:null, isset($_POST['confirmaSenha'])?$_POST['confirmaSenha']:null);
			
			$programador->incluirProgramador();
			break;
		case 'incluirProgramadorProjeto':
			$programador->setIdProgramador(isset($_POST['idProgramador'])?$_POST['idProgramador']:null);
			$idProjeto = isset($_POST['idProjeto'])?$_POST['idProjeto']:null;
			$programador->incluirProgramadorProjeto($idProjeto);
			break;
	}
	
} elseif($tipo === 'administrador'){
	require ("Classes/AdministradorCRUD.php");
	$administrador = new AdministradorCRUD();
	$administrador->setIdCliente(isset($_POST['idCliente'])?$_POST['idCliente']:null);
	$administrador->carregarComboBoxProjetos();
} elseif ($tipo == 'login'){
	require ('Classes\Login.php');
	$login = new Login();
	switch ($acao){
		case 'logar':
			$login->setLogin(isset($_POST['email'])?$_POST['email']:null);
			$login->setSenha(isset($_POST['senha'])?$_POST['senha']:null);
			$login->setTipo(isset($_POST['tipoLogin'])?$_POST['tipoLogin']:null);
			$login->autenticar();
			break;
	}
}
























//switch ($acoes)
//{
//	case 'incluirCliente':
//		$clienteProgramador->setNome(isset($_POST['nome'])?$_POST['nome']:null);
//		$clienteProgramador->setDataNascimento(isset($_POST['dataNasc'])?$_POST['dataNasc']:null);
//		$clienteProgramador->setCpf(isset($_POST['cpf'])?$_POST['cpf']:null);
//		$clienteProgramador->setTelefone(isset($_POST['telefone'])?$_POST['telefone']:null);
//
//		$clienteProgramador->setCep(isset($_POST['cep'])?$_POST['cep']:null);
//		$clienteProgramador->setLogradouro(isset($_POST['logradouro'])?$_POST['logradouro']:null);
//		$clienteProgramador->setNumero(isset($_POST['numeroLogradouro'])?$_POST['numeroLogradouro']:null);
//		$clienteProgramador->setBairro(isset($_POST['bairro'])?$_POST['bairro']:null);
//		$clienteProgramador->setCidade(isset($_POST['cidade'])?$_POST['cidade']:null);
//		$clienteProgramador->setEstado(isset($_POST['estado'])?$_POST['estado']:null);
//
//		$clienteProgramador->setEmail(isset($_POST['email'])?$_POST['email']:null);
//		$clienteProgramador->setSenha(isset($_POST['senhaUm'])?$_POST['senhaUm']:null, isset($_POST['senhaDois'])?$_POST['senhaDois']:null);
//		
//		$clienteProgramador->setLinkedin(isset($_POST['linkedin'])?$_POST['linkedin']:null, isset($_POST['senhaDois'])?$_POST['senhaDois']:null);
//		$clienteProgramador->setInformacoes(isset($_POST['outrosProgramador'])?$_POST['outrosProgramador']:null);
//		$clienteProgramador->setProjetos(isset($_POST['projetosRealizados'])?$_POST['projetosRealizados']:null);
//		
//		
//		$clienteProgramador->incluirClienteProgramador($tipo);
//		break;
//
//	case 'incluirProgramador':
//		$clienteProgramador->setNome(isset($_POST['nome'])?$_POST['nome']:null);
//		$clienteProgramador->setDataNascimento(isset($_POST['dataNasc'])?$_POST['dataNasc']:null);
//		$clienteProgramador->setCpf(isset($_POST['cpf'])?$_POST['cpf']:null);
//		$clienteProgramador->setTelefone(isset($_POST['telefone'])?$_POST['telefone']:null);
//
//		$clienteProgramador->setCep(isset($_POST['cep'])?$_POST['cep']:null);
//		$clienteProgramador->setLogradouro(isset($_POST['logradouro'])?$_POST['logradouro']:null);
//		$clienteProgramador->setNumero(isset($_POST['numeroLogradouro'])?$_POST['numeroLogradouro']:null);
//		$clienteProgramador->setBairro(isset($_POST['bairro'])?$_POST['bairro']:null);
//		$clienteProgramador->setCidade(isset($_POST['cidade'])?$_POST['cidade']:null);
//		$clienteProgramador->setEstado(isset($_POST['estado'])?$_POST['estado']:null);
//
//		$clienteProgramador->setEmail(isset($_POST['email'])?$_POST['email']:null);
//		$clienteProgramador->setSenha(isset($_POST['senhaUm'])?$_POST['senhaUm']:null, isset($_POST['senhaDois'])?$_POST['senhaDois']:null);
//
//		$clienteProgramador->setLinkedin(isset($_POST['linkedin'])?$_POST['linkedin']:null, isset($_POST['senhaDois'])?$_POST['senhaDois']:null);
//		$clienteProgramador->setInformacoes(isset($_POST['outrosProgramador'])?$_POST['outrosProgramador']:null);
//		$clienteProgramador->setProjetos(isset($_POST['projetosRealizados'])?$_POST['projetosRealizados']:null);
//
//
//		$clienteProgramador->incluirClienteProgramador($tipo);
//		break;
//		
//	case 'incluirProjeto':
//		
//		$clienteProgramador->setPjProjetoNome(isset($_POST['nomeProjeto'])?$_POST['nomeProjeto']:null);
//		$clienteProgramador->setPjDescricao(isset($_POST['descricaoProjeto'])?$_POST['descricaoProjeto']:null);
//		$clienteProgramador->setPjPrazoEntrega(isset($_POST['prazoEntrega'])?$_POST['prazoEntrega']:null);
//		$clienteProgramador->setIdCliente(isset($_SESSION['idCliente'])?$_SESSION['idCliente']:null);
//		$clienteProgramador->incluirProjeto();
////		var_dump($_POST,$_SESSION['idCliente']);
//		break;
//
//	case 'clienteLogando':
//		$clienteProgramador->setLogin(isset($_POST['emailLogin'])?$_POST['emailLogin']:null);
//		$clienteProgramador->setSenhaLogin(isset($_POST['senhaLogin'])?$_POST['senhaLogin']:null);
//
//		$clienteProgramador->recebeLogin();
//		break;
//}

