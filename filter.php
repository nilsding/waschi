<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.6-0003             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



        function in_filter($words){

		$regex="/[^(a-zA-Z0-9 ÄÖÜäöüßéèêë)]/u";
		$limit=25; //Zeichenlimit

		if(preg_match($regex, $words)==1) return true;
		if(strlen($words) > $limit) return true;

		return false;

        }
?>
