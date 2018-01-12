<?php # script _dbConnectX.php

//check the call came from where expected
//setup the database access values as constants
define ('db_host', 'localhost');
define ('db_password', '');
define ('db_user', 'root');
define ('db_name', 'test');


//attempt to connect to the database
if ($dbc = mysql_connect(db_host, db_user, db_password)) {
  //attempt to select the correct database
  if (!mysql_select_db (db_name)) {
	echo "Unable to select the database.\n<br />
	  MYSQL error: ".mysql_error();
	exit();
  }
} else {
  //cannot connect to the database
  echo "Unable to connect to the database.\n<br />
	MYSQL error: ".mysql_error();
  exit();
}

?>