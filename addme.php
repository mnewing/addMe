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

    $query = "INSERT INTO person (name, eyes, age) VALUES ('$_POST[name]', '$_POST[eyeColour]', '$_POST[age]')";
    require_once('../scripts/_dbConnectX.php');
    $result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: ".mysql_error());
    if (mysql_affected_rows() == 1) {
      echo '<p>Thank for, you have been added to the database</p>';
    } else {
      echo '<p>An unexpected error occured and we are unable to continue.</p>';
    }
  } else {
    echo '<p>You need to fill in the form first.</p>';
  }
?>

</body>
</html>
