<?
	require_once('engine.php');
?>
<html>
<head>
<title>MD5 Data0.Net</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function setFocus()
{
     document.getElementById("search").focus();
}
</script>
<style type="text/css">
<!--
a:link {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #009933;
	text-decoration: underline;
}
a:hover {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	text-decoration: underline;
}
a:visited {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	text-decoration: underline;
}
-->
</style>
</head>

<body onload="setFocus()">
<div align="center">
	<br/>
	<br/>
	<br/>
	<p><a href="./"><img src="as.png" border="0"></a></p>
<p></p>
<form name="form1" method="post" action="search.php">
  <table border="0" align="center" cellpadding="0" cellspacing="0">
    <tr> 
      <td> <div align="center"></div>
        <div align="center"> 
          <input name="search" type="text" id="search" size="50">
          <img src="clear.gif" width="10" height="5"> 
          <input type="submit" name="Submit" value="Go">
        </div></td>
    </tr>
  </table>
</form>
<p><font size="1" face="Verdana, Arial, Helvetica, sans-serif"> 
<?
	dosearch($_POST['search']);
?>
<?php
	$link = mysql_connect('localhost', 'root', 'alter75');
	if (! $link) 
		die('Unable to connect to the database');
	mysql_select_db('myd5') or die('Could not open database.');
	$sql = "SELECT * FROM search";
	$sql = mysql_real_escape_string($sql);
	$query = mysql_query($sql);
	$num_rows = mysql_num_rows($query);
	echo '<br/>';
	echo "Search over " .$num_rows. " of value and counting.";
	echo '<br/>';
?>
  <br>
  </font><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
	<a href="">T&C</a> | <a href="">Legal</a> | <a href="">About</a> | <a href="">Contact</a> | &copy; 2010 <a href="http://www.data0.net">Data0.Net</a>.</font></p></div>
  </div>
</body>
</html>
