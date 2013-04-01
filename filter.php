<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.6-0002             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



        function in_filter($words){

		$limit=25; //Zeichenlimit


		if(preg_match("/[^a-zA-Z0-9 ÄÖÜäöüß]/usi", $words) && strlen($words) > $limit) return true;
		else return false;

        }
?>
