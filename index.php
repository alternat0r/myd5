<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
<title>MyD5</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script type="text/javascript">
function setFocus()
{
     document.getElementById("search").focus();
}
</script>
</head>

<body onload="setFocus()">
<div align="center"> 
	<br/>
	<br/>
	<br/>
	<p><a href="./"><img src="as.png" border="0"></a></p>
	<form name="form1" method="post" action="search.php">
		<table border="0" cellspacing="0" cellpadding="0">
			<tr> 
				<td>
					<div align="center">
						<td><input name="search" type="text" id="search" size="50">
						<input type="submit" name="Submit" value="Go"></td>
					</div>
				</td>
			</tr>
		</table>
	 </form>
	 <p><br/>
	</font><font size="1" face="Verdana, Arial, Helvetica, sans-serif">
<?php
	$link = mysql_connect('localhost', 'root', 'alter75');
	if (! $link) 
		die('Unable to connect to the database');
	mysql_select_db('myd5') or die('Could not open database.');
	$sql = "SELECT * FROM search";
	$sql = mysql_real_escape_string($sql);
	$query = mysql_query($sql);
	$num_rows = mysql_num_rows($query);
	echo "Search over " .$num_rows. " of value and counting.";
?>
	<p></p>
	<a href="">T&C</a> | <a href="">Legal</a> | <a href="">About</a> | <a href="">Contact</a> | &copy; 2010 <a href="http://www.data0.net">Data0.Net</a>.</font></p>
</div>
</body>
</html>
