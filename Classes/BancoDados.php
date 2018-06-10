<?php

class BancoDados
{
	public $conexao;
	public function __construct()
	{
		$this->conBanco();
	}

	public function conBanco (){
		return $this->conexao = mysqli_connect('localhost','root','','programaFacil');
	}
	
}