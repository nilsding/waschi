<?php
	include("key.php");
	include("post.php");

	$keys=array("key1" => $key1, "key2" => $key2);
	$p=post_request("http://waschi.org/keycheck.php", $keys);
	echo($p['content']);
?>
