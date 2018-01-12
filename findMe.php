<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Find Me</title>

    <link rel="stylesheet"  href="/css/wheels.css" type="text/css" media="screen" />
</head>

<body >

<h1>Find Me</h1>

<p>Please enter your name and press submit</p>
<p>Required fields are marked with the * symbol and bold.</p>

  <form method="post" action="manageMe.php">
	<table>
	  <tr>
		<th><label for="name">Your name*:</label></th>
		<td><input type="text" name="name" value="" /></td>
	  </tr>
	  <tr>
		<td><input type="submit" name="submit" value="Submit"></td>
	  </tr>
	</table>
  </form>

</body>
</html>
