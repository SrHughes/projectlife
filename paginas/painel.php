<?php
	require_once $_SERVER['DOCUMENT_ROOT'].'/painel/system/system.php';
	AccessPrivate();

	$dataUser = GetUser();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Painel</title>
	<meta charset="utf-8">
</head>
<body>

	<h2>Olá, <?php  echo $dataUser['name']; ?></h2>

	<hr>
	<a href="?logout" title="Sair">Sair</a>

</body>
</html>