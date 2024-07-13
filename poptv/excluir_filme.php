<?php

require 'repositorio.class.php';

$repositorio->removerFilme($_REQUEST['codigo']);

header('location: index.php');

?>