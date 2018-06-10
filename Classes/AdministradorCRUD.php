<?php
require ("Administrador.php");

class AdministradorCRUD extends Administrador
{
	public function __construct()
	{
		$this ->conexao = $this->conBanco();
	}
	

	public function carregarComboBoxCliente(){
	$projetos = '';
	$querySelect = "SELECT *
	FROM pf_cliente";
	$rs = $this->conexao->query($querySelect);
//var_dump($rs); exit;
	$projetos = "<select class='form-control' data-live-search='true' id='clientes' onchange='carregaProjetos()'>";
	foreach ($rs as $resultado){
//		var_dump($resultado['cp_id_cliente'],$resultado['cp_nomeResponsavel']); exit;
		$projetos .= "<option value='{$resultado['cp_id_cliente']}'>{$resultado['cp_nomeResponsavel']}</option>";
	}
		$projetos .= "</select><br></br><input class='btn btn-success' type='button' value='Visualizar' onclick='enviarCliente();'>";
		return $projetos;
	}


	public function carregarComboBoxProgramador(){
		$projetos = '';
		$querySelect = "SELECT *
		FROM pf_programador";
		$rs = $this->conexao->query($querySelect);
//var_dump($rs); exit;
		$projetos = "<select class='form-control' data-live-search='true' id='programadores'>";
		foreach ($rs as $resultado){
//		var_dump($resultado['cp_id_cliente'],$resultado['cp_nomeResponsavel']); exit;
			$projetos .= "<option value='{$resultado['pg_id_programador']}'>{$resultado['pg_nomeResponsavel']}</option>";
		}
		$projetos .= "</select><br></br><input class='btn btn-success' type='button' value='Visualizar' onclick='enviarProgramador();'>";
		
		return $projetos;
	}
public function carregarComboBoxProjetos (){
		$selectProjeto = "SELECT pj_id_projeto,
		pj_id_cliente,
		pj_projetoNome,
		pj_descricao,
		pj_plataforma,
		pj_tipoProjeto 
		FROM pf_projeto
		WHERE pj_id_cliente = '$this->idCliente'";
	$existe = false;
	$rs = $this->conexao->query($selectProjeto);
	$projetos = "<select class='form-control' id='projetos'>";
	foreach ($rs as $resultado){
		$projetos .= "<option value='{$resultado['pj_id_projeto']}'>{$resultado['pj_projetoNome']}</option>";
		$existe = $resultado['pj_id_projeto']?true:false;
	}

	$projetos .= "</select><br> </br><input class='btn btn-success' type='button' value='Visualizar' onclick='enviarProjetos();'>";
	if($existe){
		echo $projetos;
		exit;
	} else {
		echo '<h2>O cliente não possui nenhum projeto cadastrado</h2>';
		exit;
	}

	
}

	public function devolverClienteProjeto(){
		$selectCliente = "SELECT cp_nomeResponsavel,
		pf_empresa,
		cp_emailContato,
		cp_senha,
		cp_tipo,
		cp_situacao
		FROM pf_cliente
		WHERE cp_id_cliente = $this->idCliente";

		$rs['cliente'] = $this->conexao->query($selectCliente);
		
		$selectEndereco = "SELECT cp_id_cliente,
		ed_cep,
		ed_rua,
		ed_bairro,
		ed_cidade,
		ed_ur,
		ed_numero
		FROM pf_endereco
		WHERE cp_id_cliente = $this->idCliente";

		$rs['endereco']  = $this->conexao->query($selectEndereco);
		
		$selectProjeto = "SELECT pj_id_projeto,
		pj_id_cliente,
		pj_projetoNome,
		pj_descricao,
		pj_plataforma,
		pj_tipoProjeto 
		FROM pf_projeto
		WHERE pj_id_cliente = '$this->idProjeto'";

		$rs['projeto'] = $this->conexao->query($selectProjeto);
		
		return $rs;
	}


}