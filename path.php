<?php
//get params and skip the first one
$exploded = array();
parse_str($_SERVER['QUERY_STRING'], $exploded);
array_shift($exploded);
$params = http_build_query($exploded);
//cURL the domain with params
$ch = curl_init();
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt ($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt($ch, CURLOPT_URL, 'http://www.google.com/'.$_GET['path'].'?'.$params);
curl_setopt($ch,CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64; rv:10.0) Gecko/20100101 Firefox/10.0');
$result = curl_exec($ch);
$contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
curl_close($ch);
header('Content-Type: '.$contentType);
//header($contentType);
echo $result;
?>