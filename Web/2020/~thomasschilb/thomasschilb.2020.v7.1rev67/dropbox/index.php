<?php

// Get drobox folder html.
$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://www.dropbox.com/sh/9qyl6zn4vvcg86a/AAA5PnBFUqmmerKWw-fs-4UEa' ); // Dropbox shared folder link
	curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows; U; Windows NT 5.1; de; rv:1.9.2.3) Gecko/20100401 Firefox/3.6.3 (FM Scene 4.6.1)');
	curl_setopt($ch, CURLOPT_REFERER, 'https://www.dropbox.com/');
	curl_setopt($ch, CURLOPT_ENCODING, 'gzip,deflate');
	curl_setopt($ch, CURLOPT_AUTOREFERER, true);
	curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
	curl_setopt($ch, CURLOPT_TIMEOUT, 5);
	curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
		   $html =curl_exec ($ch);
// extract links with DOMDocument
$dom = new DOMDocument();
@$dom->loadHTML($html);
$links = $dom->getElementsByTagName('a');
$processed_links = array();
foreach ($links as $link)
{
	if ($link->hasAttribute('class')&& $link->hasAttribute('href'))
	{
		foreach ($link->attributes as $a)
	  {
			if ($a->value=='filename-link')  
	   {
			$processed_links[$link->getAttribute('href')] = $link->getAttribute('href');
	   }

	  }

	}
}


echo var_dump($processed_links);




?>