<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Add me please</title>

    <meta name="description" content="Send the form data using post, validating the data then ">

    <link rel="stylesheet"  href="/css/wheels.css" type="text/css" media="screen" />
</head>

<body >

<h1>Add Me</h1>

<?php
  if (isset($_POST['submit'])) {
    print_r($_POST);

    $errors = array();
    validateSimpleText($_POST['name'],"Name",100,3);
    validateSimpleText($_POST['eyeColour'],"Eye Colour",20,4);
    validateSimpleText($_POST['age'],"Age",3,1);

	if (empty($errors)) {
	  $query = "INSERT INTO person (name, eyes, age) VALUES ('$_POST[name]', '$_POST[eyeColour]', '$_POST[age]')";
	  require_once('_dbConnectX.php');
	  $result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: ".mysql_error());
      if (mysql_affected_rows() == 1) {
  	    echo '<p>Thank for, you have been added to the database</p>';
      } else {
	      echo '<p>An unexpected error occured and we are unable to continue.</p>';
      }
	} else {
	  echo '<p>Please rectify the following errors and try again:</p>';
	  echo "$errors<br />";
	  foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	  }
	}
  } else {
	echo '<p>You need to fill in the form first.</p>';
  }

  function validateSimpleText($dataEntered,$fieldName,$maxLength, $minLength = 0) {
    global $errors;

    //an empty field is valid
    if (($minLength == 0) && empty($dataEntered)) {
      return true;
    }

    //check length
    if ((strlen($dataEntered) >= $minLength) && (strlen($dataEntered) <= $maxLength)) {
      return true;
    }

    $errors[] = "The value entered for ".$fieldName." is invalid, please enter only alpha/numeric values and simple punctuation between ".$minLength." and ".$maxLength." characters.";
    return false;
  }

  function escapeData() {
    //if (ini_get('magic_quotes_gpc')) {
    if (get_magic_quotes_gpc()) {
      $name = stripslashes($name);
      echo "<p>slashes stripped: ".$name."</p>";
    }
    $name = mysql_real_escape_string($name);
    echo "<p>Post all escape stuff: ".$name."</p>";
  }
?>

</body>
</html>
