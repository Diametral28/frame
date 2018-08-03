<?php

require_once 'psl-config.php';

class DBConnect {

	private $_db, $_hostname, $_port, $_uid, $_pwd;
	private $conn;

	/**
 	* Constructor
 	*/
	function __construct() {

		/*$this->_db = DATABASE;
		$this->_hostname = HOST;
		$this->_port = PORT;
		$this->_uid = USER;
		$this->_pwd = PASSWORD;
		$this->dbConnect();*/
		$this->conn = $this->dbConnect();
	}

	/**
	 * Function to connect with database
	 */
	public function dbConnect(){
		//$conn_string = "DATABASE=".$this -> _db.";HOSTNAME=".$this -> _hostname.";PORT=".$this -> _port.";PROTOCOL=TCPIP;UID=".$this -> _uid.";PWD=".$this -> _pwd.";";
		$serverName = $_SERVER['SERVER_NAME'];
        $conn_string;
        switch ($serverName) {
            case 'mxgdlchp01.gdl.mex.ibm.com':
                //echo "server1";
                // import database connection variables
                $conn_string = "DATABASE=".DATABASE01.";HOSTNAME=".HOSTNAME01.";PORT=".PORT01.";PROTOCOL=TCPIP;UID=".USER01.";PWD=".PASSWORD01.";";
            break;
            case 'mxgdlchp02.gdl.mex.ibm.com':
                //echo "server1";
                 $conn_string = "DATABASE=".DATABASE02.";HOSTNAME=".HOSTNAME02.";PORT=".PORT02.";PROTOCOL=TCPIP;UID=".USER02.";PWD=".PASSWORD02.";";
            break;
            case 'mxgdlchp03.gdl.mex.ibm.com':
                //echo "server1";
                $conn_string = "DATABASE=".DATABASE03.";HOSTNAME=".HOSTNAME03.";PORT=".PORT03.";PROTOCOL=TCPIP;UID=".USER03.";PWD=".PASSWORD03.";";
            break;
            //default:echo "noserver";
        }
		$this -> conn = db2_connect($conn_string, '', '');

		if ($this -> conn) {
			//echo "Connection succeeded.";
			//echo db2_conn_errormsg();
			return $this -> conn;
		}
		else {
			echo "Connection failed.";
			echo db2_conn_errormsg();
			return false;

		}



	}

	/**
	 * Function to close database connection
	 */
	public function dbClose(){
		if($this -> conn){
			$rc = db2_close($this -> conn);
			if ($rc) {
				//echo "Connection was successfully closed.";
			}
		}
	}

	public function query($sql){
		$values = array();
		$stmt = db2_prepare($this->conn, $sql);
		if($stmt){
			try {
				$result = db2_execute($stmt);
				echo db2_stmt_errormsg();
			} catch (Exception $e) {
				echo "Message  :".$e.getMessage();
			}

			#print_r($stmt);
			if($result){
				while ($row = db2_fetch_array($stmt)) {
					$values[] = $row;
				}
			}else{
				#echo "false ";
				return false;
			}
		}else{
			#echo "error";

		}
		return $values;
	}


	public function queryAssoc($sql){
		$values = array();
		$stmt = db2_prepare($this -> conn, $sql);
		if($stmt){
			$result = db2_execute($stmt);
			if($result){
				while ($row = db2_fetch_assoc($stmt)) {
					$values[] = $row;
				}
			}else{
				return false;
			}
		}
		return $values;
	}


	public function insertData($sql){
		$stmt = db2_prepare($this -> conn, $sql);
		if($stmt){
			$result = db2_execute($stmt);
			echo db2_stmt_errormsg();
			if ($result) {
				return true;
			}else{
				return false;
			}
		}
		return false;
	}

}

?>
