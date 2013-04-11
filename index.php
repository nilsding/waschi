<?php


#    Waschi Waschmaschinenverbund
#    Copyright (C) 2013  MeikoDis
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU Affero General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU Affero General Public License for more details.
#
#    You should have received a copy of the GNU Affero General Public License
#    along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#    Contact:
#    Identi.ca or Twitter:  @MeikoDis
#    Email or Jabber:       meikodis@meikodis.org


	include("list.php");
	include("wash.php");
?>
<!DOCTYPE html>
<html>
<head>
<title>Ihre Waschmaschine auf IHRE ADRESSE</title>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
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
 Objekt:
 <input type="text" name="Kleidung" id="kleidung" /><br />
 Username:
 <input type="text" name="Username" id="user" value="Hugo" /> Passwort: <input type="password" name="Password" id="pwd" value="mycock"/><br />
 <input type="submit" value="Vorgang starten." />
 <input type ="checkbox" name="TakeAway"/> Einreichung eines Abholantrages.<br />
 <?php if(isset($status)) echo($status); ?> 
</form>
<br /><br />
Pl&ouml;tzlich aufgetauchte Gegenstände mit unbekannter Herkunft: <br />
<?php if(isset($list)) echo($list); ?>
<br />
<!-- Footer START | PLEASE don't remove this (Copyrightinformation)-->
<a href="http://waschi.org/join/waschi.tar.gz">Waschi</a> is licensed under <a href="http://www.gnu.org/licenses/agpl-3.0.de.html" target="_blank">GNU-AGPL v3</a> &copy; 2013 by <a href="http://meikodis.org/">MeikoDis</a>.<br />
Further information, see <a href="http://waschi.org/" target="_blank">Waschi Waschmaschinenverbund</a>
<br />
<!-- Additional content -->
<a href="http://waschi.org/index.php?page=bluepages">Andere Waschmaschinen</a> · <a href="https://github.com/MeikoDis/waschi">GitHub</a>
<!-- Footer END -->
</body>
</html>
