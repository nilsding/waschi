<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.6-0001             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



        function in_filter($words){

		$limit=25; //Zeichenlimit

		if(strlen($words) > $limit) return true;

		if(preg_match("/[^a-zA-Z0-9 ÄÖÜäöüß]/usi", $words)) return true;
		else return false;

        }
?>
