<?php
require ("programador.php");

class ProgramadorCRUD extends programador
{
	public function __construct()
	{
		$this ->conexao = $this->conBanco();
	}
	
	public function incluirprogramador(){
		$querySelect = "SELECT * FROM pf_programador WHERE pg_emailContato = '$this->email'";
		$rs = $this->conexao->query($querySelect);
		foreach ($rs as $resultado){
			$emailExiste = $resultado['pg_emailContato']==$this->email?true:false;
			if($emailExiste == true){
			echo "<script>alert('Este E-mail já esta cadastrado')</script>";
				sleep(3);
				header('Location: cadastroprogramador.html');
				exit;
			}
		}
		
		$queryprogramador = "INSERT INTO pf_programador (
		pg_nomeResponsavel,
		pg_telefone,
		pg_linkedin,
		pg_curriculo,
		pg_emailContato,
		pg_senha,
		pg_tipo,
		pg_situacao)
		 values 
		('$this->nome',
		'$this->telefone',
		'$this->linkedin',
		'$this->curriculoFile',
		'$this->email',
		'$this->senha',
		'2',
		'1')";

		$this->conexao->query($queryprogramador);

		!$this->conexao->error?header('Location: LoginCliente.html'):var_dump($this->conexao->error);
		}

	public function devolverProgramador()
	{
		$selectProgramadorDados = "SELECT * FROM pf_programador
		WHERE pg_id_programador = '$this->idProgramador'";

		$rs = $this->conexao->query($selectProgramadorDados);
		return $rs;
	}
	
	public function incluirProgramadorProjeto ($idProjeto){
//		var_dump($idProjeto, $this->idProgramador); exit;
		$updateProgramador = "UPDATE pf_projeto
		SET pf_id_programador = '$this->idProgramador'
		WHERE pj_id_projeto = '$idProjeto'";

		$this->conexao->query($updateProgramador);
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
		WHERE pf_id_programador = '$id'";
		$rs = $this->conexao->query($querySelect);

		foreach ($rs as $resultado){
			if($resultado['pj_projetoNome']) {
				$projetos .= "
			<div class='p-3 align-self-center col-md-4'>
			  <div class='card'>
				<div class='card-block p-5'>
				  <h1 class='text-center m-0 w-100'>
					<span style='font-size: 30px;'>{$resultado['pj_projetoNome']}</span>
				  </h1>
				  <hr>
				  <input type='submit' class='btn btn-dark' onclick='enviarDados({$resultado['pj_id_projeto']});' value='Visualizar'>
				  <input type='hidden' value='{$resultado['pj_id_projeto']}' name='projeto$c'>
				</div>
			  </div>
			</div>";
			}
		}

//	var_dump($projetos); exit;
		return $projetos;
	}

}