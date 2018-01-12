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
  $query = "SELECT * FROM person WHERE id='$_REQUEST[ref]'";
  require_once('_dbConnectX.php');
  $result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: ".mysql_error());
  $row = mysql_fetch_array($result, MYSQLI_ASSOC);
  showForm($row['name'],$row['eyes'],$row['age'],$row['likes']);
?>


<?php
  function showForm($name,$eyeColour,$age,$likes) {
?>
	<p>To be added to the database fill in the form and press submit.</p>
	<p>Required fields are marked with the * symbol and bold.</p>

	<div id="contact_form">
	  <form method="post" action="">
		<table>
		  <tr>
			<th><label for="name">Your name*:</label></th>
			<td><label for="name"><?php echo $name?></label></td>
		  </tr>
		  <tr>
			<th><label for="eyeColour">Eye Colour*:</label></th>
			<td><input type="text" name="eyeColour" value="<?php echo $eyeColour?>" /></td>
		  </tr>
		  <tr>
			<th><label for="age">Age*:</label></th>
			<td><input type="text" name="age" value="<?php echo $age?>" /></td>
		  </tr>
		  <tr>
			<th><label for="likes">Likes:</label></th>
			<td><textarea name="likes"  rows="10" cols="50"><?php echo $likes?>"</textarea></td>
		  </tr>
		  <tr>
			<td><input type="submit" name="submit" value="Submit"></td>
		  </tr>
		</table>
	  </form>
	</div>  <!-- end contact_table -->
<?php
  } //end function showForm
?>

</body>
</html>
