<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Change Me</title>

    <link rel="stylesheet"  href="/css/wheels.css" type="text/css" media="screen" />
</head>

<body >

<h1>Change Me</h1>

<?php
  if (isset($_POST['submit'])) {
    print_r($_POST);

    $query = "UPDATE person
              SET eyes='$_POST[eyeColour]', age='$_POST[age]', likes='$_POST[likes]'
              WHERE id='$_REQUEST[ref]'";
	require_once('_dbConnectX.php');
	$result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: ".mysql_error());
    if (mysql_affected_rows() == 1) {
  	  echo '<p>Thank for, your data has been updated</p>';
    } else {
	  echo '<p>An unexpected error occured and we are unable to continue.</p>';
    }
  }
?>

</body>
</html>
