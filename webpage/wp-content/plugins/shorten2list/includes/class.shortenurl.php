<?php
/*
Class Name: Shorten2List
Clasee URI: http://www.ipublicis.com
Description: Encapsulates the generation of shortened links for commom shortner services. Like it? <a href="http://smsh.me/7kit" target="_blank" title="Paypal Website"><strong>Donate</strong></a> | <a href="http://www.amazon.co.uk/wishlist/2NQ1MIIVJ1DFS" target="_blank" title="Amazon Wish List">Amazon Wishlist</a>
Author: Lopo Lencastre de Almeida - iPublicis.com
Version: 1.0
Author URI: http://www.ipublicis.com
Donate link: http://smsh.me/7kit
*/

/*
This program is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License version 3 as published by
the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program.  If not, see <http://www.gnu.org/licenses/>.
*/

class shortenurl {



  // Function to shorten URL using Bit.Ly
  // Original code by David Walsh (http://davidwalsh.name/bitly-php), 
  // improved by Jason Lengstorf (http://www.ennuidesign.com/).

      function make_bitly($url, $login, $appkey, $history=1, $version='2.0.1')           {
                //create the URL
                $bitly = 'http://api.bit.ly/shorten';
                $param = 'version='.$version.'&longUrl='.urlencode($url).'&login='.$login.'&apiKey='.$appkey.'&format=json&history='.$history;

                //get the url
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                curl_setopt($ch, CURLOPT_URL, $bitly . "?" . $param);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);

                $json = json_decode($response,true);
                
                // check if all goes ok, if not, return error message
                
