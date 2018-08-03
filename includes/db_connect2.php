<?php
include_once 'psl-config.php';
class DB_CONNECT {

    // constructor
    function __construct() {
        // connecting to database
        //echo "construct del db_connect";
        $this->conn = $this->connect();
    }

    // destructor
    function __destruct() {
        // closing db connection
        //$this->close();
    }

    /**
     * Function to connect with database
     */
    function connect() {
        // import database connection variables
        $conn_string = "DATABASE=".DATABASE.";HOSTNAME=".HOST.";PORT=".PORT.";PROTOCOL=TCPIP;UID=".USER.";PWD=".PASSWORD.";";
        //$conn_string = "DATABASE=INCPOWDB;HOSTNAME=9.7.69.58;PORT=60000;PROTOCOL=TCPIP;UID=IVANALF;PWD=uBzH7be1;";
		$con = db2_connect($conn_string, '', '');
        // returing connection cursor
        return $con;
    }

    /**
     * Function to close db connection
     */
    function db_close() {
        // closing db connection

      if($this->conn){
			db2_close($this->conn);
		//echo "session close";
		}
    }

}

?>
