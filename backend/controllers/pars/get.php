<?php
/**
* 
* 
*/

error_reporting(E_ALL);
$start = microtime(true);
echo date("H:i:s");
require_once 'vendor/autoload.php';
function request( $url, $post = null ){
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );


			  
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64)    AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/tmp/cookie.txt');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_URL, $url);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
                  
                    ]);

curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');

//curl_setopt($ch, CURLOPT_PROXY, '146.185.142.154:3128');
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);

if( $post ){
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
}


 if (($html = curl_exec($ch)) == false && $html == '')
  {
      echo 'Ошибка curl: ' . curl_error($ch);
  }

curl_close( $ch );
return $html;
}

$pg_url = 'https://www.yandex.ru/';


//выполнение
$html = getPages($pg_url);
echo "<pre>";
print_r( $html );




//////////////////////////////////////////////////////////////////////////
$time = microtime(true) - $start;
printf("<br>".date('H:i:s').' Готово! Процесс выполнялся %.4F сек.', $time);
?>