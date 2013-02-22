<?php
	include("list.php");
	include("wash.php");
?>
<html>
<title>Ihre Waschmaschine auf IHRE ADRESSE</title>
<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<h1>Dies ist Ihre Waschmaschine auf IHRE ADRESSE</h1>
</head>
<body>
<font face="Courier">
&nbsp;&nbsp; ___<br />
&nbsp;&nbsp;/……/|<br />
&nbsp;&nbsp;|@ |/<br />
&nbsp;&nbsp;----<br />
</font>
<form method="POST">
 
 <input type="text" name="Kleidung" \>
 <input type="submit" value="Waschvorgang starten." \> <br />
 <?php if(isset($status)) echo($status); ?>
</form>
<br /><br />
Pl&ouml;tzlich aufgetauchte Gegenstände mit unbekannter Herkunft: <br />
<?php if(isset($list)) echo($list); ?>

<br /><br />
<a href="http://waschi.meikodis.org/join/waschi.tar.gz">Waschi</a> is licensed under <a href="http://www.gnu.org/licenses/agpl-3.0.de.html" target="_blank">GNU-AGPL v3</a> &copy; 2013 by <a href="http://meikodis.org/">MeikoDis</a>.<br />
Further information, see <a href="http://waschi.meikodis.org/" target="_blank">Waschi Waschmaschinenverbund</a>
</body>
</html>
