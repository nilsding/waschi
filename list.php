<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.4-0007             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################

	function rmempty($array){

		foreach ($array as $key => $value)  {
			if($value=='') unset ($array[$key]);
		}
	
		return($array);
	}



	if(!file_exists("./found")) touch("./found");

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
