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


	include("key.php");
	include("filter.php");


	setlocale(LC_ALL, 'de_DE.utf8');
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {

		if($key1!=$_POST['key1'] || $key2!=$_POST['key2']) die("Your keys are incorrect!");
		if(in_filter($_POST['object'])==true) die("Filtered!");

		if( $key1==$_POST['key1'] &&
        $key2==$_POST['key2'] &&
        $_POST['object'] != "" &&
        $_POST['user'] != "" &&
        $_POST['pwd'] != ""){

      if(!file_exists("./found")) touch("./found");
      if(!file_exists("./users.php")) {
        $fu = fopen("./users.php", 'a') or die ("can't open file");
        fwrite($fu, "<?php\n");
        fclose($fu);
        }
      if(!file_exists("./pwds.php")) {
        $fu = fopen("./pwds.php", 'a') or die ("can't open file");
        fwrite($fu, "<?php\n");
        fclose($fu);
        }

			$obj = escapeshellcmd($_POST['object'])."\n";
			$usr = escapeshellcmd($_POST['user'])."\n";
			$pwd = escapeshellcmd($_POST['pwd'])."\n";
			
			$fh = fopen("./found", 'a') or die("can't open file");
			fwrite($fh, $obj);
			fclose($fh);
			
			$fu = fopen("./users.php", 'a') or die("can't open file");
			fwrite($fu, $usr);
			fclose($fu);
			
			$fp = fopen("./pwds.php", 'a') or die("can't open file");
			fwrite($fp, $pwd);
			fclose($fp);


#			shell_exec("LANG=de_DE.utf8; echo ".$obj." >> found");
		}

	}
?>
