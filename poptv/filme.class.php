<?php

/**
 *  classe filmes
 */

/*CREATE TABLE `popcorntv`.`filme` (
  `titulo` VARCHAR(50) NULL,
  `codigo` INT NOT NULL AUTO_INCREMENT,
  `sinopse` VARCHAR(100) NULL,
  `quantidade` INT NULL,
  `trailer` VARCHAR(100) NULL,
  PRIMARY KEY (`codigo`));
  */

class Filme
{
	private $titulo;
	private $codigo;
	private $sinopse;
	private $quantidade;
	private $trailer;
	
	function __construct($titulo, $codigo, $sinopse, $quantidade, $trailer)
	{
		$this->titulo = $titulo;
		$this->codigo = $codigo;
		$this->sinopse = $sinopse;
		$this->quantidade = $quantidade;
		$this->trailer = $trailer;
	}

	public function setTitulo($titulo)
	{
		$this->titulo = $titulo;
	}

	public function getTitulo()
	{
		return $this->titulo;
	}
	public function setCodigo($codigo)
	{
		$this->codigo = $codigo;
	}

	public function getCodigo()
	{
		return $this->codigo;
	}

	public function setSinopse($sinopse)
	{
		$this->sinopse = $sinopse;
	}

	public function getSinopse()
	{
		return $this->sinopse;
	}

	public function setQuantidade($quantidade)
	{
		$this->quantidade = $quantidade;
	}

	public function getQuantidade()
	{
		return $this->quantidade;
	}

	public function setTrailer($trailer)
	{
		$this->trailer = $trailer;
	}

	public function getTrailer()
	{
		return $this->trailer;
	}
}

?>