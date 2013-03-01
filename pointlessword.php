<?php

# PointlessWords by Revengeday
# Waschi-Dings by dr. nilsding

include_once("filter.php");

$word = "PointlessWords";
do {
	$word = file_get_contents("http://dev.revengeday.de/pointlesswords/api/");
} while (in_filter($word));
echo html_entity_decode($word);
?>
