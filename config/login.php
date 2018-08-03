<?php
date_default_timezone_set('America/Mexico_City');
include_once dirname(__DIR__).'/config/DBConnect.php';
function secSessionStart(){
  // echo "secSessionStart";
  $session_name="sec_session_ship";
  $secure=SECURE;
  //esto detiene que JavaScript sea capaz de acceder a la identificación de la sesión.
  $httponly=true;
  // obliga a las sessiones a solo utilizar cookies.
  if(ini_set('session.use_only_cookies',1)===FALSE){
    echo "nio";
    // header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
    echo "Could not initiate a safe session (ini_set)";
    exit();
  }
  $cookieParams=session_get_cookie_params();
  session_set_cookie_params($cookieParams["lifetime"],
    $cookieParams["path"],
    $cookieParams["domain"],
    $secure,
    $httponly
  );
  session_name($session_name);
  session_start();
  session_regenerate_id();
}

function loginCheck(){
  //session_start();
  //echo $_SESSION['user_id']."<br>".;
  //echo $_SESSION['username']."<br>".;
  //echo $_SESSION['loginString']."<br>".;
// Check if all session variables are set
	if (isset( $_SESSION['idUser'],
		$_SESSION['username'],
		$_SESSION['loginString']))
	{
    //echo "si estoy dentro<br>";
		$idUser = $_SESSION['idUser'];
		$loginString = $_SESSION['loginString'];
		$emailUser = $_SESSION['username'];

			// Get the user-agent string of the user.
  		$userBrowser = $_SERVER['HTTP_USER_AGENT'];

  		$sql = "SELECT \"contrasena\" FROM INCPOWDB.\"ss_usuarios\" WHERE \"id_usuario\" =  '".$idUser."' AND \"estado\" = 1";

  		$db = new DBConnect();

  		$data = $db -> query($sql);

  		//var_dump($data);

  		if(!empty($data)){

  			$password = $data[0][0];

  			$loginCheck = hash('sha512', $password . $userBrowser);

  			if ($loginCheck == $loginString) {
  				// echo "Conectado";
  				return true;
  			} else {
  				return false;
  			}
  		}else{
  			return false;
  		}

	}else{
		return false;
	}
}

function login($user, $password){
  $sql = "SELECT \"id_usuario\", \"usuario\", \"contrasena\", \"id_area\", \"rol\"  FROM INCPOWDB.\"ss_usuarios\" WHERE \"usuario\" = '".$user."' AND \"estado\" = 1";

  //echo $sql;

  $db = new DBConnect();

  $data = $db -> query($sql);

  //var_dump($data);

  if(!empty($data)){

    $idUser= $data[0][0]; 
    $emailUser= $data[0][1]; 
    $passwordUser= $data[0][2]; 
    $areaUser= $data[0][3];
    $rolUser= $data[0][4];

      //$password = hash('sha512', $password);
      //echo $passwordUser;

      // ¡La contraseña es correcta!
    if($passwordUser == $password){
        //session_start();
        // Get the user-agent string of the user.
      $userBrowser = $_SERVER['HTTP_USER_AGENT'];
        // XSS protection as we might print this value
      $_SESSION['emailUser'] = $emailUser;
      $idUser = preg_replace("/[^0-9]+/", "", $idUser);
      $_SESSION['idUser'] = $idUser;
        // XSS protection as we might print this value
      $emailUser = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $emailUser);
      $_SESSION['username'] = $emailUser;
      $_SESSION['loginString'] = hash('sha512', $passwordUser . $userBrowser);
      $_SESSION['rolUser'] = $rolUser;
      $_SESSION['areaUser'] = $areaUser;

      if (isset($_SESSION['username'])){
      echo "La sesión existe ...";
      } 
        // Login successful.
      echo "Login successful";
      return true;
    }else{
      echo "Incorrect password";
      return false;
    }
  }else{
    echo "Incorrect username or doesn't exist";
    return false;
  }
}



?>
