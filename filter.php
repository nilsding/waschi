<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.4-0002             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



        function in_filter($words){

		$limit=18; //Zeichenlimit

		if(strlen($words) > $limit) return true;

                $filter = array(" ",",",".","<",">","--","\"","'","&","|","(",")",":","[","]",";","\\","/","!","=","{","}","#","$"); // Zeichen, die die Übersendung nicht zulassen.
                $noe=count($filter);

                $counter=0;
                foreach($filter as $bad){
                        if(stristr($words, $bad) === false) $counter++;
                }

                if($counter == $noe) return false;
                else return true;
        }
?>
