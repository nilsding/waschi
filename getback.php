<?php
	include("giveaway.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Ihre Waschmaschine auf IHRE ADRESSE</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
</head>
<body>
<h1>Dies ist Ihre W&auml;schentname auf IHRE ADRESSE</h1>
<pre>
 ___
/……/|
|@ |/
----
</pre>
<form method="POST">
 Objekt:
 <input type="text" name="Kleidung" id="kleidung" /><br />
 Username:
 <input type="text" name="Username" id="user" /> <input type="password" name="Password" id="pwd" value="mycock"/><br />
 <input type="submit" value="Waschvorgang starten." />
 <?php if(isset($status)) echo($status); ?> 
</form>
<br /><br />
Pl&ouml;tzlich aufgetauchte Gegenstände mit unbekannter Herkunft: <br />
<?php 
for ( $i = 1; $i <= sizeof($ff); $i++){
  echo "".$ff[$i]."<br />";}


 ?>
<br />
Um Ihre Waesche zu abzugeben, gehen Sie bitte <a href="index.php" target="_blank">hier</a>.
<br /><br />
<!-- Footer START | PLEASE don't remove this (Copyrightinformation)-->
<a href="http://waschi.org/join/waschi.tar.gz">Waschi</a> is licensed under <a href="http://www.gnu.org/licenses/agpl-3.0.de.html" target="_blank">GNU-AGPL v3</a> &copy; 2013 by <a href="http://meikodis.org/">MeikoDis</a>.<br />
Further information, see <a href="http://waschi.org/" target="_blank">Waschi Waschmaschinenverbund</a>
<br />
<!-- Additional content -->
<a href="http://waschi.org/index.php?page=bluepages">Andere Waschmaschinen</a> · <a href="https://github.com/MeikoDis/waschi">GitHub</a>
<!-- Footer END -->
</body>
</html>
