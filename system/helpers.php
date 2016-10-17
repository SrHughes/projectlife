<?php

	/*=====================================================*/
		/* PROTEÇÂO */

		// Controla Acesso Publico
		function AccessPublic(){
			if(IsLogged()) 
				Redirect(URL_PAINEL);
		}

		//Controla Acesso Privado
		function AccessPrivate(){
			if (!IsLogged())
				Redirect(URL_BASE);
		}
		
	/*=====================================================*/


	/*=====================================================*/
		/* SESSÂO */

		//Efetua Logout
		function DoLogout(){
			if (isset($_GET['logout'])) 
				DestroySession();
		}

		// Destroi Sessão
		function DestroySession(){
			unset($_SESSION['userlog']);
			AccessPrivate();
		}

		// Cria a Sessão
		function CreateSession($username, $password){
			$key = GetKey($username, $password);
			UserLog($key);
			AccessPublic();
		}

		//Seta ou Recupera USER LOG
		function UserLog($value = null){
			if ($value === null)
				return $_SESSION['userlog'];
			else
				$_SESSION['userlog'] = $value;
		}

		//Verifica Login
		function IsLogged(){
			if (!isset($_SESSION['userlog']) || empty($_SESSION['userlog']))
				return false;
			else{
				if(StayLogged())
					return true;
				else
					DestroySession();
			}
		}

	/*=====================================================*/

	// Criptografar Senhas
	function CryptPassword($password){
		return sha1($password);
	}

	//Gera KEY de Usuário
	function KeyGenerator(){
		return sha1(rand().time());
	}

	// Recuperar POST
	function GetPost($key = null){
		if ($key === null) 
			return $_POST;
		else
			return(isset($_POST[$key])) ? ClearString($_POST[$key]) : false;
	}	
	

	//Redireciona
	function Redirect($url){
		header("Location: ".$url);
		die();
	}

	// Limpa String
	function ClearString($str){
		return mysql_real_escape_string(strip_tags(trim($str)));
	}
	?>