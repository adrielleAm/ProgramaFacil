<?php
require ("Cliente.php");

class ClienteCRUD extends Cliente
{
	public function __construct()
	{
		$this ->conexao = $this->conBanco();
	}
	
	public function incluirCliente(){
		$querySelect = "SELECT * FROM pf_cliente WHERE cp_emailContato = '$this->email'";
		$rs = $this->conexao->query($querySelect);
		if(!$rs){
			$querySelect = "SELECT * FROM pf_programador WHERE cp_emailContato = '$this->email'";
		}
		$rs = $this->conexao->query($querySelect);
		
		foreach ($rs as $resultado){
			$emailExiste = $resultado['cp_emailContato']==$this->email?true:false;
			if($emailExiste == true){
			echo "<script>alert('Este E-mail já esta cadastrado')</script>";
				header('Location: cadastroCliente.html');
			}
		}
		
		$queryCliente = "INSERT INTO pf_cliente (
		cp_nomeResponsavel,
		pf_empresa,
		cp_emailContato,
		cp_senha,
		cp_tipo,
		cp_situacao)
		 values 
		('$this->nome',
		'$this->empresa',
		'$this->email',
		'$this->senha',
		'1',
		'1')";

		$this->conexao->query($queryCliente);
		
		$queryClienteEndereco = "  INSERT INTO pf_endereco (
		cp_id_cliente,
		ed_cep,
		ed_rua,
		ed_bairro,
		ed_cidade,
		ed_ur,
		ed_numero)
		values 
		('{$this->conexao->insert_id}',
		 '$this->cep',
		 '$this->rua',
		 '$this->bairro',
		 '$this->cidade',
		 '$this->uf',
		 '$this->numero')";!

		$this->conexao->query($queryClienteEndereco);

		!$this->conexao->error?header('Location: LoginCliente.html'):var_dump($this->conexao->error);
		}

	public function incluirProjeto(){

		$queryProjeto = "INSERT INTO pf_projeto (
		pj_id_cliente,
		pj_projetoNome,
		pj_descricao,
		pj_plataforma,
		pj_tipoProjeto)
		 values 
		('{$_SESSION['id']}',
		'$this->projeto',
		'$this->descProjeto',
		'$this->outrosPlataformas',
		'$this->outrosProjetos')";

		$this->conexao->query($queryProjeto);
		!$this->conexao->error?header('Location: telaCliente.php'):var_dump($this->conexao->error);
	}
	
	public function carregarProjeto($id){
	$projetos = '';
	$c = 0;
	$querySelect = "SELECT pj_id_projeto,
	pj_id_cliente,
	pj_projetoNome,
	pj_descricao,
	pj_plataforma,
	pj_tipoProjeto 
	FROM pf_projeto
	WHERE pj_id_cliente = '$id'";
	$rs = $this->conexao->query($querySelect);
	
	foreach ($rs as $resultado){
			if($resultado['pj_projetoNome'] && $c < 3) {
			$projetos .= "
			<div class='p-3 align-self-center col-md-4'>
			  <div class='card'>
				<div class='card-block p-5'>
				  <h1 class='text-center m-0 w-100'>
					<span style='font-size: 30px;'>{$resultado['pj_projetoNome']}</span>
				  </h1>
				  <hr>
				  <input type='submit' class='btn btn-dark' onclick='enviarDados({$resultado['pj_id_projeto']});' value='Editar'>
				  <input type='hidden' value='{$resultado['pj_id_projeto']}' name='projeto$c'>
				</div>
			  </div>
			</div>";
			}
		}
		
//	var_dump($projetos); exit;
		return $projetos;
	}
	
	public function devolverProjeto(){
		$querySelect = "SELECT pj_id_projeto,
		pj_id_cliente,
		pj_projetoNome,
		pj_descricao,
		pj_plataforma,
		pj_tipoProjeto 
		FROM pf_projeto
		WHERE pj_id_projeto = '$this->idProjeto'";
		return $rs = $this->conexao->query($querySelect);
	}
	
	public function devolverCliente()
	{
		$selectClienteDados = "SELECT * FROM pf_cliente 
		INNER JOIN pf_endereco ON pf_endereco.cp_id_pessoa = pf_cliente.cp_id_cliente
		WHERE cp_id_cliente = '$this->idCliente'";
		
		$rs = $this->conexao->query($selectClienteDados);
		return $rs;
	}

	public function atualizaProjeto(){
		$querySelect = "UPDATE pf_projeto
		SET 
		pj_projetoNome = '$this->projeto',
		pj_descricao = '$this->descProjeto',
		pj_plataforma = '$this->outrosPlataformas',
		pj_tipoProjeto = '$this->outrosProjetos' 
		WHERE pj_id_projeto = '$this->idProjeto'";
		$this->conexao->query($querySelect);
		header('Location: telaCliente.php');
		
	}

}