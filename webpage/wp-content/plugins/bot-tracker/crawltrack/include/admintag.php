<?php
//----------------------------------------------------------------------
//  CrawlTrack 2.3.0
//----------------------------------------------------------------------
// Crawler Tracker for website
//----------------------------------------------------------------------
// Author: Jean-Denis Brun
//----------------------------------------------------------------------
// Website: www.crawltrack.fr
//----------------------------------------------------------------------
// That script is distributed under GNU GPL license
//----------------------------------------------------------------------
// file: admintag.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}
//initialize array
$listsite=array();
$listid=array();

echo"<h1>".$language['tag']."</h1>\n";

echo"".$language['create_tag']."\n";


//database connection
$connexion = mysql_connect($crawlthost,$crawltuser,$crawltpassword) or die("MySQL connection to database problem");
$selection = mysql_select_db($crawltdb) or die("MySQL database selection problem");

//local tag creation

if (isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME']))
	{
	$path = dirname( $_SERVER['SCRIPT_FILENAME'] );
	}
else
	{
	$path = '.';
	}

$code ="require_once(\"".$path."/crawltrack.php\");";

//non-local tag preparation

$dom=$_SERVER["HTTP_HOST"];

$file=$_SERVER["PHP_SELF"];


$size= strlen($file);

$file1=substr($file,-$size,-9);

$file2=$file1."crawltrack.php";

$file3=$dom.$file1."images/";

$url_crawlt="http://".$dom.$file2;

$url_crawlt2="http://".$dom.$file1."html/noacces.htm";

//website list query
	
	$sqlsite = "SELECT * FROM crawlt_site	
	WHERE id_site = '".sql_quote($site)."'";

	
$requetesite = mysql_query($sqlsite, $connexion) or die("MySQL query error");

$nbrresult=mysql_num_rows($requetesite);
if($nbrresult>=1)		
	{
	while ($ligne = mysql_fetch_object($requetesite))                                                                              
		{
		$site=$ligne->name; 
		$idsite=$ligne->id_site;
		$listsite[$idsite]=$site;
		$listid[$site]=$idsite;
		}


	//table display

	asort($listsite);
	echo"<div align='center'>\n";	
	echo"<table cellpadding='10px' cellspacing='0'>\n";
	echo"<tr><th class='tableau1'>".$language['site_name2']."</th>\n";
	echo"<th class='tableau2'>".$language['tag']."</th></tr>\n";

	foreach ($listsite as $site1)
		{
		echo"<tr><td class='tableau3' rowspan='2'>".$site1."</td>\n";
		echo"<td class='tableau4' >\n";
		echo"<h3>".$language['local_tag']."</h3>\n";		
		echo"\$crawltsite=$listid[$site1];<br>\n";
		echo"$code<br>\n";

			

		echo"</td></tr>\n";
		echo"<td class='tableau4' >\n";
		echo"<h3>".$language['non_local_tag']."</h3>\n";
		echo"error_reporting(0);<br>\n";
		echo"\$crawlturl =urlencode(\$_SERVER['REQUEST_URI']);<br>\n";
		echo"\$crawltagent =urlencode(\$_SERVER['HTTP_USER_AGENT']);<br>\n";
		echo"if(isset(\$_SERVER['HTTP_X_FORWARDED_FOR']))<br>\n";
    echo"{<br>\n";
    echo"\$crawltip = urlencode(\$_SERVER['HTTP_X_FORWARDED_FOR']);<br>\n";
    echo"}<br>\n";
    echo"elseif(isset(\$_SERVER['HTTP_CLIENT_IP']))<br>\n";
    echo"{<br>\n";
    echo"\$crawltip = urlencode(\$_SERVER['HTTP_CLIENT_IP']);<br>\n";
    echo"}<br>\n";
    echo"else<br>\n";
    echo"{<br>\n";
    echo"\$crawltip = urlencode(\$_SERVER['REMOTE_ADDR']);<br>\n";
    echo"}<br>\n";
    echo"\$crawltreferer=urlencode(\$_SERVER['HTTP_REFERER']);<br>\n";
		echo"\$crawltvariablescodees = \"url=\".\$crawlturl.\"&agent=\".\$crawltagent.\"&ip=\".\$crawltip.\"&referer=\".\$crawltreferer.\"&site=$listid[$site1]\";<br>\n";
		echo"\$url_crawlt2=parse_url(\"$url_crawlt\");<br>\n";
		echo"\$crawlthote=\$url_crawlt2['host'];<br>\n";
		echo"\$crawltscript=\$url_crawlt2['path'];<br>\n";
		echo"\$crawltentete = \"POST  \".\$crawltscript.\"  HTTP/1.1\\r\\n\";<br>\n";
		echo"\$crawltentete .= \"Host: \".\$crawlthote.\" \\r\\n\";<br>\n";
		echo"\$crawltentete .= \"Content-Type: application/x-www-form-urlencoded\\r\\n\";<br>\n";
		echo"\$crawltentete .= \"Content-Length: \" . strlen(\$crawltvariablescodees) . \"\\r\\n\";<br>\n";
		echo"\$crawltentete .= \"Connection: close\\r\\n\\r\\n\";<br>\n";
		echo"\$crawltentete .= \$crawltvariablescodees . \"\\r\\n\";<br>\n";
		echo"\$crawltsocket = fsockopen(\$url_crawlt2['host'], 80, \$errno, \$errstr);<br>\n";
		echo"\$crawltreply=\"\";<br>\n";
		echo"if(\$crawltsocket)<br>\n";
		echo"{<br>\n";
		echo"fputs(\$crawltsocket, \$crawltentete);<br>\n";
		echo"while (!feof(\$crawltsocket)) {<br>\n";
    echo"\$crawltreply.= fgets(\$crawltsocket,128);<br>\n";
		echo"}<br>\n";
		echo"fclose(\$crawltsocket);<br>\n";
		echo"}<br>\n";
		echo"if(strpos(\$crawltreply, 'crawltrack'))<br>\n";
		echo"{<br>\n";
		echo"\$crawltreply2 = explode('crawltrack', \$crawltreply);<br>\n";
		echo"\$crawltreply3=\$crawltreply2[1];<br>\n";
		echo"}<br>\n";
		echo"else<br>\n";
		echo"{<br>\n";
		echo"\$crawltreply3=0;<br>\n";
		echo"}<br>\n";
		echo"if(\$crawltreply3==1)<br>\n";
		echo"{<br>\n";
    echo"\$GLOBALS = array();<br>\n"; 
    echo"\$_COOKIES = array();<br>\n";
    echo"\$_FILES = array();<br>\n";
    echo"\$_ENV = array();<br>\n";
    echo"\$_REQUEST = array();<br>\n"; 		
    echo"\$_POST = array();<br>\n";
    echo"\$_GET = array();<br>\n";
    echo"\$_SERVER = array();<br>\n";
    echo"\$_SESSION = array();<br>\n";   
		echo"@session_destroy();<br>\n";
		echo"@mysql_close();<br>\n"; 	
		echo"@header(\"Location:$url_crawlt2\");<br>\n";
		echo"echo\"&#60;head&#62;\";<br>\n"; 
		echo"echo\"&#60;META HTTP-EQUIV='Refresh' CONTENT='0;URL=".$url_crawlt2."'&#62;\";<br>\n"; 
		echo"echo\"&#60;/head&#62;\";<br>\n"; 
		echo"}<br>\n";
	
		
		echo"</td></tr>\n";
		echo"</table><br>\n";
		
	echo"<table cellpadding='10px' cellspacing='0'>\n";
	echo"<tr><th class='tableau2'colspan=\"2\" >".$language['crawltrack-backlink']."</th></tr>\n";

		
		$logolist= array(0,1,2,3,4,5,6,7,8,9,10,11,12);
		foreach($logolist as $logochoice)
      {
        
        
        //logochoice
    if ($logochoice==0)
      {
      $logo='logo.jpg';
      $lengthlogo=100;
      $heigthlogo=20;
      $alt='CrawlTrack: free crawlers and spiders tracking script- SEO script - script gratuit de statistiques des visites des robots';
      }
    elseif ($logochoice==1)	
      {
      $logo='logo1.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='Crawler tracking tool for webmaster-SEO script - Outil de suivi des robots pour webmaster';	
      }
    elseif ($logochoice==2)	
      {
      $logo='logo2.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: free php open-source script- SEO script -script php gratuit open-source';	
      }
    elseif ($logochoice==3)	
      {
      $logo='logo3.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: crawler and spider visits statistics - SEO script - statistiques des visites des robots';	
      }
    elseif ($logochoice==4)	
      {
      $logo='logo4.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: php mysql script- SEO script - script php mysql';	
      }
    elseif ($logochoice==5)	
      {
      $logo='logo5.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: free crawlers and spiders tracking script for webmaster- SEO script -script gratuit de statistiques des visites des robots pour webmaster';	
      }
    elseif ($logochoice==6)	
      {
      $logo='logo6.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: free and open-source crawlers and spiders tracking script- SEO -script open-source gratuit de détection des robots';	
      }
    elseif ($logochoice==7)	
      {
      $logo='logo7.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='Webmaster tool: free crawlers and spiders tracking script- SEO script - Outil pour webmaster: script gratuit de statistiques des visites des robots';	
      }
    elseif ($logochoice==8)	
      {
      $logo='logo8.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='Spider tracking tool for webmaster - SEO script - Outil de suivi des robots pour webmaster';	
      }
    elseif ($logochoice==9)	
      {
      $logo='logo9.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: open-source crawlers and spiders tracking script- SEO script -script open-source de statistiques des visites des robots';	
      }
    elseif ($logochoice==10)	
      {
      $logo='logo10.png';
      $lengthlogo=80;
      $heigthlogo=15;
      $alt='CrawlTrack: free crawlers and spiders tracking script- SEO script -script gratuit de suivi des robots';	
      }
    elseif ($logochoice==11)	
      {
      $logo='logo11.png';
      $lengthlogo=88;
      $heigthlogo=31;
      $alt='CrawlTrack: free crawlers and spiders tracking script for webmaster- SEO script -script gratuit de dsuivi des robots pour webmaster';	
      }
    elseif ($logochoice==12)	
      {
      $logo='nologo.png';
      $lengthlogo=1;
      $heigthlogo=1;
      $alt='CrawlTrack: free crawlers and spiders tracking script for webmaster- SEO script -script gratuit de dsuivi des robots pour webmaster';	
      }
      
		echo"<td class='tableau42'>\n";
		if($logo=='nologo.png')
      {
      echo $language['no_logo'];
      }		
		echo"	<img src=\"./images/$logo\" width=\"".$lengthlogo."px\" height=\"".$heigthlogo."px\" border=\"0\" alt=\"CrawlTrack\">";				
		echo"<br><b>PHP:</b><br>\n";
		echo"echo\"&#60;a href=\\\"http://www.crawltrack.fr\\\"&#62;<br>";
		echo"&#60;img src=\\\"http://".$file3.$logo."\\\" alt=\\\"$alt\\\" width=\\\"".$lengthlogo."px\\\" height=\\\"".$heigthlogo."px\\\" style=\\\"border:0\\\"/&#62;<br>";
		echo"&#60;/a&#62;\\n\";<br>\n";
	
		echo"</td>\n";
		echo"<td class='tableau43'>\n";
		if($logo=='nologo.png')
      {
      echo $language['no_logo'];
      }
		echo"	<img src=\"./images/$logo\" width=\"".$lengthlogo."px\" height=\"".$heigthlogo."px\" border=\"0\" alt=\"CrawlTrack\">";			
		echo"<br><b>HTML:</b><br>\n";
		echo"&#60;a href=\"http://www.crawltrack.fr\"&#62;<br>";
		echo"&#60;img src=\"http://".$file3.$logo."\" alt=\"$alt\" width=\"".$lengthlogo."px\" height=\"".$heigthlogo."px\" style=\"border:0\"/&#62;<br>";
		echo"&#60;/a&#62;<br>\n";
				
		echo"</td></tr>\n";		
		
		}
		}
		
		
		

	echo"</table>\n";
	echo"</div>\n";
	echo"<br>\n";
	}
else
	{
	echo"<div align='center'>\n";	
	echo"<table cellpadding='10px' cellspacing='0'>\n";
	echo"<tr><th class='tableau1'>".$language['site_name2']."</th>\n";
	echo"<th class='tableau2'>".$language['tag']."</th></tr>\n";
	echo"</table>\n";
	echo"</div>\n";
	echo"<br>\n";	
		
	}
	

//continue

echo"<div class=\"form\">\n";
echo"<form action=\"index.php\" method=\"POST\" >\n";
echo "<input type=\"hidden\" name ='navig' value='6'>\n";
echo"<table class=\"centrer\">\n";	
echo"<tr>\n";
echo"<td colspan=\"2\">\n";
echo"<input name='ok' type='submit'  value=' OK ' size='20'>\n";
echo"</td>\n";
echo"</tr>\n";
echo"</table>\n";
echo"</form>\n";
echo"</div>";

?>