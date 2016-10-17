<?php

	// Recupera Informações do Usuário
	function GetUser($key = null){
		if(!IsLogged())
			return false;
		else{
			$userkey = UserLog();
			$query = "SELECT * FROM membros WHERE userkey = '$userkey' AND status = true LIMIT 1";
			$result = mysql_query($query) or die (mysql_error());
			$data = mysql_fetch_assoc($result);

			if($key == null)
				return $data;
			else
				return (isset($data[$key])) ? $data[$key] : false;

		}
	}

	// Verifica Usuário Logado
	function StayLogged(){
		$userkey = UserLog();
		$query = "SELECT userkey FROM membros WHERE userkey = '$userkey' AND status = true ";
		$result = mysql_query($query) or die(mysql_error());

		if(mysql_num_rows($result) <= 0)
			return false;
		else
			return true;
	}

	// Recupera Key
	function GetKey($username, $password){
		$dataUser = UserVerify($username, $password);
		return $dataUser;
	}

	// Verifica Usuário
	function UserVerify($username, $password, $status = false){
		$password = CryptPassword($password);
		$query = "SELECT * FROM membros WHERE username = '$username' AND password = '$password'";
		$query .= ($status) ? ' AND status = true ' : '';
		$result = mysql_query($query) or die(mysql_error());

		if (mysql_num_rows($result) <= 0) 
			return false;
		else
			$data = mysql_fetch_assoc($result);
			return $data['userkey']; 
		
	}


	// Cadastra Usuario
	function Register($name, $mail, $username, $password, $status = true){
		$password = CryptPassword($password);
		$userKey = KeyGenerator();
		$register = time();

		$query = "INSERT INTO membros(name, mail, username, password, userkey, register, status)";
		$query .= "VALUES('$name', '$mail', '$username', '$password', '$userKey', $register, $status)";

		return mysql_query($query) or die(mysql_error());


	}

	// Verifica se Login Existe
		function UserNameExists($username){
		$query = "SELECT username FROM membros WHERE username = '$username'";
		$result = mysql_query($query) or die(mysql_error());
		
		if (mysql_num_rows($result) <= 0) 
			return true;
		else
			return false;
	}
	// Verifica se Existe Email
	function MailExists($mail){
		$query = "SELECT mail FROM membros WHERE mail = '$mail'";
		$result = mysql_query($query) or die(mysql_error());
		
		if (mysql_num_rows($result) <= 0) 
			return true;
		else
			return false;
			
		
	}

	// Conexão com Banco de Dados
	function Connect(){
		$conn = mysql_connect(HOSTNAME, USERNAME, PASSWORD);

		if (!$conn) 
			die(mysql_error());
		else {
			mysql_select_db(DATABASE, $conn) or die(mysql_error());

			mysql_query("SET NAMES 'utf-8'");
			mysql_query("SET character_set_connection=utf8");
			mysql_query("SET character_set_client=utf8");
			mysql_query("SET character_set_results=utf8");
		}
	}
?>