                    if ($json['statusCode'] == 'OK') {
                      return array( 'short_url', $json['results'][$url]['shortUrl'] );                   
                    } else {
                      return array( 'bitly_error', $json['errorMessage'] );                   
                    }                
          }
          
  // Function to shorten URL using Tr.im

      function make_trim($url, $trim_user, $trim_pass) {        
         
                //create the URL
                $trim = 'http://api.tr.im/api/trim_url.json';
                $param = '?url='.urlencode($url);

                //get the url
                $ch = curl_init();
                curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); //Use basic authentication
                curl_setopt($ch,CURLOPT_USERPWD,$trim_user . ":" . $trim_pass);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); //Do not check SSL certificate (but use SSL).
                curl_setopt($ch, CURLOPT_URL, $trim . $param);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
                $response = curl_exec($ch);
                curl_close($ch);

                $json = json_decode($response,true);
                
                // check if all goes ok, if not, return error message
                
                    if ($json['status']['result'] == 'OK') {
                        return array( 'short_url', $json['url'] );                   
                    } else {
                        return array( 'trim_error', $json['status']['message'] );                   
                    }           
          }

 
   // Function to shorten URL using Yourls

     function make_yourls ($url,$yourls_api,$yourls_user,$yourls_pass) {
          
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                  curl_setopt($ch, CURLOPT_URL, $yourls_api);
                  curl_setopt($ch, CURLOPT_HEADER, 0);            // No header in the result
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); // Return, do not echo result
                  curl_setopt($ch, CURLOPT_POST, 1);              // This is a POST request
                  curl_setopt($ch, CURLOPT_POSTFIELDS, array(     // Data to POST
                  		'url'      => $url,
                  		'format'   => 'json',
                  		'action'   => 'shorturl',
                  		'username' => $yourls_user,
                  		'password' => $yourls_pass
                  	));

                  $response = curl_exec($ch);
                  curl_close($ch);

                  $json = json_decode($response,true);
                  
                  // check if all goes ok, if not, return error message
                  
                      if ($json['status'] == 'success') {
                          return array( 'short_url', $json['shorturl'] );                   
                      } else {
                          return array( 'yourls_error', $json['message'] );                   
                      } 
          }
 
  // Function to shorten URL using Su.pr

      function make_supr($url,$supr_key,$supr_user) {
                            
                  // create API URL
                  $supr_result = 'http://su.pr/api/shorten?longUrl='.$url.'&login='.$supr_user.'&apiKey='.$supr_key;

                  // get the surl
                  $ch=curl_init();
                  curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                  curl_setopt($ch,CURLOPT_URL, $supr_result);
                  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 15);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  curl_close($ch);
                                  
                  $json = json_decode($supr_result,true);
                  
                  // check if all goes ok, if not, return error message
                  
                      if ($json['statusCode'] == 'OK') {
                          return array( 'short_url', $json['results'][$url]['shortUrl'] );                   
                      } else {
                      
                          return array( 'supr_error', $json['errorMessage'] );
                      }           
          } 
 
  // Function to shorten URL using Snurl.COM

      function make_snurl($url,$snurl_key,$snurl_user, $snurl_nick, $snurl_title) {
                            

                  // API URL
				  $snurl = 'http://snipurl.com/site/getsnip';
				  
				  // REQUIRED FIELDS
				  $sniplink   = rawurlencode($url);

				  // OPTIONAL FIELDS
				  $snipnick   = rawurlencode($snurl_nick);
				  $sniptitle  = rawurlencode($snurl_title);
				  $snipformat = 'simple';                      // DEFAULT RESPONSE IS IN XML, SEND "simple"
				  
                  // POSTFIELD
                  $postfield = 'sniplink='  . $sniplink   . '&' .
                               'snipnick='  . $snipnick   . '&' .
                               'snipuser='  . $snurl_user . '&' .
                               'snipapi='   . $snurl_key  . '&' .
                               'sniptitle=' . $sniptitle  . '&' .
                               'snipformat='. $snipformat;
  
  				  // POST
                  $ch = curl_init();
                  curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                  curl_setopt($ch, CURLOPT_URL, $snurl);
                  curl_setopt($ch, CURLOPT_HEADER, 0);            		// No header in the result
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 		// Return, do not echo result
                  curl_setopt($ch, CURLOPT_POST, 1);              		// This is a POST request
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $postfield);     // Data to POST

                  $response = curl_exec($ch);
                  curl_close($ch);
                                  
                  // check if all goes ok, if not, return error message
                  
                      if ($response != $url && !empty($response)) {
                          return array( 'short_url', $response );                   
                      } else {
                      
                          return array( 'snurl_error', $response );
                      }           
          } 
 
  // Function to shorten URL using sm00sh at smsh.me

      function make_smsh($url, $id_key) {

                  // create API URL
                  $sm00sher = 'http://smsh.me/?id='.$id_key.'&api=json&url='.urlencode($url);

                  // get the surl
                  $ch=curl_init();
                  curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                  curl_setopt($ch,CURLOPT_URL, $sm00sher);
                  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 15);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  curl_close($ch);

                  // returns {  "title": "HTTP/1.0 200 OK",  "body": "http://smsh.me/7jk1" }
                  $json = json_decode($response,true);

                  // check if all goes ok, if not, return error message
                  if ($json['title'] == 'HTTP/1.0 200 OK') {
                       return array( 'short_url', $json['body'] );                   
                  } else {
                       return array( 'smsh_error', $json['title']."\n".$json['body'] );
                  }
          }

  // Function to shorten URL using TightURL at 2tu.us

      function make_isgd($url) {

                  // create API URL
                  $isgd = 'http://is.gd/api.php?longurl='.urlencode($url);

                  // get the surl
                  $ch=curl_init();
                  curl_setopt($ch, CURLOPT_USERAGENT, 'Shorten2LIST');
                  curl_setopt($ch,CURLOPT_URL, $isgd);
                  curl_setopt($ch,CURLOPT_CONNECTTIMEOUT, 15);
                  curl_setopt($ch, CURLOPT_TIMEOUT, 30);
                  curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);
                  $response = curl_exec($ch);
                  curl_close($ch);

                  $pos = stripos($response, 'http://');

                  // check if all goes ok, if not, return error message
                  if ($pos !== false && $pos == 0) {
                       return array( 'short_url', $response );                   
                  } else {
                       return array( 'isgd_error', $response );
                  }
          }

} // END CLASS
?>