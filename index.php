<?php
function linkExtractor($html)
{
 $linkArray = array();
 if(preg_match_all('/<a\s+.*?href=[\"\']?([^\"\' >]*)[\"\']?[^>]*>(.*?)<\/a>/i', $html, $matches, PREG_SET_ORDER)){
  foreach ($matches as $match) {
   array_push($linkArray, array($match[1], $match[2]));
  }
 }
 return $linkArray;
}



$url = 'https://www.einforma.pt/novas-empresas';   
$ch = curl_init();
curl_setopt($ch,CURLOPT_URL,$url);
curl_setopt($ch,CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.12) Gecko/20080201 Firefox/2.0.0.12');
curl_setopt($ch,CURLOPT_HEADER,0);
curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,0);
curl_setopt($ch,CURLOPT_TIMEOUT,120);
$html = curl_exec($ch);
curl_close($ch);
echo '<pre>' . print_r(linkExtractor($html), true) . '<pre>';
?>