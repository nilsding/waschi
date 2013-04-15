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


	function rmempty($array){

		foreach ($array as $key => $value)  {
			if($value=='') unset ($array[$key]);
		}
	
		return($array);
	}



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



	$lista=explode("\n", file_get_contents("./found"));
	$lista=array_reverse($lista);
	rmempty($lista);

	$list="<ul>\n";

	foreach($lista as &$element){
		$element=str_replace($element, '<li>'.$element.'</li>', $element);
	}


	$list.=implode("\n", $lista);

	$list.="</ul>\n";

?>
