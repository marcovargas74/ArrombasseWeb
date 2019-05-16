<?php

class CincopaLoader {
	
	const galleries_getlist = 'http://www.cincopa.com/media-platform/my-galleries-getlist';
	const get_auth = 'https://www.cincopa.com/login.aspx';
	
	public static function getGalleriesList() {
		$data = file_get_contents(self::galleries_getlist);
		$result = json_decode($data); 
		
		print_r($result);
		echo $data;
		return $result;
	}
	
	/*
	public static function login($login, $password) {

    $postdata = http_build_query(
        array(
            'login' => $login,
            'password' => $password,
        )
    );

    $opts = array('http' =>
        array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded'
             . "\r\n" . "Authorization: Basic " . base64_encode("$login:$password"). "\r\n",
            'content' => $postdata
        )
    );


    $context = stream_context_create($opts);
    return file_get_contents($url, false, $context);
	}
	*/
}

//CincopaLoader::getGalleriesList();