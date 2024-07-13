<?php

/**
 * Classe de conexão com o banco de dados
 */
class Conexao
{
	private $host;
	private $usuario;
	private $senha;
	private $banco;
	private $conexao;
	
	function __construct($host, $usuario, $senha, $banco)
	{
		$this->host = $host;
		$this->usuario = $usuario;
		$this->senha = $senha;
		$this->banco = $banco;
	}

	function conectar()
	{
		$this->conexao = mysqli_connect(
			$this->host,
			$this->usuario,
			$this->senha,
			$this->banco);
		if (mysqli_connect_errno()) {
			return false;
		}else{
			mysqli_query($this->conexao, "SET NAMES 'utf8';");
			return true;
		}
	}

	function executarQuery($sql)
	{
		return mysqli_query($this->conexao, $sql);
	}

	function obterPrimeiroRegistroQuery($query)
	{
		$linhas = $this->executarQuery($query);
		return mysqli_fetch_array($linhas);
	}
}

?>