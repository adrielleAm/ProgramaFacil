<?php
require ("BancoDados.php");

class Login extends BancoDados
{
	protected $login;
	protected $senha;
	protected $tipo;
	public $conexao;
	
	public function setTipo($tipo)
	{
		$this->tipo = $tipo;
	}
	
	public function __construct()
	{
		$this->conexao = $this->conBanco();
	}

	public function setLogin($login)
	{
		$this->login = $login;
	}

	public function setSenha($senha)
	{
		$this->senha = $senha;
	}
	
	public function autenticar(){

		$rsProgramador = $this->conexao->query("SELECT pg_id_programador, pg_nomeResponsavel, pg_emailContato, pg_telefone, pg_senha FROM pf_programador where pg_emailContato = '{$this->login}'");
		$rsCliente = $this->conexao->query("SELECT cp_id_cliente, cp_nomeResponsavel, cp_emailContato, cp_senha FROM pf_cliente where cp_emailContato = '{$this->login}'");
		$rsAdministrador = $this->conexao->query("SELECT ad_id_adm, ad_nomeResponsavel, ad_emailContato, ad_senha FROM pf_administrador where ad_emailContato = '{$this->login}'");


//		var_dump($rsProgramador->num_rows); exit;

//		var_dump($rsAdministrador); exit;
		if($rsCliente->num_rows > 0){
			while ($rows = $rsCliente->fetch_assoc()) {
				$nome = $rows['cp_nomeResponsavel'];
				$senha = $rows['cp_senha'];
				$email = $rows['cp_emailContato'];
				$idCliente = $rows['cp_id_cliente'];

				if(!$email){
					echo "<script>alert('O e-mail não esta cadastrado.')</script>";
					return false;
				}

				if(password_verify($this->senha,$senha)){
					session_destroy();
					session_start();
					$_SESSION['nome'] = $nome;
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $idCliente;
					$_SESSION['status'] = 'Logado';
					$_SESSION['tipo'] = 'cliente';
					header('Location: http://localhost:8081/programaFacil/telaCliente.php');
				} else {
					echo 'As senhas são diferentes';
				}
			}

		} elseif ($rsProgramador->num_rows > 0){
	
			while ($rows = $rsProgramador->fetch_assoc()) {
				$nome = $rows['pg_nomeResponsavel'];
				$senha = $rows['pg_senha'];
				$email = $rows['pg_emailContato'];
				$idProgramador = $rows['pg_id_programador'];

				if(!$email){
					echo "<script>alert('O e-mail não esta cadastrado.')</script>";
					return false;
				}

				if(password_verify($this->senha,$senha)){
					session_destroy();
					session_start();
					$_SESSION['nome'] = $nome;
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $idProgramador;
					$_SESSION['status'] = 'Logado';
					$_SESSION['tipo'] = 'programador';

					header('Location: http://localhost:8081/programaFacil/telaProgramador.php');
				} else {
					echo 'As senhas são diferentes';
				}
			}
		} elseif ($rsAdministrador->num_rows > 0){

			while ($rows = $rsAdministrador->fetch_assoc()) {
				$nome = $rows['ad_nomeResponsavel'];
				$senha = $rows['ad_senha'];
				$email = $rows['ad_emailContato'];
				$idAdministrador = $rows['ad_id_adm'];

				if(!$email){
					echo "<script>alert('O e-mail não esta cadastrado.')</script>";
					return false;
				}

				if(password_verify($this->senha,$senha)){
					session_destroy();
					session_start();
					$_SESSION['nome'] = $nome;
					$_SESSION['email'] = $email;
					$_SESSION['id'] = $idAdministrador;
					$_SESSION['status'] = 'Logado';
					$_SESSION['tipo'] = 'administrador';

					header('Location: http://localhost:8081/programaFacil/telaADM.php');
				} else {
					echo 'As senhas são diferentes';
				}
			}
		} else {
			echo "<script>alert('Usuario ou senha incorretas')</script>";
			header('Location: http://localhost:8081/programaFacil/LoginCliente.html');
		}
		
	}
}