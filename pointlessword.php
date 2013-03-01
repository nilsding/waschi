<?php
$word = file_get_contents("http://dev.revengeday.de/pointlesswords/api/");
echo html_entity_decode($word);
?>
