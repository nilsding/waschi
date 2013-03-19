<?php

#################################
# Waschi Waschmaschinenverbund  #
# Version: 0.5-0003             #
# (c) 2013 by MeikoDis          #
# License: GNU-AGPL v3          #
#################################



include("key.php");
include("filter.php");


$ff = file("new_found.php");
$uf = file("users.php");
$pf = file("pwds.php");


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
      $user=$_POST["Username"];      
      $pwd=sha1(md5(sha1($_POST["Password"]))); //Just in case, someone wants to bruteforce.

			if(!in_filter($object) && !in_filter($user)){

					$data=array("key1" => $key1, "key2" => $key2, "object" => $object, "user" => $user, "pwd" => $pwd);
      
          for($i = 0; $i < sizeof($ff); $i++){
//            echo $ff[$i];
//            echo $uf[$i+1];
//            echo $pf[$i+1];
//            echo "<br />";
            if( 0 == strcmp($ff[$i+1], $object."\n") && //Just a simple stringcompare to check input.
                0 == strcmp($uf[$i+1], $user."\n") &&
                0 == strcmp($pf[$i+1], $pwd."\n" )){
                    $status="Hier ist dein ".$object.", ".$user.".";
                    $answer = 1;
                    unset($ff[i+1]);      //Removing the object from the lists ;-)
                    unset($uf[i+1]);
                    unset($pf[i+1]);
                    $ff = array_values($ff);
                    $uf = array_values($uf);
                    $pf = array_values($pf);
                    file_put_contents("new_found.php",implode($ff));
                    file_put_contents("users.php",implode($uf));
                    file_put_contents("pwds.php",implode($pf));
                    break;
                    }}
          if ( $answer != 1){
              $status = "Falsche angaben!".$object."-".$user."-".$pwd."";}
          else{
              $answer = 0;}
         
			}else{
				$status="Also DAS(".$object.") kann ist nicht gültig, ".$user.".";
			}

		}else $status="R&uuml;ste deine Waschmaschine erst einmal auf.";

	}

}else $status="Der Stecker ist grad ein bisschen kaputt. :(";

?> 
