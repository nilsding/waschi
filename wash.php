<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.5-0003             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



include("key.php");
include("filter.php");



function post_request($url, $data, $referer='') {
 
    // Convert the data array into URL Parameters like a=b&foo=bar etc.
    $data = http_build_query($data);
 
    // parse the given URL
    $url = parse_url($url);
 
    if ($url['scheme'] != 'http') { 
	die($url['scheme']);

#        die('Error: Only HTTP request are supported !');
    }
 
    // extract host and path:
    $host = $url['host'];
    $path = $url['path'];
 
    // open a socket connection on port 80 - timeout: 30 sec
    $fp = fsockopen($host, 80, $errno, $errstr, 30);
 
    if ($fp){
 
        // send the request headers:
        fputs($fp, "POST $path HTTP/1.1\r\n");
        fputs($fp, "Host: $host\r\n");
 
        if ($referer != '')
            fputs($fp, "Referer: $referer\r\n");
 
        fputs($fp, "Content-type: application/x-www-form-urlencoded\r\n");
        fputs($fp, "Content-length: ". strlen($data) ."\r\n");
        fputs($fp, "Connection: close\r\n\r\n");
        fputs($fp, $data);
 
        $result = ''; 
        while(!feof($fp)) {
            // receive the results of the request
            $result .= fgets($fp, 128);
        }
    }
    else { 
        return array(
            'status' => 'err', 
            'error' => "$errstr ($errno)"
        );
    }
 
    // close the socket connection:
    fclose($fp);
 
    // split the result header from the content
    $result = explode("\r\n\r\n", $result, 2);
 
    $header = isset($result[0]) ? $result[0] : '';
    $content = isset($result[1]) ? $result[1] : '';
 
    // return as structured array:
    return array(
        'status' => 'ok',
        'header' => $header,
        'content' => $content
    );
}

$keyarray=array("key1" => $key1, "key2" => $key2);

$remoteserverarray=post_request("http://waschi.org/servers.php", $keyarray);
$remoteserver=explode("\n",$remoteserverarray['content']);

if(!count($remoteserver)<=1){


	if($_SERVER['REQUEST_METHOD'] == "POST") {

		if(!stristr($remoteserver[0], "ERROR")){

			$object=$_POST["Kleidung"];

			if(!in_filter($object)){

				if(rand(0,100) <= 50) {

					$data=array("key1" => $key1, "key2" => $key2, "object" => $object);

					$arrayrand = array_rand($remoteserver);
					while(strstr($remoteserver[$arrayrand], $_SERVER['SERVER_NAME']) || $remoteserver[$arrayrand] == "" ){

						$arrayrand = array_rand($remoteserver);
					}
					$rs=$remoteserver[$arrayrand];
					post_request($rs, $data);
					$status="Deine W&auml;sche (".$object.") ... SIE IST WEG!";
				}else{
					$status="Hier ist dein/e ".$object."! Alles fein sauber! :)";
				}
			}else{
				$status="Also DAS(".$object.") kann ich nicht waschen.";
			}

		}else $status="R&uuml;ste deine Waschmaschine erst einmal auf.";

	}

}else $status="Der Stecker ist grad ein bisschen kaputt. :(";

?>
