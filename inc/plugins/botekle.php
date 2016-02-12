<?php
/**
   Plugin Yazımı Emre Karakaya Tarafından Yapılmıştır   
**/

if(!defined("IN_MYBB"))
{
    die("<meta http-equiv=\"refresh\" content=\"0;URL=http://www.analizcik.com//\">");
}
//Plugin bilgileri
function botekle_info()
{
    return array(
        "name"          => "Spider Ekle",
        "description"   => "Bu Eklenti Arama Motorlarının Spiderlerini Sitenize Ekleyebilirsiniz.",
        "website"       => "http://www.analizcik.com",
        "author"        => "Emre Karakaya",
        "authorsite"    => "http://www.emrekarakaya.com.tr",
        "version"       => "1.0",
        "guid"          => "",
        "compatibility" => "14*,16*,18*"
    );
}
function botekle_activate()
{

// Globals
global $db;

$addSpider = array(
	array(
	'name' => 'Twitter', 
	'useragent' => 'twitterbot'),
		array(
	'name' => 'Google Görsel', 
	'useragent' => 'Googlebot-Image'),
		array(
	'name' => 'Facebook', 
	'useragent' => 'facebookexternalhit'),
		array(
	'name' => 'Msn', 
	'useragent' => 'msnbot'),
		array(
	'name' => 'Google Adsense', 
	'useragent' => 'Mediapartners-Google'),
		array(
	'name' => 'Yandex', 
	'useragent' => 'YandexBot'),
		array(
	'name' => 'Yandex Metrika', 
	'useragent' => 'YandexMetrika'),
		array(
	'name' => 'Yandex Direct', 
	'useragent' => 'YandexDirect'),
		array(
	'name' => 'Google Ads', 
	'useragent' => 'AdsBot-Google'),
		array(
	'name' => 'Google Mobil', 
	'useragent' => 'Googlebot-Mobile'),
		array(
	'name' => 'Google Video', 
	'useragent' => 'Googlebot-Video'),
		array(
	'name' => 'Yandex Görsel', 
	'useragent' => 'YandexImages'),
		array(
	'name' => 'Yandex Video', 
	'useragent' => 'YandexVideo'),
		array(
	'name' => 'Proximic', 
	'useragent' => 'proximic'),
		array(
	'name' => 'Geliyoo', 
	'useragent' => 'GeliyooBot/1.0'),
	);
	$query = $db->query("SELECT useragent
	FROM ".TABLE_PREFIX."spiders");

	$knownspiders = $db->fetch_array($query);

foreach($addSpider as $spider)
{
	if(!in_array($spider['useragent'], $knownspiders))
	{
	$spiders_group = array(
		'name'		=> addslashes($spider['name']),
		'useragent'		=> addslashes($spider['useragent']),
	);
		$db->insert_query("spiders", $spiders_group);
	}
}


unset($addSpider, $spider, $knownspiders);

}
function botekle()
{
}
function botekle_deactivate()
{
	global $db;
$addSpider = array(
	array(
	'name' => 'Twitter', 
	'useragent' => 'twitterbot'),
		array(
	'name' => 'Google Görsel', 
	'useragent' => 'Googlebot-Image'),
		array(
	'name' => 'Facebook', 
	'useragent' => 'facebookexternalhit'),
		array(
	'name' => 'Msn', 
	'useragent' => 'msnbot'),
		array(
	'name' => 'Google Adsense', 
	'useragent' => 'Mediapartners-Google'),
		array(
	'name' => 'Yandex', 
	'useragent' => 'YandexBot'),
		array(
	'name' => 'Yandex Metrika', 
	'useragent' => 'YandexMetrika'),
		array(
	'name' => 'Yandex Direct', 
	'useragent' => 'YandexDirect'),
		array(
	'name' => 'Google Ads', 
	'useragent' => 'AdsBot-Google'),
		array(
	'name' => 'Google Mobil', 
	'useragent' => 'Googlebot-Mobile'),
		array(
	'name' => 'Google Video', 
	'useragent' => 'Googlebot-Video'),
		array(
	'name' => 'Yandex Görsel', 
	'useragent' => 'YandexImages'),
		array(
	'name' => 'Yandex Video', 
	'useragent' => 'YandexVideo'),
		array(
	'name' => 'Proximic', 
	'useragent' => 'proximic'),
		array(
	'name' => 'Geliyoo', 
	'useragent' => 'GeliyooBot/1.0'),
	);
	foreach($addSpider as $spider)
{

	$spiders_group = array(

		'name'		=> addslashes($spider['name']),

	);
		$db->write_query("DELETE FROM ".TABLE_PREFIX."spiders WHERE name='".$spiders_group['name']."'");
			

}	
}
?>
