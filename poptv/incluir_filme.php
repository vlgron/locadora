<?php

require 'repositorio.class.php';

$filmeRecebido = new Filme($_REQUEST['titulo'], null, $_REQUEST['sinopse'], $_REQUEST['quantidade'], $_REQUEST['trailer']);

$repositorio->cadastrarFilme($filmeRecebido);

echo "<script> alert('Cadastrado com sucesso!'); </script>";
echo "<script> location.href='index.php'; </script>";

?>