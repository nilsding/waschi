<?php

# PointlessWords by Revengeday
# Waschi-Dings by dr. nilsding

include_once("filter.php");

$word = "PointlessWords";
do {
	$word = html_entity_decode(file_get_contents("http://dev.revengeday.de/pointlesswords/api/"), ENT_HTML5, "UTF-8");
} while (in_filter($word));
echo $word;
?>
