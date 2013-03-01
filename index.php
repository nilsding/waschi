<?php
	include("list.php");
	include("wash.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Ihre Waschmaschine auf IHRE ADRESSE</title>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<script>
$(document).ready(function() {
	$("#randomword").click(function(event) {
		$.get("pointlessword.php", function(data) {
			$("#kleidung").val(data);
		});
		event.preventDefault();
	});
});
</script>
</head>
<body>
<h1>Dies ist Ihre Waschmaschine auf IHRE ADRESSE</h1>
<pre>
 ___
/……/|
|@ |/
----
</pre>
<form method="POST">
 
 <input type="text" name="Kleidung" id="kleidung" />
 <input type="submit" value="Waschvorgang starten." /> 
 <button id="randomword">Pointless Word <noscript>(JavaScript ben&ouml;tigt)</noscript></button><br />
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
