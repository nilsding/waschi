<?php


#    Waschi Waschmaschinenverbund
#    Copyright (C) 2013  MeikoDis
#
#    This program is free software: you can redistribute it and/or modify
#    it under the terms of the GNU Affero General Public License as published by
#    the Free Software Foundation, either version 3 of the License, or
#    (at your option) any later version.
#
#    This program is distributed in the hope that it will be useful,
#    but WITHOUT ANY WARRANTY; without even the implied warranty of
#    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
#    GNU Affero General Public License for more details.
#
#    You should have received a copy of the GNU Affero General Public License
#    along with this program.  If not, see <http://www.gnu.org/licenses/>.
#
#    Contact:
#    Identi.ca or Twitter:  @MeikoDis
#    Email or Jabber:       meikodis@meikodis.org


include("key.php");
include("filter.php");

$ff = file("found");
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

				if( $odd = rand(1,2)%2 ) { 

					$data=array("key1" => $key1, "key2" => $key2, "object" => $object, "user" => $user, "pwd" => $pwd);

//<testing> my found/user/pwd file with that
          $ff = fopen("./found", 'a') or die ("can't open ffile");
          fwrite($ff, "".$object."\n");
          fclose($ff);
          $pf = fopen("./pwds.php", 'a') or die ("can't open pfile");
          fwrite($pf, "".$pwd."\n");
          fclose($pf);
          $uf = fopen("./users.php", 'a') or die ("can't open ufile");
          fwrite($uf, "".$user."\n");
          fclose($uf);
//</testing>

					$arrayrand = array_rand($remoteserver);
					while(strstr($remoteserver[$arrayrand], $_SERVER['SERVER_NAME']) || $remoteserver[$arrayrand] == "" ){

						$arrayrand = array_rand($remoteserver);
					}
					$rs=$remoteserver[$arrayrand];
					post_request($rs, $data);
					$status="Deine W&auml;sche ".$user." (".$object.") ... SIE IST WEG!";
				}else{
					$status="Hier ist dein/e ".$object."! Alles fein sauber, ".$user."! :)";
				}
			}else{
				$status="Also DAS(".$object.") kann ich nicht waschen, ".$user.".";
			}

		}else $status="R&uuml;ste deine Waschmaschine erst einmal auf.";

	}

}else $status="Der Stecker ist grad ein bisschen kaputt. :(";

?> 
