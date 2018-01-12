<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

    <title>Manage Me</title>

    <link rel="stylesheet"  href="/css/wheels.css" type="text/css" media="screen" />
</head>

<body >

<h1>Manage Me</h1>

<?php
$query = "SELECT * FROM person WHERE name='$_POST[name]'";
require_once('_dbConnectX.php');
$result = mysql_query($query) or trigger_error("Query: $query\n<br />MySQL Error: ".mysql_error());
switch (mysql_num_rows($result)) {
  case 0:
    echo "<h>Sorry we cannot find you.</p>";
    break;
  case 1:
    $row = mysql_fetch_array($result, MYSQLI_ASSOC);
    echo "<table>
      <tr>
        <th>id</th><td>".$row['id']."</td>
      </tr>
      <tr>
        <th>name</th> <td>".$row['name']."</td>
      </tr>
      <tr>
        <th>age</th> <td>".$row['age']."</td>
      </tr>
      <tr>
        <th>eyes</th> <td>".$row['eyes']."</td>
      <tr>
        <th>likes</th> <td>".$row['likes']."</td>
      </tr>
    </table>
    <a href='deleteMeForm.php?ref=".$row['id']."'>Delete</a><br />
    <a href='changeMeForm.php?ref=".$row['id']."'>Change</a><br />
    ";
    break;
  default:
    echo "<h>You appear to have added yourself more than once!</p>";
    echo '<table>
      <tr>
        <th>id</th>
        <th>name</th>
        <th>age</th>
        <th>eyes</th>
        <th>likes</th>
        <th></th>
        <th></th>
      </tr>
    ';

    while ($row = mysql_fetch_array($result, MYSQLI_ASSOC)) {
      echo "<tr>";
      echo "  <td>".$row['id']."</td>";
      echo "  <td>".$row['name']."</td>";
      echo "  <td>".$row['age']."</td>";
      echo "  <td>".$row['eyes']."</td>";
      echo "  <td>".$row['likes']."</td>";
      echo "<td><a href='deleteMeForm.php?ref=".$row['id']."'>Delete</a></td>";
      echo "<td><a href='changeMeForm.php?ref=".$row['id']."'>Change</a></td>";
      echo "</tr>";
    }
    echo '</table>';
} //end switch statment

?>

</body>
</html>
