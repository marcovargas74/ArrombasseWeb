<?php
//----------------------------------------------------------------------
//  CrawlTrack 2.3.0a
//----------------------------------------------------------------------
// Crawler Tracker for website
//----------------------------------------------------------------------
// Author: Jean-Denis Brun
//----------------------------------------------------------------------
// Website: www.crawltrack.fr
//----------------------------------------------------------------------
// That script is distributed under GNU GPL license
//----------------------------------------------------------------------
// file: createtable.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_INSTALL'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}

//determine the path to the file
if (isset($_SERVER['SCRIPT_FILENAME']) && !empty($_SERVER['SCRIPT_FILENAME']))
    {
    $path = dirname( $_SERVER['SCRIPT_FILENAME'] );
    }
else
    {
    $path = '.';
    }

//valid form

if($idmysql=='' OR $passwordmysql=='' OR $hostmysql=='' OR $basemysql=='')
	{
        
	echo"<p>".$language['step1_install_no_ok']."</p>";


	echo"<div class=\"form\">\n";
	echo"<form action=\"index.php\" method=\"POST\" >\n";
	echo "<input type=\"hidden\" name ='validform' value='2'>\n";
	echo "<input type=\"hidden\" name ='navig' value='15'>\n";	
	echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
	echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
	echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
	echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
	echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";
	echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
	echo"</form>\n";
	echo"</div>\n";
	}

//configconnect file creation

else
	{

	//check if file already exist

	if(file_exists('include/configconnect.php') )
		{
		$filename=$path.'/include/configconnect.php';
		}
	else
		{

        //file didn't exist, we can create it	

		@$content.="<?php\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="//  CrawlTrack 2.3.0\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="// Crawler Tracker for website\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="// Author: Jean-Denis Brun\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="// Website: www.crawltrack.fr\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="// That script is distributed under GNU GPL license\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="// file: configconnect.php\n";
		@$content.="//----------------------------------------------------------------------\n";
		@$content.="\$crawltuser=\"$idmysql\";\n";
		@$content.="\$crawltpassword=\"$passwordmysql\";\n";
		@$content.="\$crawltdb=\"$basemysql\";\n";
		@$content.="\$crawlthost=\"$hostmysql\";\n";
		@$content.="?>\n";



		$filename=$path.'/include/configconnect.php';
        $filedir=$path.'/include';
        
        
        //chmod the directory
       if(function_exists('chmod'))
            {
            @chmod($filedir, 0777);
            }
            
 		if ( $file = fopen($filename, "w") )
			{
			fwrite($file, $content);
			fclose($file);
			}
		}

	//crawltrack file creation
	
	//check if file already exist

	if(file_exists('crawltrack.php') )
		{
		$filename2=$path.'/crawltrack.php';
		}
	else
		{	
		//file didn't exist, we can create it	
			
		    //url calculation
    
        $dom=$_SERVER["HTTP_HOST"]; 
        $file1=$_SERVER["PHP_SELF"];
        $size= strlen($file1);  
        $file1=substr($file1,-$size,-9);       
        $url_crawlt="http://".$dom.$file1;  
		
		
		
        @$content2.="<?php\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="//  CrawlTrack 2.3.0\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="// Crawler Tracker for website\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="// Author: Jean-Denis Brun\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="// Website: www.crawltrack.fr\n";		
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="// That script is distributed under GNU GPL license\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="// file: crawltrack.php\n";
        @$content2.="//----------------------------------------------------------------------\n";
        @$content2.="error_reporting(0);\n";
        @$content2.="\$crawltattack=0;\n"; 
        @$content2.="//connection to database\n";	
        @$content2.="include(\"$path/include/configconnect.php\");\n";   	
        @$content2.="\$crawltconnexion = mysql_connect(\$crawlthost,\$crawltuser,\$crawltpassword);\n";
        @$content2.="\$selection = mysql_select_db(\$crawltdb);\n";	
        @$content2.="//query to get the good site list\n";
        @$content2.="\$sql = \"SELECT host_site FROM crawlt_good_sites\";\n";
        @$content2.="\$requete = mysql_query(\$sql, \$crawltconnexion) or die(\"MySQL query error\");\n";
        @$content2.="\$nbrresult=mysql_num_rows(\$requete);\n";
        @$content2.="if(\$nbrresult>=1)\n";
        @$content2.="{\n";	
        @$content2.="while (\$ligne = mysql_fetch_row(\$requete))\n";
        @$content2.="{\n";
        @$content2.="\$crawltlistgoodsite[]=\$ligne[0];\n";               
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$crawltlistgoodsite=array();\n";
        @$content2.="}\n";
        @$content2.=" //query to get the session id list\n";
        @$content2.="\$sql = \"SELECT sessionid FROM crawlt_sessionid\";\n";
        @$content2.="\$requete = mysql_query(\$sql, \$crawltconnexion) or die(\"MySQL query error\");\n";
        @$content2.="\$nbrresult=mysql_num_rows(\$requete);\n";
        @$content2.="if(\$nbrresult>=1)\n";
        @$content2.="{\n";	
        @$content2.="while (\$ligne = mysql_fetch_row(\$requete))\n";
        @$content2.="{\n";
        @$content2.="\$crawltlistsessionid[]=\$ligne[0];\n";               
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$crawltlistsessionid=array();\n";
        @$content2.="}\n";       				
        @$content2.="//mysql escape function\n";		
        @$content2.="function crawlt_sql_quote( \$value )\n";
        @$content2.="{\n";
        @$content2.="if( get_magic_quotes_gpc() )\n";
        @$content2.="{\n";
        @$content2.="\$value = stripslashes( \$value );\n";
        @$content2.="}\n";
        @$content2.="//check if this function exists\n";
        @$content2.="if( function_exists( \"mysql_real_escape_string\" ) )\n";
        @$content2.="{\n";
        @$content2.="\$value = mysql_real_escape_string( \$value );\n";
        @$content2.="}\n";
        @$content2.="//for PHP version < 4.3.0 use addslashes\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$value = addslashes( \$value );\n";
        @$content2.="}\n";
        @$content2.="return \$value;\n";
        @$content2.="}\n";
        @$content2.="//function url treatment (base on phpMyVisites processParams function)\n";
        @$content2.="function crawlturltreatment(\$url)\n";
        @$content2.="{\n";
        @$content2.="global \$crawltlistsessionid;\n";
        @$content2.="if(count(\$crawltlistsessionid)==0)\n";
        @$content2.="{\n";
        @$content2.="\$toReturn=\$url;\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";                
        @$content2.="\$url2=ltrim(\$url,\"/\");\n";
        @$content2.="\$urltreated =0;\n"; 
        @$content2.="\$parseurl = parse_url('http://site.com/'.\$url2);\n";    
        @$content2.="if(isset(\$parseurl['query']))\n";
        @$content2.="{\n";
        @$content2.="\$chaine=\$parseurl['query'];\n";
        @$content2.="if(strpos(\$chaine, '&amp;'))\n";
        @$content2.="{\n";
        @$content2.="\$queryEx = explode('&amp;', \$chaine);\n";
        @$content2.="\$separator='&amp;';\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$queryEx = explode('&', \$chaine);\n";
        @$content2.="\$separator='&';\n";
        @$content2.="}\n"; 
        @$content2.="\$return = \$parseurl['path'] . '?';\n";		
        @$content2.="foreach(\$queryEx as \$value)\n";
        @$content2.="{\n";
        @$content2.="\$varAndValue = explode('=', \$value);\n";        
        @$content2.="// include only parameters\n";
        @$content2.="if( sizeof(\$varAndValue) >= 2  && in_array(\$varAndValue[0], \$crawltlistsessionid))\n";
        @$content2.="{\n";
        @$content2.="\$urltreated=1;\n";	
        @$content2.="}\n";
        @$content2.="elseif( sizeof(\$varAndValue) >= 2)\n";
        @$content2.="{\n";
        @$content2.="\$return .= \$varAndValue[0].\"=\";\n";
        @$content2.="for(\$i=1; \$i< sizeof(\$varAndValue);\$i++)\n";
        @$content2.="{\n";
        @$content2.="\$return .= \$varAndValue[\$i].\"=\";\n";
        @$content2.="}\n";
        @$content2.="\$return = rtrim(\$return,\"=\").\$separator;\n";			
        @$content2.="}\n";
        @$content2.="}\n";		
        @$content2.="if(substr(\$return, strlen(\$return)-strlen(\$separator)) == \$separator && \$urltreated==1)\n";
        @$content2.="{\n";
        @$content2.="\$toReturn = substr(\$return, 0, strlen(\$return)-strlen(\$separator));\n";
        @$content2.="}\n";
        @$content2.="else if(substr(\$return, strlen(\$return)-1) == '?'  && \$urltreated==1)\n";
        @$content2.="{\n";
        @$content2.="\$toReturn = substr(\$return, 0, strlen(\$return)-1);\n";
        @$content2.="}\n";
        @$content2.="elseif(\$urltreated==0)\n";
        @$content2.="{\n";
        @$content2.="\$toReturn=\$url;\n";
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$toReturn = \$url;\n";
        @$content2.="}\n"; 
        @$content2.="}\n";               
        @$content2.="return \$toReturn;\n";
        @$content2.="}\n";       		
        @$content2.="//get information\n";
        @$content2.="if (!isset(\$_SERVER))\n";
        @$content2.="	{\n";
        @$content2.="	\$_SERVER = \$HTTP_SERVER_VARS;\n";	
        @$content2.="	}\n";		
        @$content2.="if(isset(\$_POST['agent']))\n";
        @$content2.="	{\n";
        @$content2.="	\$crawltagent = \$_POST['agent'];\n";	
        @$content2.="	}\n";
        @$content2.="else\n";
        @$content2.="	{\n";
        @$content2.="	\$crawltagent =\$_SERVER['HTTP_USER_AGENT'];\n";	
        @$content2.="	}\n";
        @$content2.="if(isset(\$_POST['ip']))\n";
        @$content2.="	{\n";
        @$content2.="	\$crawltip = \$_POST['ip'];\n";	
        @$content2.="	}\n";
        @$content2.="else\n";
        @$content2.="	{\n";
        @$content2.="\$crawltip = \$_SERVER['REMOTE_ADDR'];\n";
        @$content2.="	}\n";													
        @$content2.="if(isset(\$_POST['url']))\n";
        @$content2.="	{\n";
        @$content2.="	\$crawlturl2 = \$_POST['url'];\n";        
        @$content2.="\$crawltpostrequest=1;\n";
        @$content2.="	}\n";
        @$content2.="else\n";
        @$content2.="	{\n";
        @$content2.="	\$crawlturl2 =\$_SERVER['REQUEST_URI'];\n";
        @$content2.="\$crawltpostrequest=0;\n";        	
        @$content2.="	}\n";
        @$content2.="	\$crawlturl = crawlturltreatment(\$crawlturl2);\n";        	
        @$content2.="if(isset(\$_POST['site']))\n";
        @$content2.="	{\n";
        @$content2.="	\$crawltsite = \$_POST['site'];\n";	
        @$content2.="	}\n";
        @$content2.="else\n";
        @$content2.="	{\n";
        @$content2.="   if(!isset(\$crawltsite))\n";
        @$content2.="	    {\n";
        @$content2.="       \$crawltsite=\$site;\n";
        @$content2.="	    }\n";					
        @$content2.="	}\n";			
        @$content2.="//treatment of ip to prepare the mysql request\n";
        @$content2.="\$crawltcptip=1;\n";
        @$content2.="\$crawltlgthip=strlen(\$crawltip);\n";
        @$content2.="while(\$crawltcptip <=\$crawltlgthip)\n";
        @$content2.="{\n";
        @$content2.="\$crawlttableip[]=substr(\$crawltip,0,\$crawltcptip);\n";
        @$content2.="\$crawltcptip++;\n";
        @$content2.="}\n";
        @$content2.="\$crawltlistip=implode(\"','\",\$crawlttableip);\n";
        @$content2.="//get config parameters\n";
        @$content2.="\$sqlcrawltconfig = \"SELECT mail, datelastmail, timeshift, lang, addressmail, datelastseorequest, loop1, loop2, typemail, typecharset, blockattack FROM crawlt_config\";\n";
        @$content2.="\$requetecrawltconfig = mysql_query(\$sqlcrawltconfig, \$crawltconnexion);\n";
        @$content2.="\$nbrresultcrawlt=mysql_num_rows(\$requetecrawltconfig);\n";
        @$content2.="if(\$nbrresultcrawlt>=1)\n";
        @$content2.="    {\n";	
        @$content2.="    \$lignecrawlt = mysql_fetch_row(\$requetecrawltconfig);\n";
        @$content2.="    \$crawltmail=\$lignecrawlt[0];\n";
        @$content2.="    \$crawltdatemail=\$lignecrawlt[1];\n";
        @$content2.="    \$crawlttime=\$lignecrawlt[2];\n";
        @$content2.="    \$crawltlang=\$lignecrawlt[3];\n";
        @$content2.="    \$crawltdest=\$lignecrawlt[4];\n";
        @$content2.="    \$crawltdatelastseorequest=\$lignecrawlt[5];\n";
        @$content2.="    \$crawltloop=\$lignecrawlt[6];\n"; 
        @$content2.="    \$crawltloop2=\$lignecrawlt[7];\n";
        @$content2.="    \$crawltmailishtml=\$lignecrawlt[8];\n";
        @$content2.="    \$crawltcharset=\$lignecrawlt[9];\n";
        @$content2.="    \$crawltblockattack=\$lignecrawlt[10];\n";
        @$content2.="    if( \$crawltcharset !=1)\n";
        @$content2.="       {\n"; 
        @$content2.="       \$crawltlang = \$crawltlang.\"iso\";\n";
        @$content2.="       }\n";                         
        @$content2.="    \$crawltcheck=1;\n";                       
        @$content2.="    }\n";        	             
        @$content2.="// check if the user agent or the ip exist in the crawler table\n";		
        @$content2.="\$result = mysql_query(\"SELECT crawler_user_agent, crawler_ip,id_crawler FROM crawlt_crawler\n"; 
        @$content2.=" WHERE INSTR('\".crawlt_sql_quote(\$crawltagent).\"',crawler_user_agent) > 0\n";
        @$content2.="OR crawler_ip IN ('\$crawltlistip') \",\$crawltconnexion);\n";
        @$content2.="\$num_rows = mysql_num_rows(\$result);\n";
        @$content2.="if (\$num_rows>0)\n";
        @$content2.="{\n";
        @$content2.="if(ereg('http\:|%20select%20|%20like%20|%20or%20|%20where%20', strtolower(ltrim(\$crawlturl2,\"h\"))))\n"; 
        @$content2.="{\n";
        @$content2.="\$crawltattack=1;\n";
        @$content2.="\$crawlturl=\$crawlturl2;\n";        
        @$content2.="\$crawltnbrattack=substr_count(\$crawlturl,'http:');\n";
        @$content2.="\$crawltnbrgoodsite=0;\n";
        @$content2.="foreach(\$crawltlistgoodsite as \$crawltgoodsite)\n";
        @$content2.="{\n";
        @$content2.="if(strpos(\$crawlturl, \$crawltgoodsite))\n";
        @$content2.="{\n";
        @$content2.="\$crawltnbrgoodsite++;\n";
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="if(\$crawltnbrgoodsite == \$crawltnbrattack && \$crawltnbrattack !=0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltattack=0;\n";
        @$content2.="}\n";
        @$content2.="}\n";         
        @$content2.="\$crawltdata = mysql_fetch_row(\$result);\n";
        @$content2.="\$crawltcrawler = \$crawltdata[2];\n";
        @$content2.="\$crawltdate  = date(\"Y-m-d H:i:s\");\n";
        @$content2.="//check if the page already exist, if not add it to the table\n";
        @$content2.="\$result2 = mysql_query(\"SELECT id_page FROM crawlt_pages WHERE url_page='\".crawlt_sql_quote(\$crawlturl).\"'\",\$crawltconnexion);\n";
        @$content2.="\$num_rows2 = mysql_num_rows(\$result2);\n";
        @$content2.="if (\$num_rows2>0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltdata2 = mysql_fetch_row(\$result2);\n";	
        @$content2.="\$crawltpage= \$crawltdata2[0];\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_pages (url_page) VALUES ('\".crawlt_sql_quote(\$crawlturl).\"')\",\$crawltconnexion);\n";
        @$content2.="\$crawltid_insert = mysql_fetch_row(mysql_query(\"SELECT LAST_INSERT_ID()\",\$crawltconnexion));\n";
        @$content2.="\$crawltpage = \$crawltid_insert[0];\n";
        @$content2.="}\n";
        @$content2.="//insertion of the visit datas in the visits database\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_visits (crawlt_site_id_site, crawlt_pages_id_page, crawlt_crawler_id_crawler, date, crawlt_ip_used) VALUES ('\".crawlt_sql_quote(\$crawltsite).\"', '\".crawlt_sql_quote(\$crawltpage).\"', '\".crawlt_sql_quote(\$crawltcrawler).\"', '\".crawlt_sql_quote(\$crawltdate).\"', '\".crawlt_sql_quote(\$crawltip).\"')\",\$crawltconnexion);\n";      
        @$content2.="}\n";
        @$content2.="elseif(ereg('http\:|%20select%20|%20like%20|%20or%20|%20where%20', strtolower(ltrim(\$crawlturl2,\"h\"))))\n"; 
        @$content2.="{\n";    
        @$content2.="\$crawltattack=1;\n";
        @$content2.="\$crawlturl=\$crawlturl2;\n";         
        @$content2.="\$crawltnbrattack=substr_count(\$crawlturl,'http:');\n";
        @$content2.="\$crawltnbrgoodsite=0;\n";
        @$content2.="foreach(\$crawltlistgoodsite as \$crawltgoodsite)\n";
        @$content2.="{\n";
        @$content2.="if(strpos(\$crawlturl, \$crawltgoodsite))\n";
        @$content2.="{\n";
        @$content2.="\$crawltnbrgoodsite++;\n";
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="if(\$crawltnbrgoodsite == \$crawltnbrattack && \$crawltnbrattack !=0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltattack=0;\n";
        @$content2.="}\n";              
        @$content2.="\$crawltdate  = date(\"Y-m-d H:i:s\");\n";        
        @$content2.="//check if the page already exist, if not add it to the table\n";
        @$content2.="\$result2 = mysql_query(\"SELECT id_page FROM crawlt_pages WHERE url_page='\".crawlt_sql_quote(\$crawlturl).\"'\",\$crawltconnexion);\n";
        @$content2.="\$num_rows2 = mysql_num_rows(\$result2);\n";
        @$content2.="if (\$num_rows2>0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltdata2 = mysql_fetch_row(\$result2);\n";	
        @$content2.="\$crawltpage= \$crawltdata2[0];\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_pages (url_page) VALUES ('\".crawlt_sql_quote(\$crawlturl).\"')\",\$crawltconnexion);\n";
        @$content2.="\$crawltid_insert = mysql_fetch_row(mysql_query(\"SELECT LAST_INSERT_ID()\",\$crawltconnexion));\n";
        @$content2.="\$crawltpage = \$crawltid_insert[0];\n";
        @$content2.="}\n";
        @$content2.="//insertion of the visit datas in the visits database\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_visits (crawlt_site_id_site, crawlt_pages_id_page, crawlt_crawler_id_crawler, date, crawlt_ip_used) VALUES ('\".crawlt_sql_quote(\$crawltsite).\"', '\".crawlt_sql_quote(\$crawltpage).\"', '0', '\".crawlt_sql_quote(\$crawltdate).\"', '\".crawlt_sql_quote(\$crawltip).\"')\",\$crawltconnexion);\n";
        @$content2.="}\n";         
        @$content2.="else\n";
        @$content2.="{\n";        
        @$content2.="//case human visit\n";    
        @$content2.="\$crawltdate  = date(\"Y-m-d H:i:s\");\n";     
        @$content2.="if (!isset(\$_SERVER))\n";
        @$content2.="{\n";
        @$content2.="\$_SERVER = \$HTTP_SERVER_VARS;\n";
        @$content2.="}\n";
        @$content2.="if(isset(\$_POST['referer']))\n";
        @$content2.="{\n";
        @$content2.="\$crawltreferer = \$_POST['referer'];\n";
        @$content2.="\$crawltrefereok=1;\n";
        @$content2.="}\n";
        @$content2.="elseif(isset(\$_SERVER['HTTP_REFERER']))\n";
        @$content2.="{\n";
        @$content2.="\$crawltreferer=\$_SERVER['HTTP_REFERER'];\n";
        @$content2.="\$crawltrefereok=1;\n";        
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="\$crawltrefereok=0;\n";        
        @$content2.="}\n"; 
        @$content2.="if(\$crawltrefereok==1)\n";
        @$content2.="{\n";            
        @$content2.="\$crawltreferertreatment = parse_url(\$crawltreferer);\n";
        @$content2.="include(\"$path/include/searchenginelist.php\");\n";     
        @$content2.="\$crawltsearchengine=0;\n";    
        @$content2.="//test google\n";
        @$content2.="if( in_array(\"\$crawltreferertreatment[host]\",\$crawltgooglelist)=='True')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=1;\n";
        @$content2.="parse_str(\$crawltreferertreatment['query'],\$crawlttabvar);\n";
        @$content2.="\$crawltkeyword = \$crawlttabvar['q'];\n";
        @$content2.="if(\$crawltkeyword=='')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=0;\n";
        @$content2.="}\n";
        @$content2.="}\n";
        @$content2.="//test yahoo\n";
        @$content2.="elseif(in_array(\"\$crawltreferertreatment[host]\",\$crawltyahoolist)=='True')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=2;\n";
        @$content2.="parse_str(\$crawltreferertreatment['query'],\$crawlttabvar);\n";
        @$content2.="\$crawltkeyword = \$crawlttabvar['p'];\n";
        @$content2.="if(\$crawltkeyword=='')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=0;\n";
        @$content2.="}\n";       
        @$content2.="}\n";
        @$content2.="//test msn\n";
        @$content2.="elseif(in_array(\"\$crawltreferertreatment[host]\",\$crawltmsnlist)=='True')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=3;\n";
        @$content2.="parse_str(\$crawltreferertreatment['query'],\$crawlttabvar);\n";
        @$content2.="\$crawltkeyword = \$crawlttabvar['q'];\n";
        @$content2.="if(\$crawltkeyword=='')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=0;\n";
        @$content2.="}\n";      
        @$content2.="}\n";       
        @$content2.="//test ask\n";
        @$content2.="elseif(in_array(\"\$crawltreferertreatment[host]\",\$crawltasklist)=='True')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=4;\n";
        @$content2.="parse_str(\$crawltreferertreatment['query'],\$crawlttabvar);\n";
        @$content2.="\$crawltkeyword = \$crawlttabvar['q'];\n";
        @$content2.="if(\$crawltkeyword=='')\n";
        @$content2.="{\n";
        @$content2.="\$crawltsearchengine=0;\n";
        @$content2.="}\n";      
        @$content2.="}\n";        
        @$content2.="//case visit send by one of the 4 searchengine\n";     
        @$content2.="if(\$crawltsearchengine !=0)\n";
        @$content2.="{\n";            
        @$content2.="//check if the keyword already exist, if not add it to the table\n";
        @$content2.="\$result4 = mysql_query(\"SELECT id_keyword FROM crawlt_keyword WHERE keyword='\".crawlt_sql_quote(\$crawltkeyword).\"'\");\n";
        @$content2.="\$num_rows4 = mysql_num_rows(\$result4);\n";
        @$content2.="if (\$num_rows4>0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltdata4 = mysql_fetch_row(\$result4);\n";
        @$content2.="\$crawltkeywordid= \$crawltdata4[0];\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_keyword (keyword) VALUES ('\".crawlt_sql_quote(\$crawltkeyword).\"')\");\n";
        @$content2.="\$crawltid_insert2 = mysql_fetch_row(mysql_query(\"SELECT LAST_INSERT_ID()\"));\n";
        @$content2.="\$crawltkeywordid = \$crawltid_insert2[0];\n";
        @$content2.="}\n";           
        @$content2.="//check if the page already exist, if not add it to the table\n";
        @$content2.="\$result2 = mysql_query(\"SELECT id_page FROM crawlt_pages WHERE url_page='\".crawlt_sql_quote(\$crawlturl).\"'\");\n";
        @$content2.="\$num_rows2 = mysql_num_rows(\$result2);\n";
        @$content2.="if (\$num_rows2>0)\n";
        @$content2.="{\n";
        @$content2.="\$crawltdata2 = mysql_fetch_row(\$result2);\n";
        @$content2.="\$crawltpage= \$crawltdata2[0];\n";
        @$content2.="}\n";
        @$content2.="else\n";
        @$content2.="{\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_pages (url_page) VALUES ('\".crawlt_sql_quote(\$crawlturl).\"')\");\n";
        @$content2.="\$crawltid_insert = mysql_fetch_row(mysql_query(\"SELECT LAST_INSERT_ID()\"));\n";
        @$content2.="\$crawltpage = \$crawltid_insert[0];\n";
        @$content2.="}\n";
        @$content2.="//insertion of the visit datas in the visits_human database\n";
        @$content2.="mysql_query(\"INSERT INTO crawlt_visits_human (crawlt_site_id_site, crawlt_keyword_id_keyword, crawlt_id_crawler, date, crawlt_id_page) VALUES ('\".crawlt_sql_quote(\$crawltsite).\"', '\".crawlt_sql_quote(\$crawltkeywordid).\"', '\".crawlt_sql_quote(\$crawltsearchengine).\"', '\".crawlt_sql_quote(\$crawltdate).\"', '\".crawlt_sql_quote(\$crawltpage).\"')\");\n";
        @$content2.="}\n";
        @$content2.="}\n"; 
        @$content2.="}\n";            
        @$content2.="//Email daily stats\n";
        @$content2.="//take in account timeshift\n";
        @$content2.="\$crawltts = strtotime(\"today\")-(\$crawlttime*3600);\n";
        @$content2.="\$crawltdatetoday = date(\"j\",\$crawltts);\n";
        @$content2.="\$crawltdatetoday2 = date(\"Y-m-d\",\$crawltts);\n";        
        @$content2.="\$url_crawlt=\"$url_crawlt\";\n";        
        @$content2.="if((\$crawltdatetoday != \$crawltdatelastseorequest) && \$crawltcheck==1)\n";
        @$content2.="{\n";
        @$content2.="include(\"$path/include/searchenginesposition.php\");\n"; 		
        @$content2.="}\n";
        @$content2.="if((\$crawltdatetoday != \$crawltdatemail) && \$crawltmail==1 && (\$crawltdatetoday == \$crawltdatelastseorequest) && \$crawltcheck==1)\n";
        @$content2.="{\n";
        @$content2.="\$crawltpath=\"$path\";\n"; 	      	         		      		
        @$content2.="include(\"$path/include/mail.php\");\n"; 		
        @$content2.="}\n";
        @$content2.="mysql_close(\$crawltconnexion);\n";
        @$content2.="if(\$crawltattack==1 && \$crawltblockattack==1 && \$crawltpostrequest==1)\n";
        @$content2.="{\n";
        @$content2.="echo \"crawltrack1\";\n";  
        @$content2.="}\n";
        @$content2.="elseif(\$crawltattack==1 && \$crawltblockattack==1)\n";
        @$content2.="{\n";
        @$content2.="\$GLOBALS = array();\n"; 
        @$content2.="\$_COOKIES = array();\n";
        @$content2.="\$_FILES = array();\n";
        @$content2.="\$_ENV = array();\n";
        @$content2.="\$_REQUEST = array();\n";                                       
        @$content2.="\$_POST = array();\n";
        @$content2.="\$_GET = array();\n";
        @$content2.="\$_SERVER = array();\n";
        @$content2.="\$_SESSION = array();\n";
        @$content2.="@session_destroy();\n";
        @$content2.="@mysql_close();\n";
        @$content2.="@header(\"Location:".$url_crawlt."html/noacces.htm\");\n";
        @$content2.="echo\"<head>\";\n";
        @$content2.="echo\"<META HTTP-EQUIV='Refresh' CONTENT='0;URL=".$url_crawlt."html/noacces.htm'>\";\n";
        @$content2.="echo\"</head>\";\n"; 
        @$content2.="} \n";
        @$content2.="?>\n";
		
		$filename2=$path.'/crawltrack.php';
		
		 $filedir=$path;
        
        
        //chmod the directory
       if(function_exists('chmod'))
            {
            @chmod($filedir, 0777);
            }
		
				
		if ( $file2 = fopen($filename2, "w") )
			{
			fwrite($file2, $content2);
			fclose($file2);
			}
		}

//set the correct chmod level to all folder
if(function_exists('chmod'))
    {
    @chmod($path, 0705);
    @chmod($path.'/cache', 0705);
    @chmod($path.'/graphs', 0705);    
    @chmod($path.'/html', 0705);    
    @chmod($path.'/images', 0705);    
    @chmod($path.'/include', 0705);    
    @chmod($path.'/language', 0705);
    @chmod($path.'/php', 0705);    
    @chmod($path.'/phpmailer', 0705);    
    @chmod($path.'/styles', 0705);            
    }




	//check if file correctly created

	if(file_exists('include/configconnect.php') && file_exists('crawltrack.php'))
		{
		//case file ok
		
		echo"".$language['step1_install_ok']."<br>\n";

		// tables creation
		include"./include/configconnect.php";

		$connexion = mysql_connect($crawlthost,$crawltuser,$crawltpassword);

		// check if connection is ok

		if(!$connexion) 
			{
			//suppress the files
    if(function_exists('chmod'))
        {
        @chmod($path, 0777);   
        @chmod($path.'/include', 0777);               
        }			
			unlink($filename);
			unlink($filename2);
			
			echo"<p>".$language['step2_install_no_ok']."</p>";

			
			echo"<div class=\"form\">\n";
			echo"<form action=\"index.php\" method=\"POST\" >\n";
			echo "<input type=\"hidden\" name ='validform' value='2'>\n";
			echo "<input type=\"hidden\" name ='navig' value='15'>\n";
			echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";			
			echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
			echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
			echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
			echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";
			echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
			echo"</form>\n";
			echo"</div>\n";
			}
		else
			{

			//check is base selection is ok

			$selection = mysql_select_db($crawltdb);

			if(!$selection)
				{
				//suppress the files
    if(function_exists('chmod'))
        {
        @chmod($path, 0777);   
        @chmod($path.'/include', 0777);               
        }				
				unlink($filename);
				unlink($filename2);
				echo"<p>".$language['step3_install_no_ok']."</p>";

				
				echo"<div class=\"form\">\n";
				echo"<form action=\"index.php\" method=\"POST\" >\n";
				echo "<input type=\"hidden\" name ='validform' value='2'>\n";
				echo "<input type=\"hidden\" name ='navig' value='15'>\n";
				echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";				
				echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
				echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
				echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
				echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";
				echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='20'>\n";
				echo"</form>\n";
				echo"</div>\n";
				}
			else
				{

				//crawlt_crawler table creation


				//check if table already exist

				$table_exist1 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_crawler')
						{
						$table_exist1 = 1;
						}
					}


				if($table_exist1 == 0)
					{

					//the table didn't exist, we can create it

		 			$result = mysql_query("CREATE TABLE crawlt_crawler (
					id_crawler SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
					crawler_user_agent VARCHAR(255) NULL,
					crawler_name VARCHAR(45) NULL,
					crawler_url VARCHAR(255) NULL,
					crawler_info VARCHAR(255) NULL,
					crawler_ip VARCHAR(16) NULL,					
					PRIMARY KEY(id_crawler)
					)");

					}
				else
					{
					$result=1;
					}


				//crawlt_crawler table filling

				//check if table is already filled

				$nbr=0;
				$resultat=mysql_query("SELECT * FROM crawlt_crawler");
				$nbr = mysql_num_rows($resultat);

				if($nbr<707)
					{
					//the table is empty, we can filled it

$result2 =mysql_query("INSERT INTO crawlt_crawler VALUES 
(1,'AIBOT/2.1 By +(www.21seek.com , A Real artificial intelligence search engine , China)','Aibot','http://www.21seek.com/','21seek',''),
(2,'4anything.com LinkChecker v2.0','4anything','http://www.4anything.com/','4anything',''),
(3,'AbachoBOT','AbachoBot','http://www.abacho.com/','Abacho',''),
(4,'AbachoBOT (Mozilla compatible)','AbachoBot','http://www.abacho.com/','Abacho',''),
(5,'ABCdatos BotLink/5.xx.xxx#BBL','ABCdatos','http://www.abcdatos.com/','ABCdatos',''),
(6,'Aberja Checkoma','Aberja Checkoma','http://www.aberja.de/','Aberja',''),
(7,'abot/0.1 (abot; http://www.abot.com; abot@abot.com)','Abot','http://www.abot.com/','Abot.com',''),
(8,'About/0.1libwww-perl/5.47','About','http://www.about.com/','About',''),
(9,'AcoiRobot','Acoi','http://monetdb.cwi.nl/acoi/projects.html','Acoi',''),
(10,'Acoon Robot v1.50.001','Acoon Robot','http://www.acoon.de/','Acoon',''),
(11,'accoona','Accoona','http://www.accoona.com/','Accoona',''),
(12,'Mozilla/4.0 (JemmaTheTourist;http://www.activtourist.com)','Activtourist','http://www.activtourist.com','Activtourist',''),
(13,'AESOP_com_SpiderMan','Aesop','http://www.aesop.com/','Aesop',''),
(14,'agadine/1.x.x (+http://www.agada.de)','Agada','http://www.agada.de','Agada',''),
(15,'Mozilla/4.0 (agadine3.0)','Agada','http://www.agada.de','Agada',''),
(16,'Mozilla/4.0 (agadine3.0) www.agada.de','Agada','http://www.agada.de','Agada',''),
(17,'aipbot/1.0 (aipbot; http://www.aipbot.com; aipbot@aipbot.com)','Aipbot','http://www.aipbot.com','Aipbot',''),
(18,'PortalBSpider/2.0 (spider@portalb.com)','Alacra','http://www.portalb.com/alacra/index.htm','Alacra',''),
(19,'Aladin/3.324','Aladin.de','http://www.abacho.de/','Abacho',''),
(20,'Aleksika Spider/1.0 (+http://www.aleksika.com/)','Aleksika Danmark','http://www.aleksika.com/','Aleksika',''),
(21,'ia_archiver','Alexa','http://pages.alexa.com/help/webmasters/index.html','Alexa',''),
(22,'Allesklar/0.1 libwww-perl/5.46','Allesklar.de','http://www.allesklar.de/','Allesklar',''),
(23,'Scooter/1.0','Altavista','http://www.altavista.com/','Altavista',''),
(24,'Scooter/2.0 G.R.A.B V1.0','Altavista','http://www.altavista.com/','Altavista',''),
(25,'Scooter/1.0 scooter@pa.dec.com','Altavista','http://www.altavista.com/','Altavista',''),
(26,'Scooter/1.1 (custom)','Altavista','http://www.altavista.com/','Altavista',''),
(27,'Scooter/2.0 G.R.A.B. V1.1.0','Altavista','http://www.altavista.com/','Altavista',''),
(28,'Scooter/2.0 G.R.A.B. X2.0','Altavista','http://www.altavista.com/','Altavista',''),
(29,'Scooter-3.0.EU','Altavista','http://www.altavista.com/','Altavista',''),
(30,'Scooter-3.0.FS','Altavista','http://www.altavista.com/','Altavista',''),
(31,'Scooter-3.0.HD','Altavista','http://www.altavista.com/','Altavista',''),
(32,'Scooter-3.0.VNS','Altavista','http://www.altavista.com/','Altavista',''),
(33,'Scooter-3.0QI','Altavista','http://www.altavista.com/','Altavista',''),
(34,'Scooter-3.2','Altavista','http://www.altavista.com/','Altavista',''),
(35,'Scooter-3.2.BT','Altavista','http://www.altavista.com/','Altavista',''),
(36,'Scooter-3.2.DIL','Altavista','http://www.altavista.com/','Altavista',''),
(37,'Scooter-3.2.EX','Altavista','http://www.altavista.com/','Altavista',''),
(38,'Scooter-3.2.JT','Altavista','http://www.altavista.com/','Altavista',''),
(39,'Scooter-3.2.NIV','Altavista','http://www.altavista.com/','Altavista',''),
(40,'Scooter-3.2.SF0','Altavista','http://www.altavista.com/','Altavista',''),
(41,'Scooter-3.2.snippet','Altavista','http://www.altavista.com/','Altavista',''),
(42,'Scooter/3.3','Altavista','http://www.altavista.com/','Altavista',''),
(43,'Scooter/3.3.QA.pczukor','Altavista','http://www.altavista.com/','Altavista',''),
(44,'Scooter/3.3_SF','Altavista','http://www.altavista.com/','Altavista',''),
(45,'Scooter/3.3.vscooter','Altavista','http://www.altavista.com/','Altavista',''),
(46,'Scooter-3.3dev','Altavista','http://www.altavista.com/','Altavista',''),
(47,'Scooter-ARS-1.1','Altavista','http://www.altavista.com/','Altavista',''),
(48,'Scooter-ARS-1.1-ih','Altavista','http://www.altavista.com/','Altavista',''),
(49,'Scooter_bh0-3.0.3','Altavista','http://www.altavista.com/','Altavista',''),
(50,'Scooter_trk3-3.0.3','Altavista','http://www.altavista.com/','Altavista',''),					
(51,'scooter-venus-3.0.vns','Altavista','http://www.altavista.com/','Altavista',''),
(52,'Scooter-W3-1.0','Altavista','http://www.altavista.com/','Altavista',''),
(53,'Scooter-W3.1.2','Altavista','http://www.altavista.com/','Altavista',''),
(54,'Scooter2_Mercator_x-x.0','Altavista','http://www.altavista.com/','Altavista',''),
(55,'http://www.almaden.ibm.com/cs/crawler','Almaden','http://www.almaden.ibm.com/cs/crawler/','IBM',''),
(56,'Amfibibot/0.06 (Amfibi Robot; http://www.amfibi.com; agent@amfibi.com)','Amfibibot','http://www.amfibi.com','Amfibi',''),
(57,'libwww-perl/5.65','Amidalla','http://www.amidalla.com/','Amidalla',''),
(58,'AnnoMille spider 0.1 alpha - http://www.annomille.it','Annomille','http://www.annomille.it','Annomille',''),
(59,'AnswerBus (http://www.answerbus.com/)','AnswerBus','http://www.answerbus.com','AnswerBus',''),
(60,'antibot-V1.3.3.1/debian-linux-sarge','Antibot','http://www.antidot.net/','Antidot',''),
(61,'Mozilla/4.0 (Sleek Spider/1.2)','Any Search Info','http://search-info.com/','Search-Info',''),
(62,'TECOMAC-Crawler/0.x','Arexera','http://www.arexera.de/','Arexera',''),
(63,'X-Crawler','Arexera','http://www.arexera.de/','Arexera',''),
(64,'www.arianna.it','Arianna','http://arianna.libero.it/','Libero',''),
(65,'AnzwersCrawl/2.0 (anzwerscrawl@anzwers.com.au;Engine)','Anzwers Australia','http://au.anzwers.yahoo.com/','Anzwers Australia',''),
(66,'PROve AnswerBot 4.0','Answerchase','http://www.answerchase.com/','Answerchase',''),
(67,'Sqworm/2.9.81-BETA (beta_release; 20011102-760; i686-pc-linux-gnu)','AOL','http://www.aol.com/','AOL',''),
(68,'Aport','Aport','http://www.aport.ru/','Aport',''),
(69,'appie 1.1 (www.walhello.com)','Appie','http://www.walhello.com/','Walhello',''),
(70,'Asahina-Antenna/1.x','Asahina','http://masshy.fastwave.gr.jp/hina/release/','Asahina',''),
(71,'Asahina-Antenna/1.x (libhina.pl/x.x ; libtime.pl/x.x)','Asahina','http://masshy.fastwave.gr.jp/hina/release/','Asahina',''),
(72,'ASPSeek/1.2.x','ASPseek','http://www.aspseek.org/','ASPseek',''),
(73,'ASPseek/1.2.xx','ASPseek','http://www.aspseek.org/','ASPseek',''),
(74,'ASPSeek/1.2.xxpre','ASPseek','http://www.aspseek.org/','ASPseek',''),
(75,'ASPSeek/1.2.xa','ASPseek','http://www.aspseek.org/','ASPseek',''),
(76,'ASPSeek/1.2.5','ASPseek','http://www.aspseek.org/','ASPseek',''),
(77,'ASPseek/1.2.9d','ASPseek','http://www.aspseek.org/','ASPseek',''),
(78,'ask.24x.info','Ask 24x Info','http://ask.24x.info/','Ask 24x',''),
(79,'Mozilla/2.0 (compatible; Ask Jeeves/Teoma; +http://sp.ask.com/docs/about/tech_crawling.html)','Ask Jeeves/Teoma','http://sp.ask.com/docs/about/tech_crawling.html','Ask Jeeves',''),
(80,'Mozilla/4.0 (compatible: AstraSpider V.2.1 : astrafind.com)','Astrafind!','http://www.seeq.com/lander.jsp?domain=astrafind.com','Seeq',''),
(81,'AtlocalBot/1.1 +(http://www.atlocal.com/local-web-site-owner.html)','Atlocal','http://www.atlocal.com/local-web-site-owner.html','@Local',''),
(82,'augurfind','Augurnet Swiss','http://www.augurnet.ch/','Augurnet Swiss',''),
(83,'augurnfind V-1.x','Augurnet Swiss','http://www.augurnet.ch/','Augurnet Swiss',''),
(84,'axadine/  (Axadine Crawler; http://www.axada.de/;  )','Axada','http://www.axada.de','Axada',''),
(85,'AxmoRobot - Crawling your site for better indexing on www.axmo.com search engine.','Axmo','http://www.axmo.com/','Axmo',''),
(86,'FastBug http://www.ay-up.com','Ay-Up','http://www.ay-up.com','Ay-up',''),
(87,'Mozilla/4.72 [en] (BACS http://www.ba.be)','Ba.be','http://www.ba.be/','BA',''),
(88,'BaboomBot/1.x.x (+http://www.baboom.us)','BaBoom Web Portal','http://www.baboom.us','Baboum',''),
(89,'BanBots/1.2 (spider@banbots.com)','BanBot','http://www.banbots.com/','Banbot',''),
(90,'Baiduspider+(+http://www.baidu.com/search/spider.htm)','Baiduspider','http://www.baidu.com/search/spider.htm','Baidu.com',''),
(91,'Mozilla/5.0 (compatible; BecomeBot/1.83; MSIE 6.0 compatible; +http://www.become.com/site_owners.html)','BecomeBot','http://www.become.com/site_owners.html','BecomeBot',''),
(92,'beautybot/1.0 (+http://www.uchoose.de/crawler/beautybot/)','Beauty (Cosmoty)','http://www.uchoose.de/crawler/beautybot/','uCHOOSE',''),
(93,'BigCliqueBOT/1.03-dev (bigclicbot; http://www.bigclique.com; bot@bigclique.com)','BigClique','http://www.bigclique.com','BigClique',''),
(94,'Custom Spider www.bisnisseek.com /1.0','Bisnisseek','www.bisnisseek.com','Bisnisseek',''),
(95,'BTbot/0.x (+http://www.btbot.com/btbot.html)','Btbot','http://www.btbot.com/btbot.html','Btbot',''),
(96,'Blaiz-Bee/1.0 (+http://www.blaiz.net)','Blaiz Enterprises','http://www.blaiz.net/','Blaiz Enterprises',''),
(97,'BlitzBOT@tricus.net','Blitzsuche','http://blitzsuche.rp-online.de/','RP ONLINE',''),
(98,'BlitzBOT@tricus.net (Mozilla compatible)','Blitzsuche','http://blitzsuche.rp-online.de/','RP ONLINE',''),
(99,'Mozilla/4.0 (compatible; B_L_I_T_Z_B_O_T)','Blitzsuche','http://blitzsuche.rp-online.de/','RP ONLINE',''),
(100,'Naamah 1.0.1/Blogbot (http://blogbot.de/)','Blogbot','http://blogbot.de/','Blogbot',''),
(101,'Naamah 1.0a/Blogbot (http://blogbot.de/)','Blogbot','http://blogbot.de/','Blogbot',''),
(102,'BlogBot/1.x','Blogdex','http://blogdex.media.mit.edu/','Massachusetts Institute of Technology',''),
(103,'Bloglines Title Fetch/1.0 (http://www.bloglines.com)','Bloglines','http://www.bloglines.com','Bloglines',''),
(104,'blogWatcher_Spider/0.1 (http://www.lr.pi.titech.ac.jp/blogWatcher/)','BlogWatcher','http://www.lr.pi.titech.ac.jp/','Okumura Group',''),
(105,'boitho.com-dc','Boitho','http://www.boitho.com/','Boitho',''),
(106,'boitho.com-dc/0.xx (http://www.boitho.com/dcbot.html)','Boitho','http://www.boitho.com/','Boitho',''),
(107,'boitho.com-robot/1.x','Boitho','http://www.boitho.com/','Boitho',''),
(108,'boitho.com-robot/1.x (http://www.boitho.com/bot.html)','Boitho','http://www.boitho.com/','Boitho',''),
(109,'BravoBrian SpiderEngine MarcoPolo','BravoBrian bSTOP','http://bravobrian.it/','BravoBrian',''),
(110,'BStop.BravoBrian.it Agent Detector','BravoBrian bSTOP','http://bravobrian.it','BravoBrian',''),
(111,'BruinBot (+http://webarchive.cs.ucla.edu/bruinbot.html)','Bruinbot','http://webarchive.cs.ucla.edu/bruinbot.html','University of California',''),
(112,'BullsEye','BullsEye/Intelliseek','http://www.intelliseek.com/','Intelliseek',''),
(113,'Buscaplus Robi/1.0 (http://www.buscaplus.com/robi/)','Buscaplus','http://www.buscaplus.com/','Buscaplus',''),
(114,'RoboCrawl (www.canadiancontent.net)','CanadianContent Search','http://www.canadiancontent.net/','CanadianContent',''),
(115,'ccubee/x.0','Ccubee','http://empyreum.com/technologies/ccubee','Empyreum',''),
(116,'larbin_2.6_basileocaml (basile.starynkevitch@cea.fr)','CEA','http://www.cea.fr/','CEA',''),
(117,'ChristCRAWLER 2.0','Christcentral','http://www.christcrawler.com','Christcentral',''),
(118,'Mozilla/4.0 (compatible; ChristCrawler.com, ChristCrawler@ChristCENTRAL.com)','Christcentral','http://www.christcrawler.com','Christcentral',''),
(119,'CipinetBot (http://www.cipinet.com/bot.html)','CipinetBot','http://www.cipinet.com/bot.html','Cipinet',''),
(120,'Claymont.com','Claymont Search','http://www.claymont.com/home/','Claymont Search',''),
(121,'Clushbot/3.31-BinaryFury (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(122,'Clushbot/2.x (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(123,'Mozilla/5.0 (Clustered-Search-Bot/1.0; support@clush.com; http://www.clush.com/)','Clushbot','http://www.clush.com/','Clush',''),
(124,'Clushbot/3.x-BinaryFury (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(125,'Clushbot/3.xx-Ajax (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(126,'Clushbot/3.xx-Hector (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(127,'Clushbot/3.xx-Peleus (+http://www.clush.com/bot.html)','Clushbot','http://www.clush.com/','Clush',''),
(128,'Crawler (cometsearch@cometsystems.com)','Cometsystems','http://www.cometsystems.com/','Cometsystems',''),
(129,'libwww-perl/5.41','CMP','http://www.cmpnet.com/','CMP United Business Media',''),
(130,'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; obot)','Cobion','http://www.cobion.com/','Cobion',''),
(131,'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 4.0; QXW03018)','Cobion','http://www.cobion.com/','Cobion',''),
(132,'oBot ((compatible;Win32))','Cobion','http://www.cobion.com/','Cobion',''),
(133,'larbin_2.2.0 (crawl@compete.com)','Compete.com','http://www.compete.com/','Compete Inc',''),
(134,'htdig/3.1.6 (http://computerorgs.com)','Computerorgs','http://computerorgs.com/','Computerorgs.com',''),
(135,'ConveraCrawler/0.2','Converas RetrievalWare','http://www.convera.com/Products/','Convera',''),
(136,'Convera Internet Spider V6.x','Converas RetrievalWare','http://www.convera.com/Products/','Convera',''),
(137,'ConveraMultiMediaCrawler/0.1 (+http://www.authoritativeweb.com/crawl)','Converas RetrievalWare','http://www.convera.com/Products/','Convera',''),
(138,'CrawlConvera0.1 (CrawlConvera@yahoo.com)','Converas RetrievalWare','http://www.convera.com/Products/','Convera',''),
(139,'Vision Research Lab image spider at vision.ece.ucsb.edu','Cortina','http://vision.ece.ucsb.edu/multimedia/cortina.html','Vision Research Lab',''),
(140,'Crawler (cometsearch@cometsystems.com)','Cometsystems','http://www.cometsystems.com/','Cometsystems',''),
(141,'CrocCrawler vx.3 [en] (http://www.croccrawler.com) (X11; I; Linux 2.0.44 i686)','Croccrawler','http://www.croccrawler.com/','Croccrawler.com',''),
(142,'Cuasarbot/0.9b http://www.cuasar.com/spider_beta/','Cuasar','http://www.cuasar.com/spider_beta/','Cuasar',''),
(143,'PrivacyFinder Cache Bot v1.0','CUPS','http://privacybird.com/','PrivacyBird',''),
(144,'CurryGuide SiteScan 1.1','CurryGuide','http://web.curryguide.com/','CurryGuide',''),
(145,'Mozilla/3.0 (compatible; Webinator-indexer.cyberalert.com/2.56)','CyberAlerts','http://www.cyberalert.com/','CyberAlerts',''),
(146,'CydralSpider/1.x (Cydral Web Image Search; http://www.cydral.com)','Cydral','http://www.cydral.com','Cydral',''),
(147,'daypopbot/0.x','Daypop','http://www.daypop.com/info/about.htm','Daypop',''),
(148,'DataparkSearch/4.xx (http://www.dataparksearch.org/)','DataparkSearch','http://www.dataparksearch.org/','dpSearch',''),
(149,'Orbiter/T-2.0 (+http://www.dailyorbit.com/bot.htm)','DailyOrbit','http://www.dailyorbit.com/bot.htm','DailyOrbit',''),
(150,'dbDig(http://www.prairielandconsulting.com)','DbDig','http://www.prairielandconsulting.com/','Connections',''),
(151,'deepak-USC/ISI','Deepak-USC/ISI','http://www.isi.edu/%7Eravichan/deepak-usc-isi.html','University of Southern California',''),
(152,'DeepIndex','Deepindex','http://www.deepindex.com/utiliser.html','Deepindex',''),
(153,'DeepIndex (www.en.deepindex.com)','Deepindex','http://www.deepindex.com/utiliser.html','Deepindex',''),
(154,'Denmex websearch (http://search.denmex.com)','Denmex Websearch','http://search.denmex.com','Denmex Websearch',''),
(155,'DiaGem/1.1 (http://www.skyrocket.gr.jp/diagem.html)','DiaGem Japan','http://www.skyrocket.gr.jp/diagem.html','DiaGem Japan',''),
(156,'-DIE-KRAEHE- META-SEARCH-ENGINE/1.1 http://www.die-kraehe.de','Die Kraehe','http://www.die-kraehe.de','Die Kraehe',''),
(157,'Digger/1.0 JDK/1.3.0rc3','Diggit','http://www.diggit.com/','Diggit',''),
(158,'Mozilla/2.0 (compatible; EZResult -- Internet Search Engine)','Direct Hit','http://www.directhit.com/','Teoma',''),
(159,'DittoSpyder','Ditto','http://www.ditto.com/','Ditto',''),
(160,'FlickBot 2.0 RPT-HTTPClient/0.3-3','FlickBot','http://www.divx.com/','DivX.com',''),
(161,'Download-Tipp Linkcheck (http://download-tipp.de/)','Download-Tipp','http://download-tipp.de/','Download-Tipp',''),
(162,'EyeCatcher (Download-tipp.de)/1.0','Download-Tipp','http://download-tipp.de/','Download-Tipp',''),
(163,'Internet Ninja x.0','Internet Ninja','http://www.dti.ne.jp/','Dream Train Internet',''),
(164,'Drecombot/1.0 (http://career.drecom.jp/bot.html)','Drecombot','http://career.drecom.jp/bot.html','Drecom Japan',''),
(165,'MJ12bot/vx.x.x (http://www.majestic12.co.uk/projects/dsearch/mj12bot.php)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''),
(166,'dtSearchSpider','DtSearchSpider','http://www.dtsearch.com/PLF_Spider.html','dtSearch',''),
(167,'Dumbot(version 0.1 beta)','Dumbot','http://www.dumbfind.com/','DumbFind.com',''),
(168,'Dumbot(version 0.1 beta - dumbfind.com)','Dumbot','http://www.dumbfind.com/','DumbFind.com',''),
(169,'Dumbot(version 0.1 beta - http://www.dumbfind.com/dumbot.html)','Dumbot','http://www.dumbfind.com/','DumbFind.com',''),
(170,'Kevin http://dznet.com/kevin/','Kevin','http://www.dznet.com/kevin/','Dznet.com',''),
(171,'EARTHCOM.info/1.x [www.earthcom.info]','Earthcom','http://earthcom.info/','Earthcom.info',''),
(172,'EARTHCOM.info/1.xbeta [www.earthcom.info]','Earthcom','http://earthcom.info/','Earthcom.info',''),
(173,'EchO!/2.0','Echo.fr','http://echo.fr/','Echo.fr',''),
(174,'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) TrueRobot; 1.5','Echo.com','http://www.echo.com/','Echo.com',''),
(175,'EgotoBot/4.8 (+http://www.egoto.com/about.htm)','Egotobot','http://www.egoto.com/about.htm','Egoto.com',''),
(176,'elfbot/1.0 (+http://www.uchoose.de/crawler/elfbot/)','Elfbot','http://www.uchoose.de/crawler/elfbot/','uCHOOSE',''),
(177,'LinkScan/x.x Unix','Elsop','http://www.elsop.com/','LinkScan',''),
(178,'LinkScan/9.0g Unix','Elsop','http://www.elsop.com/','LinkScan',''),
(179,'LinkScan/11.0beta2 Unix','Elsop','http://www.elsop.com/','LinkScan',''),
(180,'NextGenSearchBot 1 (for information visit http://www.eliyon.com/NextGenSearchBot)','NextGenSearchBot','http://about.zoominfo.com/PublicSite/NextGenSearchBot.asp','ZoomInfo',''),
(181,'Enfish Tracker','Enfish Tracker','http://www.enfish.com/','Enfish',''),
(182,'Enterprise_Search/1.0','Enterprise Search','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(183,'Enterprise_Search/1.0.xxx','Enterprise Search','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(184,'ES.NET_Crawler/2.0 (http://search.innerprise.net/)','Enterprise Search','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(185,'Enterprise_Search/1.00.xxx;MSSQL (http://www.innerprise.net/es-spider.asp)','Enterprise Search','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(186,'Search/1.0 (http://www.innerprise.net/es-spider.asp)','Enterprise Search','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(187,'Mozilla/4.0 (compatible; SpeedySpider; www.entireweb.com)','Entireweb','http://www.entireweb.com/','Entireweb',''),
(188,'WorldLight','Entireweb','http://www.entireweb.com/','Entireweb',''),
(189,'Speedy Spider (Beta/x.x; speedy@entireweb.com)','Entireweb','http://www.entireweb.com/','Entireweb',''),
(190,'Speedy_Spider (http://www.entireweb.com)','Entireweb','http://www.entireweb.com/','Entireweb',''),
(191,'envolk[ITS]spider/1.6(+http://www.envolk.com/envolkspider.html)','Envolkspider','http://www.envolk.com/envolkspider.html','Envolk',''),
(192,'versus crawler eda.baykan@epfl.ch','Versus Crawler','http://www.epfl.ch/Eindex.html','Ecole Polytechnique F�d�rale de Lausanne',''),
(193,'EroCrawler','EroCrawler','http://www.erocrawler.com/','EroCrawler',''),
(194,'Arachnoidea (arachnoidea@euroseek.com)','Arachnoidea','http://www.euroseek.com/','Euroseek',''),
(195,'ESISmartSpider','ESISmartSpider','http://www.smart-spider.com/','smart-spider.com',''),
(196,'eStyleSearch 4 (compatible; MSIE 6.0; Windows NT 5.0)','E-StyleISP','http://www.e-styleisp.ru/','e-StyleISP',''),
(197,'EuripBot/0.2 (+http://www.eurip.com) GetRobots','EuripBot','http://www.eurip.com/','Eurip.com',''),
(198,'EuripBot/0.4 (+http://www.eurip.com) GetFile','EuripBot','http://www.eurip.com/','Eurip.com',''),
(199,'EuripBot/0.4 (+http://www.eurip.com) PreCheck','EuripBot','http://www.eurip.com/','Eurip.com',''),
(200,'Mozilla/3.0 (compatible; MuscatFerret/1.5.4; claude@euroferret.com)','MuscatFerret','http://www.euroferret.com/','Euro Ferret',''),
(201,'Mozilla/3.0 (compatible; MuscatFerret/1.5; olly@muscat.co.uk)','MuscatFerret','http://www.euroferret.com/','Euro Ferret',''),
(202,'Mozilla/3.0 (compatible; MuscatFerret/1.6.x; claude@euroferret.com)','MuscatFerret','http://www.euroferret.com/','Euro Ferret',''),
(203,'eventax/1.3 (eventax; http://www.eventax.de/; info@eventax.de)','Eventax','http://www.eventax.de/','Eventax',''),
(204,'Exalead NG/MimeLive Client (convert/http/0.120)','Exabot','http://www.exalead.com/search','Exalead',''),
(205,'Mozilla/5.0 (compatible; Konqueror/3.2; Linux) (KHTML, like Gecko)','Exabot','http://www.exalead.com/search','Exalead',''),
(206,'NG/2.0','Exabot','http://www.exalead.com/search','Exalead',''),
(207,'eseek-larbin_2.6.2 (crawler@exactseek.com)','ExactSEEK','http://www.exactseek.com/','ExactSEEK',''),
(208,'ExactSeek Crawler/0.1','ExactSEEK','http://www.exactseek.com/','ExactSEEK',''),
(209,'exactseek-crawler-2.63 (crawler@exactseek.com)','ExactSEEK','http://www.exactseek.com/','ExactSEEK',''),
(210,'exactseek-pagereaper-2.63 (crawler@exactseek.com)','ExactSEEK','http://www.exactseek.com/','ExactSEEK',''),
(211,'Excalibur Internet Spider V6.5.4','Excalibur','http://www.convera.com/Products/','Convera',''),
(212,'ArchitextSpider','ArchitextSpider','http://www.excite.com/','Excite',''),
(213,'PycURL','Fast Search','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(214,'FAST-WebCrawler/3.7/FirstPage (atw-crawler at fast dot no;http://fast.no/support/crawler.asp)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(215,'FAST-WebCrawler/2.1.pre.2000-04-14.1 (ashen@looksmart.net)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(216,'FAST-WebCrawler/2.1-pre2 (ashen@looksmart.net)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(217,'FAST-WebCrawler/2.1.prealpha.2000-04-07.1 (ashen@looksmart.net)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(218,'fastlwspider/1.0','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(219,'FAST-WebCrawler/2.1.pre.2000-04-18.1 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(220,'FAST-WebCrawler/2.0.9 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(221,'FAST-SoccerCrawler/2.2-pre-cvs (oyvinda@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(222,'FAST-WebCrawler/2.0.10 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(223,'FAST-WebCrawler/2.1-pre4 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(224,'FAST-WebCrawler/2.1-pre5 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(225,'FAST-WebCrawler/2.1-pre6 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(226,'FAST-WebCrawler/2.1-pre7 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(227,'FAST-WebCrawler/2.2-pre1 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(228,'FAST-WebCrawler/2.2-pre2 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(229,'FAST-WebCrawler/2.2-pre3 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(230,'FAST-WebCrawler/2.2-pre4 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(231,'FAST-WebCrawler/2.2-pre5 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(232,'FAST-WebCrawler/2.2-pre8 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(233,'FAST-WebCrawler/2.2-pre9 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(234,'FAST-WebCrawler/2.1-pre11 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(235,'FAST-WebCrawler/2.1-pre12 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(236,'FAST-WebCrawler/2.1-pre13 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(237,'FAST-WebCrawler/2.1-pre14 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(238,'FAST-WebCrawler/2.1-pre10 (crawler@fast.no; http://www.fast.no/faq/faqfastwebsearch/faqfastwebcrawler.html)','FAST-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(239,'Faxobot/1.0','FaXobot','http://www.faxo.com/','Faxo',''),
(240,'Mozilla/4.0 (compatible; FDSE robot)','FDSE','http://www.abadoor.de/','Abadoor',''),
(241,'http://wortschatz.uni-leipzig.de/findlinks/','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),
(242,'findlinks/0.901 (+http://wortschatz.uni-leipzig.de/findlinks/)','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),
(243,'FineBot','FineBot','http://www.finesearch.com/','Finesearch',''),
(244,'RoboPal (http://www.findpal.com/)','RoboPal','http://www.findpal.com/','FindPal',''),
(245,'Firefly/1.0','Firefly','http://www.fireball.de/','Fireball',''),
(246,'Firefly/1.0 (compatible; Mozilla 4.0; MSIE 5.5)','Firefly','http://www.fireball.de/','Fireball',''),
(247,'FirstGov.gov Search - POC:firstgov.webmasters@gsa.gov','FirstGov','http://www.firstgov.gov/','U.S.Government',''),
(248,'firstsbot','Firstsbot','http://www.firstsfind.de/','Firstsfind',''),
(249,'FyberSpider (+http://www.fybersearch.com/fyberspider.php)','FyberSpider','http://www.fybersearch.com/fyberspider.php','FyberSearch',''),
(250,'Gaisbot/3.0+(robot@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)','Gaisbot','http://gais.cs.ccu.edu.tw/robot.php','Gais',''),
(251,'Gaisbot/3.0+(indexer@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)','Gaisbot','http://gais.cs.ccu.edu.tw/robot.php','Gais',''),
(252,'GalaxyBot/1.0 (http://www.galaxy.com/galaxybot.html)','GalaxyBot','http://www.galaxy.com/galaxybot.html','Galaxy',''),
(253,'Mozilla/4.0 (compatible; MSIE 5.0; www.galaxy.com/galaxybot.html)','GalaxyBot','http://www.galaxy.com/galaxybot.html','Galaxy',''),
(254,'Mozilla/4.0 (compatible; www.galaxy.com)','GalaxyBot','http://www.galaxy.com/galaxybot.html','Galaxy',''),
(255,'GammaSpider/1.0','GammaSpider','http://www.gammasite.com','Gammasite',''),
(256,'geniebot wgao@genieknows.com','GenieKnows','http://www.genieknows.com/','GenieKnows',''),
(257,'larbin_2.6.2 (listonATccDOTgatechDOTedu)','Georgia Institute of Technology','http://www.gatech.edu/','Georgia Institute of Technology',''),
(258,'GeonaBot 1.x; http://www.geona.com/','GeonaBot','http://www.geona.com/','Geona',''),
(259,'larbin_2.6.3 (wgao@genieknows.com)','GenieKnows','http://www.genieknows.com/','GenieKnows',''),
(260,'Mozilla/5.0 wgao@genieknows.com','GenieKnows','http://www.genieknows.com/','GenieKnows',''),
(261,'Mozilla/5.0 (wgao@genieknows.com)','GenieKnows','http://www.genieknows.com/','GenieKnows',''),
(262,'Gigabot/2.0','Gigabot','http://www.gigablast.com/','Gigablast',''),
(263,'gigabaz/3.1x (baz@gigabaz.com; http://gigabaz.com/gigabaz/)','GigaBaz Brainbot','http://gigabaz.com/gigabaz/','Gigabaz',''),
(264,'MicroBaz','GigaBaz Brainbot','http://gigabaz.com/gigabaz/','Gigabaz',''),
(265,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 4.0; Girafabot; girafabot at girafa dot com; http://www.girafa.com)','Girafabot','http://www.girafa.com','Girafa',''),
(266,'Look.com','GlobalQueue','http://www.multi-mode.com/','Multi-mode',''),
(267,'Ocelli/1.x (http://www.globalspec.com/Ocelli)','Ocelli','http://www.globalspec.com/Ocelli','GlobalSpec',''),
(268,'GNODSPIDER (www.gnod.net)','GnodSpider','www.gnod.net','Gnod',''),
(269,'Goblin/0.9 (http://www.goguides.org/)','Goblin','http://www.goguides.org/','GoGuides',''),
(270,'Goblin/0.9.x (http://www.goguides.org/goblin-info.html)','Goblin','http://www.goguides.org/','GoGuides',''),
(271,'GoForIt.com','GoForIt','http://www.goforit.com/','GoForIt',''),
(272,'GOFORITBOT ( http://www.goforit.com/about/ )','GoForIt','http://www.goforit.com/','GoForIt',''),
(273,'ichiro/1.0 (ichiro@nttr.co.jp)','Ichiro','http://www.goo.ne.jp/','Goo',''),
(274,'moget/x.x (moget@goo.ne.jp)','Moget','http://www.goo.ne.jp/','Goo',''),
(275,'mogimogi/1.0','Mogimogi','http://www.goo.ne.jp/','Goo',''),
(276,'Mozilla/3.0 (Slurp.so/Goo; slurp@inktomi.com; http://www.inktomi.com/slurp.html)','Goo (Japan)','http://www.goo.ne.jp/','Goo',''),
(277,'Mediapartners-Google/2.1','Google-Adsense','http://www.google.com/webmasters/bot.html','Google',''),
(278,'Googlebot/2.1 (+http://www.googlebot.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(279,'Googlebot/2.1 (+http://www.google.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(280,'Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(281,'Googlebot/1.0 (googlebot@googlebot.com http://googlebot.com/)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(282,'Googlebot/2.0 beta (googlebot@googlebot.com)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(283,'Googlebot/2.0 (+http://googlebot.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(284,'Googlebot/1.0 (googlebot@googlebot.com)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(285,'Googlebot/2.1w (+http://googlebot.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(286,'Googlebot-w/2.1 (+http://googlebot.com/bot.html)','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(287,'Googlebot/1.0','GoogleBot','http://www.google.com/webmasters/bot.html','Google',''),
(288,'Googlebot-Image/1.0','Google-Image','http://www.google.com/webmasters/bot.html','Google',''),
(289,'Google WAP Proxy/1.0','Google-WAP','http://www.google.com/webmasters/bot.html','Google',''),
(290,'Nokia-WAPToolkit/1.2 googlebot(at)googlebot.com','Google-WAP','http://www.google.com/webmasters/bot.html','Google',''),
(291,'GrigorBot 0.8 (http://www.grigor.biz/bot.html)','GrigorBot','http://www.grigor.biz/bot.html','Grigor',''),
(292,'Mozilla/4.0 (compatible; grub-client-1.4.3; Crawl your own stuff with http://grub.org)','Grub-client','http://grub.looksmart.com/','Grub',''),
(293,'Harvest-NG/1.0.2','Harvest-NG','http://webharvest.sourceforge.net/ng/','Harvest-NG',''),
(294,'Hatena Antenna/0.4 (http://a.hatena.ne.jp/help#robot)','Hatena Antenna','http://hatenaantenna.g.hatena.ne.jp/#robot','Hatena Antenna',''),
(295,'Helix/1.x (+http://www.sitesearch.ca/helix/)','Helix','http://www.sitesearch.ca/helix/','SiteSearch',''),
(296,'Hitwise Spider v1.0 http://www.hitwise.com','Hitwise Spider','http://www.hitwise.com','Hitwise',''),
(297,'archive.org_bot','Heritrix','http://www.cs.washington.edu/research/networking/websys/','University of Washington',''),
(298,'mozilla/5.0 (compatible; heritrix/1.3.0 +http://archive.crawler.org)','Heritrix','http://www.cs.washington.edu/research/networking/websys/','University of Washington',''),
(299,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; heritrix/1.3.0 +http://www.cs.washington.edu/research/networking/websys/)','Heritrix','http://www.cs.washington.edu/research/networking/websys/','University of Washington',''),
(300,'HomePageSearch(hpsearch.uni-trier.de)','HomePageSearch','http://hpsearch.uni-trier.de/','HomePageSearch',''),
(301,'Homerbot: www.homerweb.com','Homerbot','http://www.homerweb.com/','Homerweb',''),
(302,'HooWWWer/2.1.0 (+http://cosco.hiit.fi/search/hoowwwer/ | mailto:crawler-info<at>hiit.fi)','Hoowwwer','http://cosco.hiit.fi/search/hoowwwer/','NGIR',''),
(303,'Toutatis x.x-x','Toutatis','http://hoppa.com/','Hoppa',''),
(304,'Toutatis x.x (hoppa.com)','Toutatis','http://hoppa.com/','Hoppa',''),
(305,'Toutatis x-xx.x (hoppa.com)','Toutatis','http://hoppa.com/','Hoppa',''),
(306,'htdig/3.1.x (root@localhost)','Htdig','http://www.htdig.org/','ht:/dig',''),
(307,'ParaSite/1.0b (http://www.ianett.com/parasite/)','ParaSite','http://www.ianett.com/parasite/','Ianett',''),
(308,'BlogzIce/1.0 (+http://icerocket.com; rhodes@icerocket.com)','BlogzIce','http://icerocket.com','IceRocket',''),
(309,'BlogzIce/1.0 +http://www.icerocket.com/','BlogzIce','http://icerocket.com','IceRocket',''),
(310,'ichiro/1.0 (ichiro@nttr.co.jp)','Ichiro','http://www.goo.ne.jp/','Goo',''),
(311,'IconSurf/2.0 favicon finder (see http://iconsurf.com/robot.html)','IconSurf','http://iconsurf.com/robot.html','IconSurf',''),
(312,'IconSurf/2.0 favicon monitor (see http://iconsurf.com/robot.html)','IconSurf','http://iconsurf.com/robot.html','IconSurf',''),
(313,'ICRA_label_spider/x.0','ICRA_Label_spider','http://www.icra.org/','Icra',''),
(314,'Pompos/1.x pompos@iliad.fr','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(315,'Pompos/1.x http://dir.com/pompos.html','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(316,'IncyWincy(http://www.loopimprovements.com/robot.html)','IncyWincy','http://www.loopimprovements.com/robot.html','LoopImprovements',''),
(317,'IncyWincy/2.1(loopimprovements.com/robot.html)','IncyWincy','http://www.loopimprovements.com/robot.html','LoopImprovements',''),
(318,'IncyWincy data gatherer(webmaster@loopimprovements.com,http://www.loopimprovements.com/robot.html)','IncyWincy','http://www.loopimprovements.com/robot.html','LoopImprovements',''),
(319,'IncyWincy page crawler(webmaster@loopimprovements.com,http://www.loopimprovements.com/robot.html)','IncyWincy','http://www.loopimprovements.com/robot.html','LoopImprovements',''),
(320,'NetResearchServer/x.x(loopimprovements.com/robot.html)','IncyWincy','http://www.loopimprovements.com/robot.html','LoopImprovements',''),
(321,'IndexTheWeb.com Crawler7','IndexTheWeb','http://www.indextheweb.com','IndexTheWeb',''),
(322,'Mozilla/4.0 (compatible; MSIE 4.0; Windows NT; Site Server 3.0 Robot) Indonesia Interactive','Indonesia Interactive','http://www.i-2.co.id/','Indonesia Interactive',''),
(323,'InelaBot/0.2 (+http://inelegant.org/bot)','InelaBot','http://inelegant.org/bot','Inelegant',''),
(324,'Inet library','Inet Library','http://www.inetlibrary.com/','Inet Library',''),
(325,'icsbot-0.1','Icsbot','http://icseoul.org/','International Christian school of Seoul',''),
(326,'IlTrovatore-Setaccio/1.2 (It-bot;compatible;MSIE 6.0;Mozilla/4.0; http://www.iltrovatore.it/bot.html; bot@iltrovatore.it)','It-bot','http://www.iltrovatore.it/','IlTrovatore',''),
(327,'URL Spider Pro/x.xx (innerprise.net)','URL_Spider_Pro','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(328,'URL_Spider_Pro/x.x','URL_Spider_Pro','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(329,'URL_Spider_Pro/x.x+(http://www.innerprise.net/usp-spider.asp)','URL_Spider_Pro','http://www.innerprise.net/es-bi.asp','Innerprise',''),
(330,'DataFountains/DMOZ Downloader','DataFountains','http://infomine.ucr.edu/','University of California',''),
(331,'InfoSeek Sidewinder/0.9','Infoseek','http://go.com/','Go',''),
(332,'Ultraseek','Ultraseek','http://go.com/','Go',''),
(333,'Mozilla/3.0 (Slurp/cat; slurp@inktomi.com; http://www.inktomi.com/slurp.html)','Slurp Inktomi','http://help.yahoo.com/help/us/ysearch/slurp/index.html','Hotbot-Lycos,NBCi etc.',''),
(334,'Mozilla/3.0 (Slurp/si; slurp@inktomi.com; http://www.inktomi.com/slurp.html)','Slurp Inktomi','http://help.yahoo.com/help/us/ysearch/slurp/index.html','Hotbot-Lycos,NBCi etc.',''),
(335,'Mozilla/5.0 (Slurp/cat; slurp@inktomi.com; http://www.inktomi.com/slurp.html)','Slurp Inktomi','http://help.yahoo.com/help/us/ysearch/slurp/index.html','Hotbot-Lycos,NBCi etc.',''),
(336,'Mozilla/5.0 (Slurp/si; slurp@inktomi.com; http://www.inktomi.com/slurp.html)','Slurp Inktomi','http://help.yahoo.com/help/us/ysearch/slurp/index.html','Hotbot-Lycos,NBCi etc.',''),
(337,'larbin_2.2.1_de_Viennot (Laurent.Viennot@inria.fr)','Inria','http://www.inria.fr/','Inria',''),
(338,'larbin_2.2.2_guillaume (guillaume@liafa.jussieu.fr)','Liafa','http://www.liafa.jussieu.fr/','Liafa',''),
(339,'InternetSeer.com','Internetseer','http://www.internetseer.com','Internetseer',''),
(340,'ramBot xtreme x.x','Rambot','http://www.intersearch.de','Intersearch',''),
(341,'Mozilla/3.0 (compatible; Webinator-DEV01.home.iprospect.com/2.56)','Iprospect','http://www.iprospect.com/','Iprospect',''),
(342,'IpselonBot/0.xx-beta (Ipselon; http://www.ipselon.com; ipselonbot@ipselon.com)','IpselonBot','http://www.ipselon.com','Ipselon',''),
(343,'IRLbot/1.0 (+http://irl.cs.tamu.edu/crawler)','IRLbot','http://irl.cs.tamu.edu/crawler','Texas A&M University',''),
(344,'Mozilla/3.0 (Vagabondo/2.0 MT; webcrawler@NOSPAMexperimental.net; http://aanmelden.ilse.nl/?aanmeld_mode=webhints)','Ilse','http://aanmelden.ilse.nl/?aanmeld_mode=webhints','Ilse',''),
(345,'Mozilla/3.0 (INGRID/3.0 MT; webcrawler@NOSPAMexperimental.net; http://aanmelden.ilse.nl/?aanmeld_mode=webhints)','Ilse','http://aanmelden.ilse.nl/?aanmeld_mode=webhints','Ilse',''),
(346,'ideare - SignSite/1.x','Ideare','http://www.ideare.com/','Ideare',''),
(347,'Jayde Crawler. http://www.jayde.com','Jayde Crawler','http://www.jayde.com','Jayde',''),
(348,'Jetbot/1.0','Jetbot','http://www.jeteye.com/','JetEye',''),
(349,'A-Online Search','A-Online','http://www.aon.at/portal','Aon',''),
(350,'Jyxobot/x','Jyxobot','http://jyxo.cz/','Jyxo',''),
(351,'k2spider','K2 Spider','http://www.verity.com','Verity',''),
(352,'Kenjin Spider','Kenjin Spider','http://www.kenjin.ne.jp/','Kenjin',''),
(353,'EasyDL/3.xx','EasyDL','http://keywen.com/Encyclopedia/Bot/','Keywen',''),
(354,'EasyDL/3.xx http://keywen.com/Encyclopedia/Bot','EasyDL','http://keywen.com/Encyclopedia/Bot/','Keywen',''),
(355,'Knowledge.com/0.x','Knowledge.com','http://www.knowledge.com/','knowledge.com',''),
(356,'Mariner/5.1b [de] (Win95; I ;Kolibri gncwebbot)','Mariner','http://www.kolibri.de/','Kolibri',''),
(357,'libWeb/clsHTTP -- hiongun@kt.co.kr','LibWeb','http://www.kt.co.kr/kt_home/eng/index.jsp','Korea Telecom',''),
(358,'WISEbot/1.0 (WISEbot@koreawisenut.com; http://wisebot.koreawisenut.com)','WISEbot','http://wisebot.koreawisenut.com','Koreawisenut',''),
(359,'kulokobot www.kuloko.com kuloko@backweave.com','Kulokobot','http://www.kuloko.com/','Kuloko',''),
(360,'kuloko-bot/0.x','Kulokobot','http://www.kuloko.com/','Kuloko',''),
(361,'larbin_2.2.2 (sugayama@lab7.kuis.kyoto-u.ac.jp)','Ishida Lab','http://lab7.kuis.kyoto-u.ac.jp/','Kyoto University',''),
(362,'Mozilla/5.0 (compatible; heritrix/1.5.0 +http://www.l3s.de/~kohlschuetter/projects/crawling/)','Heritrix L3S','http://www.l3s.de/~kohlschuetter/projects/crawling/','L3S Research Center',''),
(363,'IPiumBot laurion(dot)com','IPiumBot','http://www.laurion.com/','Laurions',''),
(364,'larbin_2.6.2 (tom@lemurconsulting.com)','Lemur Consulting','http://www.lemurconsulting.com/Home.shtml','Lemur Consulting',''),
(365,'LexiBot/1.00','Lexibot','http://brightplanet.com/products/dqm_benefits.asp','BrightPlanet',''),
(366,'Mata Hari/2.00','Lexibot','http://brightplanet.com/products/dqm_benefits.asp','BrightPlanet',''),
(367,'LNSpiderguy','LNSpiderguy','http://www.lexisnexis.com/','Lexis-Nexis',''),
(368,'LECodeChecker/3.0 libgetdoc/1.0','LECodeChecker','http://www.linkexchange.com/','Linkexchange',''),
(369,'AgentName/0.1 libwww-perl/5.48','AgentName','http://www.linkomatic.com/','Linkomatic',''),
(370,'linknzbot','Linknzbot','http://www.linknz.co.nz/','LinkNZ',''),
(371,'Mozilla/3.01 (Compatible; Links2Go Similarity Engine)','Links2Go','http://www.links2go.com/','Links2Go',''),
(372,'Lockstep Spider/1.0','Lockstep Spider','http://www.lockstep.com/','Lockstep',''),
(373,'IncyWincy(http://www.look.com)','IncyWincy (Look)','http://www.look.com','Look',''),
(374,'NetResearchServer(http://www.look.com)','Look.com','http://www.look.com','Look',''),
(375,'Seeker.lookseek.com','Seeker.lookseek','http://www.lookseek.com/','Lookseek',''),
(376,'MantraAgent','MantraAgent','http://www.looksmart.com/','LookSmart',''),
(377,'Martini','Martini','http://www.looksmart.com/','LookSmart',''),
(378,'MARTINI','Martini','http://www.looksmart.com/','LookSmart',''),
(379,'Mozilla/4.0 (compatible; Zealbot 1.0)','Zealbot','http://www.looksmart.com/','LookSmart',''),
(380,'ZyBorg','ZyBorg (LookSmart)','http://www.looksmart.com/','LookSmart',''),
(381,'luchs.at URL checker','Luchs.at URL checker','http://web.luchs.at/','Luchs',''),
(382,'Lycos_Spider_(T-Rex)','Lycos_Spider','http://www.lycos.com/','Lycos',''),
(383,'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98;Lycos_Spider_(T-Rex) ; Lycos_Spider_(T-Rex) )','Lycos_Spider','http://www.lycos.com/','Lycos',''),
(384,'Mozilla/4.0 (compatible; MSIE 5.0; Windows 98;Lycos_Spider_Beta2(T-Rex) ; Lycos_Spider_Beta2(T-Rex) )','Lycos_Spider','http://www.lycos.com/','Lycos',''),
(385,'LinkWalker','LinkWalker','http://www.seventwentyfour.com/','Seven TwentyFour',''),
(386,'lmspider (lmspider@scansoft.com)','Lmspider','http://www.nuance.com/','Nuance',''),
(387,'Marvin v0.3','Marvin','http://www.hon.ch/MedHunt/Marvin.html','Health On the Net Fondation',''),
(388,'MasterSeek','Masterseek','http://www.masterseek.com/','Masterseek',''),
(389,'Spider/maxbot.com admin@maxbot.com','Maxbot','http://www.maxbot.com/','Maxbot',''),
(390,'maxomobot/dev-20051201 (maxomo; http://67.102.134.34:4047/MAXOMO/MAXOMObot.html; maxomobot@maxomo.com)','Maxomobot','http://www.maxomo.com/','Maxomo',''),
(391,'Mercator-1.x','Mercator','http://www.research.compaq.com/SRC/mercator/','Altavista',''),
(392,'Mercator-2.0','Mercator','http://www.research.compaq.com/SRC/mercator/','Altavista',''),
(393,'Mercator-Scrub-1.1','Mercator','http://www.research.compaq.com/SRC/mercator/','Altavista',''),
(394,'MetaGer-LinkChecker','Metager-Linkchecker','http://www.metager.de/','Metager',''),
(395,'Metaspinner/0.01 (Metaspinner; http://www.meta-spinner.de/; support@meta-spinner.de/)','Metaspinner','http://index.meta-spinner.de/','Metaspinner',''),
(396,'MediaCrawler-1.0 (Experimental)','MediaCrawler','http://www.mediacrawler.de','Media Find',''),
(397,'libwww/5.3.2','Mediater Rechercher','http://www.mediater.net/','Mediater',''),
(398,'larbin_2.1.1 larbin2.1.1@somewhere.com','Merl.com','http://www.merl.com/','Mitsubishi Electrical Research Lab',''),
(399,'Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0) (samualt9@bigfoot.com)','Metacarta','http://www.metacarta.com/','Metacarta',''),
(400,'HenryTheMiragoRobot (http://www.miragorobot.com/scripts/mrinfo.asp)','HenryTheMiragoRobot','http://www.miragorobot.com/scripts/mrinfo.asp','Mirago',''),
(401,'Miva (AlgoFeedback@miva.com)','Miva','http://www.miva.com','Miva',''),
(402,'Felix - Mixcat Crawler (+http://mixcat.com)','Felix','http://mixcat.com/','MixCat',''),
(403,'Morris - Mixcat Crawler (+http://mixcat.com)','Morris','http://mixcat.com/','MixCat',''),
(404,'MojeekBot/0.x (archi; http://www.mojeek.com/bot.html)','MojeekBot','http://www.mojeek.com/bot.html','Mojeek',''),
(405,'holmes/x.x','Holmes','http://morfeo.centrum.cz/','Morfeo / Centrum',''),
(406,'Mozdex/0.06-dev (Mozdex; http://www.mozdex.com/bot.html; spider@mozdex.com)','Mozdex','http://www.mozdex.com/bot.html','MozDex',''),
(407,'mozDex/0.04-dev (mozDex; http://www.mozdex.com/en/bot.html; spider@mozdex.com)','MozDex','http://www.mozdex.com/bot.html','MozDex',''),
(408,'MnogoSearch/3.2.xx','MnoGoSearch','http://mnogosearch.org/','MnoGoSearch',''),
(409,'msnbot/1.0 (+http://search.msn.com/msnbot.htm)','MSN Bot','http://search.msn.com/msnbot.htm','MSN',''),
(410,'Mylinea.com Crawler 2.0','Mylinea','http://fr.mylinea.com/','Mylinea',''),
(411,'Mozilla/5.0 (compatible; InterseekWeb/3.x)','Najdi','http://www.najdi.si/pomoc/eng/index.jsp','Najdi',''),
(412,'NP/0.1 (NP; http://www.nameprotect.com; npbot@nameprotect.com)','Nameprotect','http://www.nameprotect.com','Nameprotect',''),
(413,'NPBot (http://www.nameprotect.com/botinfo.html)','Nameprotect','http://www.nameprotect.com','Nameprotect',''),
(414,'NPBot-1/2.0','Nameprotect','http://www.nameprotect.com','Nameprotect',''),
(415,'kulturarw3/0.1','Kulturarw','http://www.kb.se/ENG/kbstart.htm','National Library of Sweden',''),
(416,'Cowbot-0.1 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)','Cowbot','http://www.naver.co.jp/','Naver',''),
(417,'Cowbot-0.1.x (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)','Cowbot','http://www.naver.co.jp/','Naver',''),
(418,'dloader(NaverRobot)/1.0','NaverBot','http://www.naver.co.jp/','Naver',''),
(419,'NaverBot_dloader/1.5','NaverBot','http://www.naver.co.jp/','Naver',''),
(420,'NaverBot-1.0 (NHN Corp. / +82-2-3011-1954 / nhnbot@naver.com)','NaverBot','http://www.naver.co.jp/','Naver',''),
(421,'nabot_1.0','Nabot','http://www.naver.co.jp/','Naver',''),
(422,'NABOT/5.0','Nabot','http://www.naver.co.jp/','Naver',''),
(423,'NationalDirectoryAddURL/1.0','Nationaldirectory','http://www.nationaldirectory.com/','Nationaldirectory',''),
(424,'NationalDirectory-WebSpider/1.3','Nationaldirectory','http://www.nationaldirectory.com/','Nationaldirectory',''),
(425,'larbin_2.6.2 (hamasaki@grad.nii.ac.jp)','NII','http://www.nii.ac.jp/','National Institut of Informatics (Japan)',''),
(426,'Francis/1.0 (francis@neomo.de http://www.neomo.de/)','Francis','http://www.neomo.de/','Neomo',''),
(427,'Mozilla/4.0 (compatible; MSIE 5.0; NetNose-Crawler 2.0; A New Search Experience: http://www.netnose.com)','NetNose','http://www.netnose.com/','NetNose',''),
(428,'Netprospector JavaCrawler','Netprospector','http://www.actaddons.com/products/netprospector.asp','Netprospector',''),
(429,'Robozilla/1.0','Netscape','http://www.dmoz.org/','DMOZ',''),
(430,'NextopiaBOT (+http://www.nextopia.com) distributed crawler client beta v0.x','NextopiaBot','http://www.nextopia.com','Nextopia',''),
(431,'NMG Spider/0.3 (szukanko.com)','NMG Spider','http://www.szukanko.com/','Szukanko',''),
(432,'Noago Spider','Noago Spider','http://www.noago.com/','Noago',''),
(433,'NokodoBot/1.x (+http://nokodo.com/bot.htm)','NokodoBot','http://nokodo.com/bot.htm','Nokodo',''),
(434,'Gulliver/1.3','Gulliver','http://www.northernlight.com/','Northernlight',''),
(435,'Gulliver/1.2','Gulliver','http://www.northernlight.com/','Northernlight',''),		
(436,'AVSearch-1.0(peter.turney@nrc.ca)','AVSearch','http://www.nrc-cnrc.gc.ca/main_e.html','National Research Council Canada',''),
(437,'gazz/x.x (gazz@nttrd.com)','Gaaz','http://www.infobee.ne.jp/','Infobee',''),
(438,'DoCoMo/1.0/Nxxxi/c10','DoCoMo','http://www.nttdocomo.co.jp/','NTT DoCoMo',''),
(439,'DoCoMo/1.0/Nxxxi/c10/TB','DoCoMo','http://www.nttdocomo.co.jp/','NTT DoCoMo',''),
(440,'DoCoMo/2.0 P900iV(c100;TB;W24H11)','DoCoMo','http://www.nttdocomo.co.jp/','NTT DoCoMo',''),
(441,'NWSpider 0.9','NWSpider','http://www.nwspider.com/','NWSpider',''),
(442,'nttdirectory_robot/0.9 (super-robot@super.navi.ocn.ne.jp)','NTT Directory','http://navi.ocn.ne.jp/','NTT Directory',''),
(443,'nuSearch Spider <a href=http://www.nusearch.com>www.nusearch.com</a> (compatible; MSIE 4.01)','NuSearch Spider','http://www.nusearch.com','NuSearch',''),
(444,'Nutch','Nutch','http://lucene.apache.org/','Lucene',''),
(445,'NutchCVS/0.0x-dev (Nutch; http://www.nutch.org/docs/bot.html; nutch-agent@lists.sourceforge.net)','Nutch','http://lucene.apache.org/','Lucene',''),
(446,'NutchOrg/0.0x-dev (Nutch; http://www.nutch.org/docs/bot.html; nutch-agent@lists.sourceforge.net)','Nutch','http://lucene.apache.org/','Lucene',''),
(447,'NutchCVS/0.06-dev (Nutch; http://www.nutch.org/docs/en/bot.html; nutch-agent@lists.sourceforge.net)','Nutch','http://lucene.apache.org/','Lucene',''),
(448,'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; T312461) RPT-HTTPClient/0.3-3E','Object Sciences Corp','http://www.saic.com','SAIC',''),
(449,'ObjectsSearch/0.01-dev (ObjectsSearch;http://www.ObjectsSearch.com/bot.html; support@thesoftwareobjects.com)','Objects Search','http://www.saic.com','SAIC',''),
(450,'Ocelli/1.3 (http://www.globalspec.com/Ocelli)','Ocelli','http://www.globalspec.com/','GlobalSpec',''),
(451,'Mozilla/5.0 (compatible; OnetSzukaj/5.0; +http://szukaj.onet.pl)','OnetSzukaj','http://szukaj.onet.pl','Szukaj',''),
(452,'Jabot/7.x.x (http://odin.ingrid.org/)','Jabot','http://www.ingrid.org/','ODIN Directory',''),
(453,'Jabot/6.x (http://odin.ingrid.org/)','Jabot','http://www.ingrid.org/','ODIN Directory',''),
(454,'DigOut4U','OpenPortal4U','http://www.arisem.com','Arisem',''),
(455,'OpidooBOT (larbin2.6.3@unspecified.mail)','OpidooBot','http://www.opidoo.com/','Opidoo',''),
(456,'Orbiter/T-2.0 (+http://www.dailyorbit.com/bot.htm)','Orbiter','http://www.dailyorbit.com/bot.htm','DailyOrbit',''),
(457,'OmniExplorer_Bot/1.0x (+http://www.omni-explorer.com) Internet Categorizer','OmniExplorer','http://www.omni-explorer.com','OmniExplorer',''),
(458,'OmniExplorer_Bot/1.0x (+http://www.omni-explorer.com) Job Crawler','OmniExplorer','http://www.omni-explorer.com','OmniExplorer',''),
(459,'OmniExplorer_Bot/1.1x (+http://www.omni-explorer.com) Torrent Crawler','OmniExplorer','http://www.omni-explorer.com','OmniExplorer',''),
(460,'OmniExplorer_Bot/x.xx (+http://www.omni-explorer.com) WorldIndexer','OmniExplorer','http://www.omni-explorer.com','OmniExplorer',''),
(461,'Onet.pl SA, http://szukaj.onet.pl','OnetSzukaj','http://szukaj.onet.pl','Szukaj',''),
(462,'Openbot/3.0+(robot-response@openfind.com.tw;+http://www.openfind.com.tw/robot.html)','Openfind','http://www.openfind.com.tw/robot.html','Openfind',''),
(463,'Openfind data gatherer, Openbot/3.0+(robot-response@openfind.com.tw;+http://www.openfind.com.tw/robot.html)','Openfind','http://www.openfind.com.tw/robot.html','Openfind',''),
(464,'Openfind Robot/1.1A2','Openfind','http://www.openfind.com.tw/robot.html','Openfind',''),
(465,'OpenTextSiteCrawler/2.9.2','OpenTextSiteCrawler','http://www.opentext.net/','OpenText',''),
(466,'OpenWebSpider/x','OpenWebSpider','http://www.openwebspider.org/','OpenWebSpider',''),
(467,'Oracle Ultra Search','Oracle','http://www.oracle.com/index.html','Oracle',''),
(468,'Overture-WebCrawler/3.8/Fresh (atw-crawler at fast dot no; http://fast.no/support/crawler.asp)','Overture-WebCrawler','http://fast.no/us/products/fast_web_search/crawler_faq','FAST',''),
(469,'Mozilla/5.0 (compatible; heritrix/1.5.0-200506231921 +http://pandora.nla.gov.au/crawl.html)','Pandora','http://pandora.nla.gov.au/crawl.html','National Library of Australia',''),
(470,'Patwebbot (http://www.herz-power.de/technik.html)','Patwebbot','http://www.herz-power.de/technik.html','Patsearch',''),
(471,'PEERbot www.peerbot.com','Peerbot','http://www.peerbot.com/','Peerbot',''),
(472,'PicoSearch/1.0','PicoSearch','http://www.picosearch.com/','Pico Search',''),
(473,'psbot/0.1 (+http://www.picsearch.com/bot.html)','Psbot','http://www.picsearch.com/bot.html','Picsearch',''),
(474,'pipeLiner/0.xx (PipeLine Spider; http://www.pipeline-search.com/webmaster.html)','PipeLiner','http://www.pipeline-search.com/webmaster.html','Pipeline',''),
(475,'Pita','Pita','http://www-diglib.stanford.edu/~testbed/doc2/WebBase/webbase-pages.html','Stanford University',''),
(476,'Popdexter/1.0','Popdexter','http://www.popdex.com/','Popdex',''),
(477,'Robot/www.pj-search.com','PopJapanSearch','http://www.pj-search.com/','PopJapanSearch',''),
(478,'PJspider/3.0 (pjspider@portaljuice.com; http://www.portaljuice.com)','PJspider','http://www.portaljuice.com/','Nextopia',''),
(479,'polybot 1.0 (http://cis.poly.edu/polybot/)','Polybot','http://cis.poly.edu/polybot/','Polytechnic University Brooklyn',''),
(480,'DeepIndexer.ca','DeepIndexer','http://www.deepindex.com/utiliser.html','Deepindex',''),
(481,'Marketwave Hit List','Pilot Hitlist','http://www.pilotsoftware.com/hitlist/','Pilot Hitlist',''),
(482,'CrawlerBoy Pinpoint.com','CrawlerBoy','http://www.motricity.com/','Motricity',''),
(483,'Mozilla/5.0 (compatible; pogodak.ba/3.x)','Pogodak','http://www.pogodak.hr/','Pogodak',''),
(484,'Pompos','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(485,'PROBE! (Probert Encyclopaedia Research Robot V1.0 http://www.probertencyclopaedia.com)','Probe!','http://www.probertencyclopaedia.com/','Probert Encyclopaedia',''),
(486,'ProWebGuide Link Checker (http://www.prowebguide.com)','ProWebguide','http://www.prowebguide.com/','ProWebguide',''),
(487,'CoolBot','CoolBot','http://www.suchmaschine21.de/','SuchMaschine21',''),
(488,'Rotondo/3.1 libwww/5.3.1','Rotondo','http://www.qualigo.de/doks/search/source/std/start_search.php','QualiGo',''),
(489,'QPCreep Test Rig ( We are not indexing, just testing )','QPCreep','http://www.quepasa.com/','Quepasa',''),
(490,'QuepasaCreep ( crawler@quepasacorp.com )','QuepasaCreep','http://www.quepasa.com/','Quepasa',''),
(491,'QuepasaCreep v0.9.1x','QuepasaCreep','http://www.quepasa.com/','Quepasa',''),
(492,'QueryN Metasearch','QueryN Metasearch','http://www.queryn.com/queryn/','QueryN',''),
(493,'ScanWeb','ScanWeb','http://eserver.host.sk/','Eserver',''),
(494,'Web Snooper','RankMeter','http://www.searchutilities.com/','SearchUtilities',''),
(495,'Rational SiteCheck (Windows NT)','Rational SiteCheck','http://www.rational.com.ar','GSInnova',''),
(496,'StackRambler/x.x','StackRambler','http://www.rambler.ru/','Rambler',''),
(497,'Reaper [2.03.10-031204] (http://www.sitesearch.ca/reaper/)','Reaper','http://marty.anstey.ca/projects/robots/reaper.html','Marty Anstey',''),
(498,'Reaper/2.0x (+http://www.sitesearch.ca/reaper)','Reaper','http://marty.anstey.ca/projects/robots/reaper.html','Marty Anstey',''),
(499,'Scrubby/2.x (http://www.scrubtheweb.com/)','Scrubby','http://www.scrubtheweb.com/','Scrub the web',''),
(500,'( Robots.txt Validator http://www.searchengineworld.com/cgi-bin/robotcheck.cgi )','SearchEngineWorlds','http://www.searchengineworld.com/','SearchEngineWorlds',''),
(501,'lwp-trivial/1.34','Search4free','http://www.search4free.com/','Search4free',''),
(502,'Mozilla/3.0 (compatible; Fluffy the spider; http://www.searchhippo.com/; info@searchhippo.com)','Fluffy the spider','http://www.searchhippo.com/','Searchhippo',''),
(503,'ClariaBot/1.0','SearchScout','http://www.searchscout.com/','SearchScout',''),
(504,'Diamond/1.0','SearchScout','http://www.searchscout.com/','SearchScout',''),
(505,'DiamondBot','SearchScout','http://www.searchscout.com/','SearchScout',''),
(506,'MegaSheep v1.0 (www.searchuk.com internet sheep)','MegaSheep','http://www.searchuk.com/','Search UK',''),
(507,'search.ch V1.4','Search.ch','http://www.search.ch/','Search CH',''),
(508,'search.ch V1.4.2 (spiderman@search.ch; http://www.search.ch)','Search.ch','http://www.search.ch/','Search CH',''),
(509,'SearchByUsa/2 (SearchByUsa; http://www.SearchByUsa.com/bot.html; info@SearchByUsa.com)','SearchByUsa','http://www.searchbyusa.com/','Search4USA',''),
(510,'SearchExpress Spider0.99','SearchExpress Spider','http://www.searchexpress.com/','SearchExpress',''),
(511,'SearchGuild_DMOZ_Experiment (chris@searchguild.com)','Searchguild','http://searchguild.com/','SearchGuild',''),
(512,'Spider-Sleek/2.0 (+http://search-info.com/linktous.html)','Search-Info','http://search-info.com/','Search-Info',''),
(513,'Searchit-Now Robot/2.2 (+http://www.searchit-now.co.uk)','Searchit-Now Robot','http://www.searchit-now.co.uk','Searchit-Now',''),
(514,'SearchSpider.com/1.1','SearchSpider','http://www.searchspider.com/','SearchSpider',''),
(515,'Searchspider/1.2 (SearchSpider; http://www.searchspider.com; webmaster@searchspider.com)','SearchSpider','http://www.searchspider.com/','SearchSpider',''),
(516,'Seekbot/1.0 (http://www.seekbot.net/bot.html) HTTPFetcher/0.3','Seekbot','http://www.seekbot.net/bot.html','SeekPort',''),
(517,'Seekbot/1.0 (http://www.seekbot.net/bot.html) RobotsTxtFetcher/1.0 (XDF)','Seekbot','http://www.seekbot.net/bot.html','SeekPort',''),
(518,'Seekbot/1.0 (http://www.seekbot.net/bot.html) RobotsTxtFetcher/1.2','Seekbot','http://www.seekbot.net/bot.html','SeekPort',''),
(519,'Findexa Crawler (http://www.findexa.no/gulesider/article26548.ece)','Findexa Crawler','http://www.findexa.no/english/article27709.ece','Findexa',''),
(520,'GAIS Robot/1.0B2','GAIS Robot','http://www.seed.net.tw/','Seed',''),
(521,'Sensis.com.au Web Crawler (search_comments\\at\\sensis\\dot\\com\\dot\\au)','Sensis.com.au Web Crawler','http://www.sensis.com.au/','Sensis',''),
(522,'SeznamBot/1.0','SeznamBot','http://www.seznam.cz/','Seznam',''),
(523,'SeznamBot/1.0 (+http://fulltext.seznam.cz/)','SeznamBot','http://www.seznam.cz/','Seznam',''),
(524,'Shoula.com Crawler 2.0','Shoula','http://www.shoula.com/','Shoula! Search',''),
(525,'Agent-SharewarePlazaFileCheckBot/2.0+(+http://www.SharewarePlaza.com)','SharewarePlaza','http://www.sharewareplaza.com/','SharewarePlaza',''),
(526,'sherlock/1.0','Sherlock','http://www.informatics.indiana.edu/fil/Class/b659/Projects/S04-g6/','Indiana University School of Informatics',''),
(527,'asterias/2.0','Asterias','http://search.singingfish.com/sfw/home.jsp','Singing Fish',''),
(528,'+SitiDi.net/SitiDiBot/1.0 (+Have Good Day)','SitiDiBot','http://www.sitidi.net/','SitiDi.net',''),
(529,'SBIder/0.7 (SBIder; http://www.sitesell.com/sbider.html; http://support.sitesell.com/contact-support.html)','SBIder','http://www.sitesell.com/sbider.html','SiteSell',''),
(530,'SiteSpider +(http://www.SiteSpider.com/)','SiteSpider','http://www.SiteSpider.com/','SiteSpider',''),
(531,'Slider_Search_v1-de','Slider','http://www.slider.com/','Slider',''),
(532,'SnykeBot/0.6 (http://www.snyke.com)','SnykeBot','http://www.snyke.com/','Snyke',''),
(533,'SoftHypermarketFileCheckBot/1.0+(+http://www.softhypermaket.com)','SoftHypermarket','http://www.softhypermaket.com','SoftHypermarket',''),
(534,'sohu-search','Sohu-search','http://www.sohu.com/','Sohu',''),
(535,'speedfind ramBot xtreme 8.1','Speedfind','http://www.speedfind.de/','Lotse',''),
(536,'Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Skampy/0.9.x [en]','Skampy','http://www.skaffe.com/','Skaffe',''),
(537,'User-Agent: Mozilla/4.0 (SKIZZLE! Distributed Internet Spider v1.0 - www.SKIZZLE.com)','Skizzle','http://www.skizzle.com/','Skizzle',''),
(538,'mammoth/1.0 (+http://www.sli-systems.com/)','Mammoth','http://www.sli-systems.com/','SLI Systems',''),
(539,'Mozilla (Mozilla@somewhere.com)','Somewhere','http://www.somewhere.com/','Somewhere',''),
(540,'MusicWalker2.0 (+http://www.somusical.com)','MusicWalker','http://www.somusical.com','SoMusical!',''),
(541,'Speedy Spider (Beta/1.0; www.entireweb.com)','Speedy Spider','http://www.entireweb.com/','Entireweb',''),
(542,'Mouse-House/7.4 (spider_monkey spider info at www.mobrien.com/sm.shtml)','SpiderMonkey','http://www.spidermonkey.ca/sm.shtml','SpiderMonkey',''),
(543,'SpiderMonkey/7.0x (SpiderMonkey.ca info at http://spidermonkey.ca/sm.shtml)','SpiderMonkey','http://www.spidermonkey.ca/sm.shtml','SpiderMonkey',''),
(544,'libwww-perl/5.45','SplatSearch','http://www.splatsearch.com/','Splat',''),
(545,'Steeler/1.x (http://www.tkl.iis.u-tokyo.ac.jp/~crawler/)','Steeler','http://www.tkl.iis.u-tokyo.ac.jp/~crawler/crawler.html.en','University of Tokyo',''),
(546,'Robot@SuperSnooper.Com','SuperSnooper','http://www.supersnooper.com/','SuperSnooper',''),
(547,'Swooglebot/2.0. (+http://swoogle.umbc.edu/swooglebot.html)','Swooglebot','http://swoogle.umbc.edu/swooglebot.html','University of Maryland',''),
(548,'<http://www.sygol.com/> http://www.sygol.com','Sygol','http://www.sygol.com','Sygol',''),
(549,'Szukacz/1.5 (robot; www.szukacz.pl/jakdzialarobot.html; info@szukacz.pl)','Szukacz','http://www.szukacz.pl/html/RobotEnglishVersion.html','Szukacz',''),
(550,'Szukacz/1.x (robot; www.szukacz.pl/jakdzialarobot.html; szukacz@proszynski.pl)','Szukacz','http://www.szukacz.pl/html/RobotEnglishVersion.html','Szukacz',''),
(551,'Tagword (http://tagword.com/dmoz_survey.php)','TAGword','http://tagword.com/dmoz_survey.php','TAGword DMOZ survey',''),
(552,'Talkro Web-Shot/1.0 (E-mail: webshot@daumsoft.com, Home: http://222.122.15.190/webshot)','Talkro','http://www.daumsoft.com/','DaumSoft',''),
(553,'Tecomi Bot (http://www.tecomi.com/bot.htm)','Tecomi Bot','http://www.tecomi.com/bot.htm','Tecomi',''),
(554,'Teoma MP','Teoma','http://www.teoma.com/','Teoma',''),
(555,'teomaagent crawler-admin@teoma.com','Teoma','http://www.teoma.com/','Teoma',''),
(556,'teomaagent1 [crawler-admin@teoma.com]','Teoma','http://www.teoma.com/','Teoma',''),
(557,'teoma_agent1','Teoma','http://www.teoma.com/','Teoma',''),
(558,'Mozilla/2.0 (compatible; Ask Jeeves/Teoma)','Teoma','http://www.teoma.com/','Teoma',''),
(559,'Teradex Mapper; mapper@teradex.com; http://www.teradex.com','Teradex Mapper','http://www.teradex.com','Teradex',''),
(560,'TheSuBot/0.1 (www.thesubot.de)','TheSuBot','http://www.thesubot.de/','TheSuBot',''),
(561,'WebVac (webmaster@pita.stanford.edu)','WebVac','http://dbpubs.stanford.edu:8091/~testbed/doc2/WebBase/','Stanford University',''),
(562,'Willow Internet Crawler by Twotrees V2.1','Willow','http://www.twotrees.com/','Twotrees',''),
(563,'thumbshots-de-Bot (Version: 1.02, powered by www.thumbshots.de)','Thumbshots-de-bot','http://www.thumbshots.de/','Thumbshots',''),
(564,'tivraSpider/1.0 (crawler@tivra.com)','TivraSpider','http://public.research.att.com/index.cfm?portal=1&h=1','ATT',''),
(565,'Tkensaku/x.x(http://www.tkensaku.com/q.html)','Tkensaku','http://www.tkensaku.com/q.html','Tkensaku',''),
(566,'Mozilla/5.0 (+http://www.toile.com/) ToileBot/0.1','ToileBot','http://www.toile.com/','La Toile du Qu�bec',''),
(567,'Mozilla/2.0 (compatible; T-H-U-N-D-E-R-S-T-O-N-E)','Thunderstones Webinator','http://www.thunderstone.com/texis/site/pages/Products.html','Thunderstones',''),
(568,'Mozilla/5.0 (compatible; heritrix/1.4t  http://www.truveo.com/)','Truveo','http://www.truveo.com/','Truveo',''),
(569,'Trampelpfad-Spider','Trampelpfad','http://www2.trampelpfad.de/','Trampelpfad',''),
(570,'Trampelpfad-Spider-v0.1','Trampelpfad','http://www2.trampelpfad.de/','Trampelpfad',''),
(571,'TurnitinBot/x.x (http://www.turnitin.com/robot/crawlerinfo.html)','TurnitinBot','http://www.turnitin.com/robot/crawlerinfo.html','Turnitin',''),
(572,'Turnpike Emporium LinkChecker/0.1','Turnpike Emporium','http://www.turnpike.net/directory.phtml','Turnpike Emporium Directory',''),
(573,'TutorGig/1.5 (+http://www.tutorgig.com/crawler)','TutorGigBot','http://www.tutorgig.com/crawler','TutorGig',''),
(574,'Tutorial Crawler 1.4 (http://www.tutorgig.com/crawler)','TutorGigBot','http://www.tutorgig.com/crawler','TutorGig',''),
(575,'TygoBot','TygoBot','http://www.tygo.com/','Tygo',''),
(576,'TygoProwler','TygoBot','http://www.tygo.com/','Tygo',''),
(577,'TurnitinBot','Turnitin','http://www.turnitin.com/robot/crawlerinfo.html','Turnitin',''),
(578,'updated/0.1beta (updated.com; http://www.updated.com; crawler@updated.om)','Updated','http://www.updated.com/','Updated',''),
(579,'Uptimebot','Uptimebot','http://www.uptimebot.com/','Uptimebot',''),
(580,'UptimeBot(www.uptimebot.com)','Uptimebot','http://www.uptimebot.com/','Uptimebot',''),
(581,'Mackster( http://www.ukwizz.com )','UKWizz','http://www.ukwizz.com','UKWizz',''),
(582,'unido-bot, http://mobicom.cs.uni-dortmund.de/bot.html','Unido-bot','http://mobicom.cs.uni-dortmund.de/bot.html','University of Dortmund',''),
(583,'Llaut/1.0 (http://mnm.uib.es/~gallir/llaut/bot.html)','Llaut','http://mnm.uib.es/~gallir/llaut/bot.html','Universitat de les Illes Balears',''),
(584,'USyd-NLP-Spider (http://www.it.usyd.edu.au/~vinci/bot.html)','USyd-NLP-Spider','http://www.it.usyd.edu.au/~vinci/bot.html','University of Sydney',''),
(585,'KnowItAll(knowitall@cs.washington.edu)','KnowItAll','http://www.cs.washington.edu/research/knowitall/','University of Washington',''),
(586,'Mozilla/5.0 URL-Spider','URL-Spider','http://www.url-spider.com/','URL-Spider',''),
(587,'Vakes/0.01 (Vakes; http://www.vakes.com/; search@vakes.com)','Vakes','http://www.vakes.com/','Vakes',''),
(588,'vspider','Vspider','http://www.verity.com/','Verity',''),
(589,'vspider/3.x','Vspider','http://www.verity.com/','Verity',''),
(590,'versus 0.2 (+http://versus.integis.ch)','Versus','http://versus.integis.ch','Hochschule f�r Technik Rapperswil',''),
(591,'InfoFly/1.0 (http://www.versions-project.org/)','InfoFly','http://www.versions-project.org/','Versions-project',''),
(592,'VeryGoodSearch.com.DaddyLongLegs','VeryGoodSearch','http://www.verygoodsearch.com/','VeryGoodSearch',''),
(593,'verzamelgids.nl - Networking4all Bot/x.x','Verzamelgids','http://www.verzamelgids.nl/','Verzamelgids',''),
(594,'AlkalineBOT/1.3','AlkalineBOT','http://alkaline.vestris.com/','Vestris',''),
(595,'AlkalineBOT/1.4 (1.4.0326.0 RTM)','AlkalineBOT','http://alkaline.vestris.com/','Vestris',''),
(596,'NCSA Beta 1 (http://vias.ncsa.uiuc.edu/viasarchivinginformation.html)','NCSA','http://vias.ncsa.uiuc.edu/viasarchivinginformation.html','National Center for Supercomputing Applications',''),
(597,'MultiText/0.1','MultiText','http://www.dlib.vt.edu/','Virginia Polytechnic Institute and State University',''),
(598,'KE_1.0/2.0 libwww/5.2.8','VoilaBot','http://www.voila.fr/','Voila.fr',''),
(599,'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot BETA 1.2 (http://www.voila.com/)','VoilaBot','http://www.voila.fr/','Voila.fr',''),
(600,'Mozilla/4.0 (compatible; MSIE 5.0; Windows 95) VoilaBot; 1.6','VoilaBot','http://www.voila.fr/','Voila.fr',''),
(601,'xirq/0.1-beta (xirq; http://www.xirq.com; xirq@xirq.com) ','Xirq','http://www.xirq.com/','Xirq',''),
(602,'W3SiteSearch Crawler_v1.1 http://www.w3sitesearch.de','W3SiteSearch Crawler','http://www.w3sitesearch.de','W3SiteSearch',''),
(603,'Mozilla/5.0 usww.com-Spider-for-w8.net','W8net','http://www.usww.com/','usww',''),
(604,'appie 1.1 (www.walhello.com)','Appie','http://www.walhello.com/','Walhello',''),
(605,'WeatherBot v1.4 http://www.ezweather.net','WeatherBot','http://www.ezweather.net','EZ Weather',''),
(606,'Carnegie_Mellon_University_WebCrawler,http://www.andrew.cmu.edu/~brgordon/webbot/index.html','WebBOT','http://www.andrew.cmu.edu/~brgordon/webbot/index.html','Carnegie Mellon University',''),
(607,'webcrawl.net','Webcrawl','http://www.webcrawl.net/','Webcrawl',''),
(608,'obidos-bot (just looking for books.)','Obidos-bot','http://www.onfocus.com/bookwatch/','Weblog bookwatch',''),
(609,'webmeasurement-crawler, http://mobicom.cs.uni-dortmunde.de/webmeasurement/','Webmeasurement-crawler','http://mobicom.cs.uni-dortmund.de/bot.html','University of Dortmund',''),
(610,'Kevin http://websitealert.net/kevin/','Kevin','http://websitealert.net/kevin/','WebSiteAlert',''),
(611,'webbandit/4.xx.0','Webbandit','http://softwaresolutions.net/','SoftwareSolutions',''),
(612,'Webclipping.com','Webclipping','http://www.webclipping.com/','Webclipping',''),
(613,'webcrawl.net','Webcrawl','http://www.webcrawl.net/','Webcrawl',''),
(614,'WebFindBot(http://www.web-find.com)','WebFindBot','http://www.web-find.com','web-find',''),
(615,'Webglimpse 2.xx.x (http://webglimpse.net)','Webglimpse','http://webglimpse.net','Webglimpse',''),
(616,'WebSearch.COM.AU/3.0.1 (The Australian Search Engine; http://WebSearch.COM.AU; Search@WebSearch.COM.AU)','WebSearch','http://websearch.com.au/','WebSearch',''),
(617,'WebSearchBench WebCrawler v0.1(Experimental)','WebSearchBench','http://websearchbench.cs.uni-dortmund.de/websearch/about.html.de','University of Dortmund',''),
(618,'WSB WebCrawler V1.0 (Beta), cl@cs.uni-dortmund.de','WebSearchBench','http://websearchbench.cs.uni-dortmund.de/websearch/about.html.de','University of Dortmund',''),
(619,'WSB, http://websearchbench.cs.uni-dortmund.de','WebSearchBench','http://websearchbench.cs.uni-dortmund.de/websearch/about.html.de','University of Dortmund',''),
(620,'WebSearchBench WebCrawler V1.0 (Beta), Prof. Dr.-Ing. Christoph Lindemann, Universit�t Dortmund, cl@cs.uni-dortmund.de, http://websearchbench.cs.uni-dortmund.de/','WebSearchBench','http://websearchbench.cs.uni-dortmund.de/websearch/about.html.de','University of Dortmund',''),
(621,'Webspinne/1.0 webmaster@webspinne.de','Webspinne','http://www.webspinne.de/','Webspinne',''),
(622,'Websquash.com (Add url robot)','Websquash','http://www.websquash.com/','Websquash',''),
(623,'WebStat/1.0 (Unix; beta; 20040314)','WebStat','http://www.math.psu.edu/babcock/webstat/version1.0/','University of South Carolina',''),
(624,'DaviesBot/1.7 (www.wholeweb.net)','DaviesBot','http://www.wholeweb.net/','Wholeweb',''),
(625,'Mozilla/4.0 (compatible; MSIE 5.0; Windows ME) Opera 5.11 [en]','WinME','?','?',''),
(626,'WIRE/0.x (Linux; i686; Bot,Robot,Spider,Crawler)','WIRE','http://www.cwr.cl/projects/WIRE/','CWR',''),
(627,'Mozilla/3.0 (Vagabondo/1.x MT; webagent@wise-guys.nl; http://webagent.wise-guys.nl/)','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(628,'Mozilla/3.0 (Vagabondo/2.0 MT; webcrawler@NOSPAMwise-guys.nl; http://webagent.wise-guys.nl/)','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(629,'Vagabondo/1.x MT (webagent@wise-guys.nl)','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(630,'Vagabondo/2.0 MT','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(631,'Vagabondo/2.0 MT (webagent at wise-guys dot nl)','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(632,'Vagabondo/2.0 MT (webagent@NOSPAMwise-guys.nl)','WiseGuys','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),
(633,'ZyBorg/1.0 (ZyBorg@WISEnut.com; http://www.WISEnut.com)','ZyBorg (Wisenut)','http://www.wisenut.com/','Wisenut',''),
(634,'WorldWideWeb-X/3.1 (+http://www.worldwideweb-x.com/)','WorldWideWeb-X/3.1','http://www.worldwideweb-x.com','WorldWideWeb',''),
(635,'WWWeasel Robot v1.00 (http://wwweasel.de)','WWWeasel Robot','http://wwweasel.de','World Wide Weasel',''),
(636,'Wotbox/alpha0.6 (bot@wotbox.com; http://www.wotbox.com)','Wotbox','http://www.wotbox.com','Wotbox',''),
(637,'Wotbox/alpha0.x.x (bot@wotbox.com; http://www.wotbox.com)   Java/1.4.1_02','Wotbox','http://www.wotbox.com','Wotbox',''),
(638,'wume_crawler/1.1 (http://wume.cse.lehigh.edu/~xiq204/crawler/)','Wume_crawler','http://wume.cse.lehigh.edu/~xiq204/crawler/','Lehigh University',''),
(639,'MediaSearch/0.1','MediaSearch','http://www.fi/CDA.LinkDirectory.Mainpage/0,3584,level1-l2,00.html','WWW.FI',''),
(640,'egothor/3.0a (+http://www.xdefine.org/robot.html)','Xdefine','http://www.egothor.org/','Xdefine',''),
(641,'Project XP5 [2.03.07-111203]','XP5','http://marty.anstey.ca/projects/robots/index.html','Marty Anstey',''),
(642,'cosmos/0.8_(robot@xyleme.com)','Xyleme SA France','http://www.xyleme.com/en/index.jsp','Xyleme',''),
(643,'cosmos/0.9_(robot@xyleme.com)','Xyleme SA France','http://www.xyleme.com/en/index.jsp','Xyleme',''),
(644,'Mozilla/4.0 (compatible; MSIE 5.0; YANDEX)','Yandex','http://www.yandex.ru/','Yandex',''),
(645,'YahooSeeker/CafeKelsa-dev (compatible; Konqueror/3.2; FreeBSD ;cafekelsa-dev-webmaster@yahoo-inc.com ) (KHTML, like Gecko)','YahooSeeker','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(646,'YahooFeedSeeker/1.0 (compatible; Mozilla 4.0; MSIE 5.5; http://my.yahoo.com/s/publishers.html)','YahooFeedSeeker','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(647,'Yahoo-MMCrawler/3.x (mms dash mmcrawler dash support at yahoo dash inc dot com)','Yahoo-MMCrawler','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(648,'Yahoo-VerticalCrawler-FormerWebCrawler/3.9 crawler at trd dot overture dot com; http://www.alltheweb.com/','Yahoo-VerticalCrawler','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(649,'Mozilla/5.0 (compatible; Yahoo! Slurp; http://help.yahoo.com/help/us/ysearch/slurp)','Slurp Inktomi (Yahoo)','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(650,'spider.yellopet.com - www.yellopet.com','Yellopet','http://www.yellopet.com/','Yellopet',''),
(651,'yarienavoir.net/0.2','Yarienavoir','http://www.yarienavoir.net/cgi-bin/s.cgi','Yarienavoir',''),
(652,'YottaCars_Bot/4.12 (+http://www.yottacars.com) Car Search Engine','YottaCars','http://www.yottacars.com','YottaCars',''),
(653,'YottaShopping_Bot/4.12 (+http://www.yottashopping.com) Shopping Search Engine','YottaShopping','http://www.yottashopping.com','YottaShopping',''),
(654,'Gulper Web Bot 0.2.4 (www.ecsl.cs.sunysb.edu/~maxim/cgi-bin/Link/GulperBot)','GulperBot','http://www.ecsl.cs.sunysb.edu/','University of New-York',''),
(655,'Mozilla/5.0 [en] (compatible; Gulper Web Bot 0.2.4 www.ecsl.cs.sunysb.edu/~maxim/cgi-bin/Link/GulperBot)','GulperBot','http://www.ecsl.cs.sunysb.edu/','University of New-York',''),
(656,'Zao/0.1 (http://www.kototoi.org/zao/)','Zao Crawler','http://www.kototoi.org/zao/','Kototoi',''),
(657,'Zao-Crawler','Zao Crawler','http://www.kototoi.org/zao/','Kototoi',''),
(658,'Zao-Crawler 0.2b','Zao Crawler','http://www.kototoi.org/zao/','Kototoi',''),
(659,'DeepIndex ( http://www.zetbot.com )','Zetbot','http://www.zetbot.com/','Zetbot',''),
(660,'zerxbot/Version 0.6 libwww-perl/5.79','Zerxbot','http://www.zerx.com/','Zerx',''),
(661,'Zeus xxxxx Webster Pro V2.9 Win32','Zeus','http://www.zeus.com','Zeus',''),
(662,'ZBot/1.00 (icaulfield@zeus.com)','Zeus','http://www.zeus.com','Zeus',''),
(663,'Zeus ThemeSite Viewer Webster Pro V2.9 Win32','Zeus','http://cyber-robotics.com/','Cyber-Robotics',''),
(664,'ZipppBot/0.xx (ZipppBot; http://www.zippp.net; webmaster@zippp.net)','ZipppBot','http://www.zippp.net','Zipp',''),
(665,'ZIPPPCVS/0.xx (ZipppBot/.xx;http://www.zippp.net; webmaster@zippp.net)','ZipppBot','http://www.zippp.net','Zipp',''),
(666,'Zippy v2.0 - Zippyfinder.com','Zippy','http://www.zippyfinder.com/','Zippyfinder',''),
(667,'ZoomSpider - wrensoft.com','ZoomSpider','http://www.wrensoft.com/','WrenSoft',''),
(668,'RedKernel WWW-Spider 2/0 (+http://www-spider.redkernel-softwares.com/)','RedKernel','http://www.redkernel-softwares.com/','RedKernel',''),
(669,'<a href=\"http://www.unchaos.com/\"> UnChaos </a>, From Chaos To Order, Hybrid Web Search Engine. (vadim_gonchar@unchaos.com)','UnChaosBot','http://www.unchaos.com/','UnCHAOS',''),					
(670,'<a href=\"http://www.unchaos.com/\"> UnChaos Bot, Hybrid Web Search Engine. </a> (vadim_gonchar@unchaos.com)','UnChaosBot','http://www.unchaos.com/','UnCHAOS',''),					
(671,'<b> UnChaosBot, From Chaos To Order, UnChaos Hybrid Web Search Engine at www.unchaos.com </b> (info@unchaos.com)','UnChaosBot','http://www.unchaos.com/','UnCHAOS',''),					
(672,'DataSpearSpiderBot/0.2 (DataSpear Spider Bot; http://dssb.dataspear.com/bot.html; dssb@dataspear.com)','DataSpear Spider Bot','http://www.dataspear.com/','DataSpear',''),
(673,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; SV1; IBP; .NET CLR 1.1.4322)','Axandra','http://www.axandra-web-site-promotion-software-tool.com/index.htm','Axandra',''),
(674,'ZeBot_www.ze.bz (ze.bz@hotmail.com)','ZeBot','http://www.ze.bz/','ZE.BZ',''),
(675,'Hi! I\'m CsCrawler, my homepage: http://www.kde.cs.uni-kassel.de/lehre/ss2005/googlespam/crawler.html RPT-HTTPClient/0.3-3','CsCrawler','http://www.kde.cs.uni-kassel.de/lehre/ss2005/googlespam/crawler.html','University of Kassel',''),
(676,'Mozilla/5.0 (compatible; Theophrastus/1.1; http://users.cs.cf.ac.uk/N.A.Smith/theophrastus.php)','Theophrastus','http://users.cs.cf.ac.uk/N.A.Smith/theophrastus.php','N.A.Smith',''),
(677,'LapozzBot/1.4 ( http://robot.lapozz.com)','LapozzBot','http://robot.lapozz.com','Lapozz',''),
(678,'OpenTaggerBot (http://www.opentagger.com/opentaggerbot.htm)','OpenTaggerBot','http://www.opentagger.com/opentaggerbot.htm','OpenTagger',''),
(679,'KummHttp/1.1 (compatible; KummClient; Linux rulez)','Kumm','http://sanomabp.hu/','Sanoma',''),
(680,'Mozilla/4.6 [en] (http://www.cnet.com/)','Cnet robot','http://www.search.com/','Search.com',''),
(681,'Mozilla/4.0 (compatible; crawlx, crawler@trd.overture.com)','Yahoo Search Marketing crawler','http://www.content.overture.com/d/','Yahoo',''),																				
(682,'KFSW-Bot (Version: 1.01, powered by KFSW, www.kfsw.de)','KFSW-Bot','http://www.kfsw.de','KFSW',''),
(683,'Mozilla/4.0 (compatible; Vagabondo/2.2; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)','Vagabondo','http://webagent.wise-guys.nl/','WiseGuys',''),					
(684,'Vagabondo/3.0 (webagent at wise-guys dot nl)','Vagabondo','http://webagent.wise-guys.nl/','WiseGuys',''),
(685,'savvybot/0.2','Savvybot','http://www.websavvy.cc/bot.php','WebSavvy',''),
(686,'Arikus_Spider','Arikus_Spider','http://www.arikus.com/inContext-enterprise.html','Arikus',''),
(687,'ConveraCrawler/0.9d (+http://www.authoritativeweb.com/crawl)','ConveraCrawler','http://www.authoritativeweb.com/crawl','Convera',''),																																			
(688,'Y!J-BSC/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html) ','Yahoo Search Japan robot','http://www.arikus.com/inContext-enterprise.html','Yahoo Japan',''),					
(689,'Mozilla/5.0 (Windows; U; Windows NT 5.0; en-US; rv:1.7.7) NimbleCrawler 1.11 obeys UserAgent NimbleCrawler For problems contact: crawler_at_dataalchemy.com ','NimbleCrawler','http://www.healthline.com/','Healthline',''),					
(690,'PrivacyFinder/1.1','PrivacyFinder/1.1','http://privacybird.com/','AT&T Privacy Bird Privacy Preferences',''),				
(691,'BeamMachine/0.5 (dead link remover of www.beammachine.net)','BeamMachine','http://www.beammachine.net/de/','BeamMachine',''),				
(692,'Insitor.com search and find world wide!','Insitor Search robot','http://www.insitor.com/','Insitor',''),				
(693,'Zearchit','Zearchit','http://www.zearchit.de/','Zearchit',''),					
(694,'Mozilla/4.0 (compatible; www.euro-directory.com; urlchecker1.0)','Urlchecker1.0','http://www.euro-directory.com/','Euro Directory',''),					
(695,'Mozilla/5.0 whoiam [http://www.axxus.de/]','Whoiam','http://www.axxus.de/','Axxus',''),
(696,'yacy (www.yacy.net; v20040602; i386 Linux 2.4.26-gentoo-r13; java 1.4.2_06; MET/en)','Yacy','http://www.yacy.net/','Yacy',''),					
(697,'fastbot crawler beta 2.0 (+http://www.fastbot.de) ','Fastbot','http://www.fastbot.de/','Fastbot',''),					
(698,'Insitornaut','Insitornaut','http://www.insitor.com/','Insitor',''),
(699,'ShopWiki/1.0 ( +http://www.shopwiki.com/)','ShopWiki','http://dev.littlewiki.com/wiki/Home','Littlewiki',''),				
(700,'Mozilla/5.0 (Windows;) NimbleCrawler 1.12 obeys UserAgent NimbleCrawler For problems contact: crawler@healthline.com','NimbleCrawler','http://www.healthline.com/','Healthline',''),					
(701,'RedCell/0.1 (InfoSec Search Bot (Coming Soon); http://www.telegenetic.net/bot.html; lhall@telegenetic.net)','InfoSec Search Bot','http://www.telegenetic.net/bot.html','Telegenetic',''),					
(702,'Webverzeichnis.de - Telefon: 01908 / 26005','Webverzeichnis','http://www.webverzeichnis.de/','Webverzeichnis',''),					
(703,'NavissoBot','NavissoBot','http://navisso.com/','Navisso',''),					
(704,'NavissoBot/1.7 (+http://navisso.com/)','NavissoBot','http://navisso.com/','Navisso',''),	
(705,'larbin_2.6.3 (ltaa_web_crawler@groupes.epfl.ch)','Ltaa_web_crawler','http://www.epfl.ch/Eindex.html','Ecole Polytechnique F�d�rale de Lausanne',''),					
(706,'silk/1.0 (+http://www.slider.com/silk.htm)/3.7','Silk/1.0','http://www.slider.com/index.html','Slider',''),									
(707,'Everest-Vulcan Inc./0.1 (R&D project; host=e-1-24; http://everest.vulcan.com/crawlerhelp)','Everest-Vulcan','http://everest.vulcan.com/crawlerhelp','Vulcan',''),					
(708,'gsa-crawler (Enterprise; GIX-03519; cknuetter@stubhub.com)','Gsa-crawler','http://www.google.com/enterprise/gsa/','IBM',''),
(709,'Vortex/2.2 (+http://marty.anstey.ca/robots/vortex/)','Vortex/2.2','http://marty.anstey.ca/robots/vortex/','Marty Anstey',''),					
(710,'SBIder/0.8-dev (SBIder; http://www.sitesell.com/sbider.html; http://support.sitesell.com/contact-support.html)','SBIder','http://www.sitesell.com/sbider.html','Sitesell',''),					
(711,'RedCell/0.1 (RedCell; telegenetic.net/bot.html; lhall_at_telegenetic.net)','RedCell','http://www.telegenetic.net/bot.html','Telegenetic',''),					
(712,'Yahoo-Blogs/v3.9 (compatible; Mozilla 4.0; MSIE 5.5; http://help.yahoo.com/help/us/ysearch/crawling/crawling-02.html )','Yahoo-Blogs','http://help.yahoo.com/help/us/ysearch/crawling/crawling-02.html','Yahoo',''),					
(713,'http://www.monogol.de','Monogol','http://www.monogol.de/','Monogol',''),
(714,'NetSprint -- 2.0','NetSprint -- 2.0','http://www.wp.pl/','Wirtualna Polska',''),
(715,'noxtrumbot/1.0 (crawler@noxtrum.com)','Noxtrumbot','http://www.noxtrum.com/','Noxtrum',''),			
(716,'Wavefire/0.8-dev (Wavefire; http://www.wavefire.com; info@wavefire.com)','Wavefire','http://www.wavefire.com','Wavefire',''),					
(717,'Wwlib/Linux','Wwlib/Linux','http://www.scit.wlv.ac.uk/wwlib/','Wolverhampton Web Library',''),
(718,'Feedfetcher-Google; (+http://www.google.com/feedfetcher.html)','Feedfetcher-Google','http://www.google.com/feedfetcher.html','Google',''),					
(719,'RedCarpet/1.2 (http://www.redcarpet-inc.com/robots.html)','RedCarpet/1.2','http://www.redcarpet-inc.com/robots.html','Pronto',''),					
(720,'ZeBot_lseek.net (bot@ze.bz)','ZeBot','http://www.ze.bz/','Ze.bz',''),					
(721,'Gigabot/2.0/gigablast.com/spider.html ','Gigabot','http://www.gigablast.com/','Gigablast',''),
(722,'Exabot/2.0','Exabot','http://www.exalead.com/search','Exalead',''),
(723,'htdig/3.1.6 (unconfigured@htdig.searchengine.maintainer)','Htdig/3.1.6','http://www.ac-toulouse.fr/html/_.php','Acad�mie de Toulouse',''),					
(724,'yoogliFetchAgent/0.1','Yoogli','http://www.yoogli.com/','Yoogli',''),					
(725,'suchbaer.de','Suchbaer','http://www.suchbaer.de/','Suchbaer',''),
(726,'Mozilla/5.0 (compatible; Crawling jpeg; http://www.yama.info.waseda.ac.jp)','Crawling jpeg','http://www.yama.info.waseda.ac.jp/eng/index.html','Yamana Laboratory - Waseda University Japan',''),	
(727,'Mozilla/4.0 (compatible; Y!J; for robot study; keyoshid)','Y!J','http://www.yahoo.co.jp/','Yahoo Japan',''),					
(728,'Y!J/1.0 (http://help.yahoo.co.jp/help/jp/search/indexing/indexing-15.html)','Y!J','http://www.yahoo.co.jp/','Yahoo Japan',''),					
(729,'Shim-Crawler(Mozilla-compatible; http://www.logos.ic.i.u-tokyo.ac.jp/crawler/; crawl@logos.ic.i.u-tokyo.ac.jp)','Shim-Crawler','http://www.logos.ic.i.u-tokyo.ac.jp/crawler/','University of Tokyo',''),					
(730,'Mozilla/5.0 (compatible; heritrix/1.4.0 +http://www.chepi.net)','Heritrix/1.4.0','http://www.chepi.net','Chepi',''),														
(731,'IP2MapBot/1.1 http://www.ip2map.com','IP2MapBot','http://www.ip2map.com','Ip2Map',''),
(732,'Evaal/0.7.1 (Evaal; http://search.evaal.com/bot.html; bot@evaal.com)','Evaal','http://search.evaal.com','Evaal',''),					
(733,'msnbot/0.3 (+http://search.msn.com/msnbot.htm)','MSN Bot','http://search.msn.com/msnbot.htm','MSN',''),					
(734,'msnbot/0.9 (+http://search.msn.com/msnbot.htm)','MSN Bot','http://search.msn.com/msnbot.htm','MSN',''),					
(735,'Lycos_Spider_(modspider)','Lycos_Spider','http://www.lycos.com/','Lycos',''),	
(736,'SygolBot http://www.sygol.net','SygolBot','http://www.sygol.net','Sygol',''),					
(737,'Mozilla/5.0 (compatible; Scrubby/2.2; http://www.scrubtheweb.com/)','Scrubby','http://www.scrubtheweb.com/','Scrub the web',''),					
(738,'LocalBot/1.0 ( http://www.localbot.co.uk/)','LocalBot','http://www.localbot.co.uk/','LocalBot',''),					
(739,'Apexoo Spider 1.0','Apexoo Spider','http://www.apexoo.com/','Apexoo',''),
(740,'suchbaer.de (CrawlerAgent v0.103)','Suchbaer','http://www.suchbaer.de/','Suchbaer',''),					
(741,'CougarSearch/0.1 (+http://www.cougarsearch.com/faq.shtml)','CougarSearch','http://www.cougarsearch.com/','CougarSearch',''),					
(742,'EvaalSE - bot@evaal.com','EvaalSE','http://www.evaal.com/','Evaal',''),					
(743,'FAST Enterprise Crawler 6 / Scirus scirus-crawler@fast.no; http://www.scirus.com/srsapp/contactus/','Scirus-crawler','http://www.scirus.com/srsapp/','Scirus',''),									
(744,'ichiro/2.0 (http://help.goo.ne.jp/door/crawler.html)','Ichiro','http://www.goo.ne.jp/','Goo',''),
(745,'WebAlta Crawler/1.2.1 (http://www.webalta.ru/bot.html)','WebAlta Crawler','http://www.webalta.ru/bot.html','WebAlta',''),					
(746,'Bitacle Robot (V:1.0;) (http://www.bitacle.com)','Bitacle Robot','http://www.bitacle.com','Bitacle',''),					
(747,'Bitacle bot/1.1','Bitacle Robot','http://www.bitacle.com','Bitacle',''),
(748,'DataSpear/1.0 (Spider; http://www.dataspear.com/spider.html; spider@dataspear.com)','DataSpear Spider Bot','http://www.dataspear.com/','DataSpear',''),					
(749,'HenriLeRobotMirago (http://www.miragorobot.com/scripts/frinfo.asp)','HenriLeRobotMirago','http://www.miragorobot.com/scripts/frinfo.asp','Mirago',''),					
(750,'BIGLOTRON (Beta 2;GNU/Linux)','Biglotron','http://www.biglotron.com/','Biglotron',''),					
(751,'HooWWWer/2.1.3 (debugging run) (+http://cosco.hiit.fi/search/hoowwwer/ | mailto:crawler-info<at>hiit.fi)','Hoowwwer','http://cosco.hiit.fi/search/hoowwwer/','NGIR',''),								
(752,'kinjabot (http://www.kinja.com)','Kinjabot','http://www.kinja.com','Kinja',''),
(753,'kinja-imagebot (http://www.kinja.com/)','Kinja-imagebot','http://www.kinja.com','Kinja',''),
(754,'Nokia6820/2.0 (4.83) Profile/MIDP-1.0 Configuration/CLDC-1.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)','Googlebot-Mobile','http://www.google.com/bot.html','Google',''),	
(755,'carleson/1.0','Carleson','http://www.cosmixcorp.com/','Cosmix',''),					
(756,'Misterbot-Nutch/0.7.1 (Misterbot-Nutch; http://www.misterbot.fr; admin@misterbot.fr)','Misterbot','http://www.misterbot.fr','Misterbot',''),					
(757,'Waypath development crawler - info at waypath dot com','Waypath','http://www.waypath.com/','Waypath',''),									
(758,'Waypath Scout v2.x - info at waypath dot com','Waypath','http://www.waypath.com/','Waypath',''),
(759,'suchpad/1.0 (+http://www.suchpad.de)','Suchpad','http://www.suchpad.de','Suchpad',''),
(760,'Googlebot-Image/1.0 (+http://www.googlebot.com/bot.html)','Google-Image','http://www.google.com/webmasters/bot.html','Google',''),					
(761,'Catall Spider','Catall Spider','http://www.catall.de/','Catall',''),						
(762,'Mozilla/5.0 (compatible; Yahoo! Slurp China; http://misc.yahoo.com.cn/help.html)','Slurp China (Yahoo)','http://misc.yahoo.com.cn/help.html','Yahoo',''),
(763,'YahooYSMcm/2.0.0','Yahoo Search Marketing crawler','http://www.content.overture.com/d/','Yahoo',''),					
(764,'SycaBoT/1.0','SycaBoT','http://www.sycarox.com/','SycaroX',''),						
(765,'Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.2.1; aggregator:TailRank; http://tailrank.com/robot) Gecko/20021130','TailRank Robot','http://tailrank.com/robot','TailRank',''),					
(766,'enoola (http://www.enoola.com)','Enoola','http://www.enoola.com','Enoola',''),
(767,'TeragramWebcrawler/1.0','TeragramWebcrawler','http://www.teragram.com/','Teragram',''),					
(768,'TeragramCrawler','TeragramCrawler','http://www.teragram.com/','Teragram',''),					
(769,'dev-spider2.searchpsider.com/1.3b','Dev-spider2','http://www.searchspider.com/','Searchspider',''),					
(770,'timboBot/0.9 http://www.breakingblogs.com/timbo_bot.html','TimboBot','http://www.breakingblogs.com/timbo_bot.html','Breakingblogs',''),										
(771,'NextopiaBOT (+http://www.nextopia.com) distributed crawler client beta v1.1','NextopiaBot','http://www.nextopia.com','Nextopia',''),					
(772,'Mozilla/5.0 (compatible; NLCrawler/2.0.27; Linux 2.6.3-7; i686; en_US)KHTML/3.4.89 (like Gecko)','NLCrawler','http://www.northernlight.com','Northern Light',''),					
(773,'RAMPyBot/0.8-dev (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)','RAMPyBot','http://www.giveramp.com/','GiveRamp',''),					
(774,'sproose/0.1-alpha (sproose crawler; http://www.sproose.com/bot.html; crawler@sproose.com)','Sproose','http://www.sproose.com/bot.html','Sproose',''),					
(775,'ExactSeek_Spider','ExactSeek_Spider','http://exactseek.com/','ExactSeek',''),
(776,'LookdirBot','LookdirBot','http://www.lookdir.net/','Lookdir',''),
(777,'!Susie (http://www.sync2it.com/susie)','Susie','http://www.sync2it.com/susie','Sync2it',''),
(778,'Keegeebot/2.1 (+http://www.keegee.com/keegee/bot.html)','Keegeebot','http://www.keegee.com/keegee/bot.html','Keegee',''),
(779,'csci_b659/0.13','Csci_b659/0.13','http://informatics.indiana.edu/fil/Class/b659/','Indiana University School of Informatics',''),
(780,'Mozilla/5.0 (compatible; vermut +http://vermut.aol.com)','Vermut','http://vermut.aol.com','AOL',''),						
(781,'mozilla/5.0 (compatible; vermut +http://www.aol.com)','Vermut','http://vermut.aol.com','AOL',''),						
(782,'SycaBoT-Programme','SycaBoT-Programme','http://www.sycarox.com/','SycaroX',''),						
(783,'SycaBoT-Image','SycaBoT-Image','http://www.sycarox.com/','SycaroX',''),						
(784,'SycaBoT-Audio','SycaBoT-Audio','http://www.sycarox.com/','SycaroX',''),						
(785,'SycaBoT-Video','SycaBoT-Video','http://www.sycarox.com/','SycaroX',''),						
(786,'Camcrawler (+http://www.camdiscover.com/crawler.html)','Camcrawler','http://www.camdiscover.com/crawler.html','Sensation Internet Services',''),
(787,'Combine/2.0','Combine','http://combine.it.lth.se/','Lund University',''),
(788,'Filangy/1.01 (Filangy; http://www.filangy.com/filangyinfo.jsp?inc=robots.jsp; filangy-agent@filangy.com)','Filangy','http://www.filangy.com/filangyinfo.jsp?inc=robots.jsp','Filangy',''),
(789,'MJ12bot/v1.0.7 (http://majestic12.co.uk/bot.php?+)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''),
(790,'Norbert the Spider(Burf.com)','Norbert','http://www.burf.com/','Burf',''),
(791,'webGobbler/1.x.x','WebGobbler','http://sebsauvage.net/webgobbler/','WebGobbler',''),
(792,'OrangeSpider','OrangeSpider','http://www.orangeslicer.com','Orangeslicer',''),
(793,'FAST Enterprise Crawler 6 used by Verizon Superpages Powered By FAST (crawler_admin@superpages.com)','Verizon','http://www.superpages.com','Verizon Superpages',''),
(794,'fast enterprise crawler 6 used by verizon superpages powered by fast (kevin.watters@fastsearch.com)','Verizon','http://www.superpages.com','Verizon Superpages',''),										
(795,'Octora Beta - www.octora.com','Octora','http://www.octora.com','Octora',''),
(796,'CoBITSProbe','CoBITSProbe','http://www.iis.sinica.edu.tw/~hungchi/CBIT/','Academia Sinica',''),
(797,'Microsoft Small Business Indexer','Microsoft Small Business Indexer','http://www.microsoft.com/windowsserver2003/sbs/default.mspx','Microsoft',''),
(798,'voyager/1.0','Voyager','http://www.kosmix.com/crawler.html','Kosmix',''),
(799,'cfetch/1.0','Voyager','http://www.kosmix.com/crawler.html','Kosmix',''),
(800,'Accoona-AI-Agent/1.1.1 (crawler at accoona dot com)','Accoona','http://www.accoona.com/','Accoona',''),
(801,'NetWhatCrawler/0.06-dev (NetWhatCrawler from NetWhat.com; http://www.netwhat.com; support@netwhat.com)','NetWhatCrawler','http://www.netwhat.com','Netwhat',''),
(802,'Firefox_1.0.6 (kasparek@naparek.cz)','Kasparek','http://www.cvut.cz/','Czech Technical University Prague',''),
(803,'Mozilla/5.0 (compatible; Yahoo! DE Slurp; http://help.yahoo.com/help/us/ysearch/slurp)','Slurp (Yahoo)','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),					
(804,'FreshNotes crawler< report problems to crawler-at-freshnotes-dot-com','FreshNotes crawler','http://freshnotes.com/fn/','FreshNotes',''),					
(805,'Mozilla/5.0 (+http://www.sli-systems.com/) Mammoth/0.1','Mammoth','http://www.sli-systems.com/','SLI Systems',''),					
(806,'Jambot/0.1.1 (Jambot; http://www.jambot.com/blog; crawler@jambot.com) ','Jambot','http://www.jambot.com','Jambot',''),						
(807,'yacybot (x86 Windows XP 5.1; java 1.5.0_06; Europe/de) yacy.net','Yacybot','http://www.yacy.net/','Yacy',''),						
(808,'zspider/0.9-dev http://feedback.redkolibri.com/','Zspider','http://feedback.redkolibri.com/','Redkolibri',''),
(809,'FreshNotes crawler, report problems to crawler-at-freshnotes-dot-com','FreshNotes crawler','FreshNotes crawler','FreshNotes',''),
(810,'NutchCVS/0.7.1 (Nutch running at UW; http://www.nutch.org/docs/en/bot.html; sycrawl@cs.washington.edu)','Sycrawl','http://qbert.cs.washington.edu/','University of Washington',''),
(811,'Comrite/0.7.1 (Nutch; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)','Comrite','http://www.comrite.com/','Comrite',''),
(812,'Mozilla/4.0 (compatible; MSIE 4.0; Windows NT; Site Server 3.0 Robot) ACR','Site Server 3.0 Robot','http://www.acr.org/s_acr/index.asp','American College of Radiology',''),
(813,'Vespa Crawler','Vespa Crawler (Yahoo)','http://jobs.yahoo.no/index.html','Yahoo! Norway',''),
(814,'Vagabondo-WAP/2.0 (webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)/1.0 Profile','Vagabondo-WAP','http://www.wise-guys.nl/Contact/index.php?botselected=webagents&lang=uk','WiseGuys',''),					
(815,'Exabot-Images/1.0','Exabot-Images','http://www.exalead.com/search','Exalead',''),					
(816,'NG/4.0.1229','Exabot-Images','http://www.exalead.com/search','Exalead',''),					
(817,'Mozilla/4.0 (compatible; MSIE 6.0 compatible; Asterias Crawler v4; +http://www.singingfish.com/help/spider.html; webmaster@singingfish.com); SpiderThread Revision: 3.10','Asterias Crawler','http://search.singingfish.com/sfw/home.jsp','Singingfish',''),															
(818,'Combine/2.0 http://combine.it.lth.se/','Combine','http://combine.it.lth.se/','Combine',''),					
(819,'Yahoo! Mindset','Yahoo! Mindset','http://mindset.research.yahoo.com/','Yahoo! Mindset',''),					
(820,'schibstedsokbot (compatible; Mozilla/5.0; MSIE 5.0; FAST FreshCrawler 6; +http://www.schibstedsok.no/bot/)','Schibstedsokbot','http://www.schibsted.no/','Schibsted',''),
(821,'Syntryx ANT Scout Chassis Pheromone; Mozilla/4.0 compatible crawler','Syntryx','http://www.syntryx.com/','Syntryx',''),
(822,'RAMPyBot - www.giveRAMP.com/0.1 (RAMPyBot - www.giveRAMP.com; http://www.giveramp.com/bot.html; support@giveRAMP.com)','RAMPyBot','http://www.giveramp.com/','Giveramp',''),
(823,'Mozilla/4.0 compatible FurlBot/Furl Search 2.0 (FurlBot; http://www.furl.net; wn.furlbot@looksmart.net)','FurlBot','http://www.furl.net/','Furl',''),
(824,'TerrawizBot/1.0 (+http://www.terrawiz.com/bot.html)','TerrawizBot','http://www.terrawiz.com/bot.html','Terrawiz',''),
(825,'Netluchs/0.8-dev ( ; http://www.netluchs.de/; ___don\'t___spam_me_@netluchs.de) ','Netluchs','http://www.netluchs.de/','Netluchs',''),
(826,'FeedChecker/0.01','FeedChecker','http://www.u-tokyo.ac.jp/index_e.html','University of Tokyo',''),					
(827,'BebopBot/2.5.1 ( crawler http://www.apassion4jazz.net/bebopbot.html )','BebopBot','http://www.apassion4jazz.net/','Apassion4jazz',''),
(828,'Generic Mobile Phone (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)','Googlebot-Mobile','http://www.google.com/webmasters/bot.html','Google',''),					
(829,'Krugle/Krugle,Nutch/0.8+ (Krugle web crawler; http://www.krugle.com/crawler/info.html; webcrawler@krugle.com)','Krugle','http://www.krugle.com/crawler/info.html','Krugle',''),						
(830,'Mozilla/5.0 (compatible; AnsearchBot/1.0; +http://www.ansearch.com.au/)','AnsearchBot','http://www.ansearch.com.au/','Ansearch',''),						
(831,'KakleBot - www.kakle.com/0.1 (KakleBot - www.kakle.com; http:// www.kakle.com/bot.html; support@kakle.com)','KakleBot','http:// www.kakle.com/bot.html','Akle',''),										
(832,'Piffany_Web_Spider_v0.x','Piffany','http://www.piffany.com/spider.html','Piffany',''),
(833,'Piffany_Web_Scraper_v0.x','Piffany','http://www.piffany.com/spider.html','Piffany',''),
(834,'Mozilla/5.0 (compatible; EARTHCOM.info/2.01; http://www.earthcom.info)','Earthcom','http://www.earthcom.info','Earthcom',''),
(835,'IlTrovatore/1.2 (IlTrovatore; http://www.iltrovatore.it/bot.html; bot@iltrovatore.it)','IlTrovatore','http://www.iltrovatore.it/bot.html','IlTrovatore',''),
(836,'noyona_0_1','Noyona','http://www.noyona.com/index.pl','Noyona',''),
(837,'Mozilla/4.0 (compatible; MSIE 4.01; Vonna.com b o t)','Vonna.com b o t','http://www.vonna.com/','Vonna',''),
(838,'Mozilla/5.0 (compatible; BecomeJPBot/2.3; MSIE 6.0 compatible; +http://www.become.co.jp/site_owners.html)','BecomeJPBot','http://www.become.co.jp/site_owners.html','Become',''),					
(839,'SearchSight/2.0 (http://SearchSight.com/)','SearchSight','http://SearchSight.com/','SearchSight',''),					
(840,'e-SocietyRobot(http://www.yama.info.waseda.ac.jp/~yamana/es/)','E-SocietyRobot','http://www.yama.info.waseda.ac.jp/~yamana/es/','Yamana Laboratory',''),	
(841,'webbot(+http://webbot.com/bot.htm)','Webbot','http://webbot.com/bot.htm','Webbot',''),
(842,'Crawllybot/0.1 (Crawllybot; +http://www.crawlly.com; crawler@crawlly.com)','Crawllybot','http://www.crawlly.com','Crawlly',''),
(843,'WIRE/0.11 (Linux; i686; Bot,Robot,Spider,Crawler,aromano@cli.di.unipi.it)','WIRE','http://www.unipi.it/english/index.htm','University of Pisa',''),
(844,'larbin_2.6.3 larbin2.6.3@unspecified.mail','Larbin_2.6.3','http://larbin.sourceforge.net/index-eng.html','Unknown',''),
(845,'Mozilla/5.0 (compatible; BecomeBot/3.0; MSIE 6.0 compatible; +http://www.become.com/site_owners.html)','BecomeBot','http://www.become.com/site_owners.html','Become',''),
(846,'findlinks/1.0.9 (+http://wortschatz.uni-leipzig.de/findlinks/)','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),
(847,'SurveyBot/2.3 (Whois Source)','SurveyBot','http://www.domaintools.com/webmasters/surveybot.php','Domaintools',''),
(848,'findlinks/1.1.1-a2 (+http://wortschatz.uni-leipzig.de/findlinks/)','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),
(849,'http://www.almaden.ibm.com/cs/crawler   [hc5]','Almaden','http://www.almaden.ibm.com/cs/crawler/','IBM',''),
(850,'msnbot-media/1.0 (+http://search.msn.com/msnbot.htm)','MSN Bot','http://search.msn.com/msnbot.htm','MSN',''),
(851,'sdcresearchlabs-testbot/0.8-dev (www.shopping.com/bot.html; http://lucene.apache.org/nutch/bot.html; researchbot@shopping.com)','Sdcresearchlabs-testbot','http://www.shopping.com/bot.html','Shopping',''),
(852,'NutchCVS/0.8-dev (Nutch running at UW; http://www.nutch.org/docs/en/bot.html; sycrawl@cs.washington.edu)','NutchCVS/0.8-dev','http://qbert.cs.washington.edu/','University of Washington',''),
(853,'Gigabot/2.0; http://www.gigablast.com/spider.html','Gigabot','http://www.gigablast.com/','Gigablast',''),
(854,'Mozilla/2.0 (compatible; Ask Jeeves/Teoma; http://about.ask.com/en/docs/about/webmasters.shtml)','Ask Jeeves/Teoma','http://about.ask.com/en/docs/about/webmasters.shtml','Ask Jeeves',''),
(855,'Deepindex V2','Deepindex','http://www.deepindex.com/utiliser.html','Deepindex',''),
(856,'Mozilla/5.0 (compatible; Megaglobe Crawler/1.0; http://www.megaglobe.com)','Megaglobe Crawler','http://www.megaglobe.com','Megaglobe',''),
(857,'findlinks/1.1.1-a5 (+http://wortschatz.uni-leipzig.de/findlinks/)','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),
(858,'Mozilla/5.0 (Linux; fr) Firefox (ozMonitor Free)','OzMonitor','http://www.ozmonitor.net/','OzMonitor',''),
(859,'Pompos/1.1 http://dir.com/pompos.html','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(860,'Pompos/1.2 http://dir.com/pompos.html','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(861,'Pompos/1.3 http://dir.com/pompos.html','Pompos','http://www.iliad.fr/','Iliad (Free)',''),
(862,'findlinks/1.1.1 (+http://wortschatz.uni-leipzig.de/findlinks/)','FindLinks','http://wortschatz.uni-leipzig.de/findlinks/','University of Leipzig',''),					
(863,'page_verifier http://www.securecomputing.com/goto/pv','Page_verifier','http://www.securecomputing.com/goto/pv','Securecomputing',''),					
(864,'www.petitsage.fr site detector 0.4','Petitsage','http://www.petitsage.fr/','Petitsage',''),				
(865,'VIPr/0.4 (VIProbot; http://www.vipsolutions.hu; info@vipsolutions.hu)','VIProbot','http://www.vipsolutions.hu','Vipsolutions',''),				
(866,'WebCorp/1.0','WebCorp','http://webcorp.uce.ac.uk/','WebCorp',''),				
(867,'Mozilla/3.0 (INGRID/3.0 MT; webcrawler@NOSPAMexperimental.net; http://webmaster.ilse.nl/jsp/webmaster.jsp)','INGRID','http://webmaster.ilse.nl/jsp/webmaster.jsp','Ilse',''),					
(868,'Mozilla/4.0 compatible ZyBorg/1.0 (wn-16.zyborg@looksmart.net; http://www.WISEnutbot.com)','ZyBorg (Wisenut)','http://www.wisenut.com/','Wisenut',''),
(869,'Snapbot/1.0','Snapbot','http://dev.upian.com/hotlinks/','Hotlinks',''),					
(870,'Mozilla/4.0 (compatible; GPU p2p crawler http://gpu.sourceforge.net/search_engine.php)','GPU p2p crawler','http://gpu.sourceforge.net/search_engine.php','GPU',''),					
(871,'WinkBot/0.06 (Wink.com search engine web crawler; http://www.wink.com/Wink:WinkBot; winkbot@wink.com)','WinkBot','http://www.wink.com/Wink:WinkBot','Wink',''),
(872,'Mozilla/2.0 (compatible; Ask Jeeves/Teoma; +http://about.ask.com/en/docs/about/webmasters.shtml)','Ask Jeeves/Teoma','http://about.ask.com/en/docs/about/webmasters.shtml','Ask Jeeves',''),
(873,'freshmeat.net URL validator/1.1','Freshmeat','http://freshmeat.net/','Freshmeat',''),					
(874,'larbin_2.6.3 marzia.polito@intel.com','Larbin_2.6.3','http://larbin.sourceforge.net/index-eng.html','Unknown',''),
(875,'WEP Search 00','WEP Search','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(876,'Microsoft URL Control - 6.00.8862','Microsoft URL Control','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(877,'Microsoft URL Control - 6.01.9782','Microsoft URL Control','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(878,'Snoopy v1.2','Snoopy','http://sourceforge.net/projects/snoopy/','Unknown',''),
(879,'BuildCMS crawler (http://www.buildcms.com/crawler)','BuildCMS crawler','http://www.buildcms.com','BuildCMS',''),
(880,'Yeti','Yeti','http://www.1noon.com/','1noon',''),	
(881,'W3C-checklink/4.2 [4.20] libwww-perl/5.803','W3C-checklink','http://validator.w3.org/docs/checklink.html','W3C',''),
(882,'Mozilla/5.0 (compatible; Charlotte/1.0b; charlotte@betaspider.com)','Charlotte','http://www.betaspider.com/','Betaspider',''),	
(883,'EuripBot/0.5 (+http://www.eurip.com) PreCheck','EuripBot','http://www.eurip.com','Eurip',''), 	
(884,'Mo College 1.9','Mo College 1.9','http://www.psychedelix.com/agents/index.shtml','Unknown',''),	
(885,'Python-urllib/1.16','Python-urllib','http://www.1noon.com/','Unknown',''),	
(886,'W3C_Validator/1.432.2.10','W3C-Validator','http://validator.w3.org/docs/checklink.html','W3C',''),
(887,'Mozilla/5.0 (compatible; LinksManager.com_bot +http://linksmanager.com/linkchecker.html)','LinksManager.com_bot','http://linksmanager.com/linkchecker.html','Unknown',''),
(888,'IRLbot/2.0 (compatible; MSIE 6.0; http://irl.cs.tamu.edu/crawler)','IRLbot','http://irl.cs.tamu.edu/crawler','Texas A&M University',''),
(889,'Mozilla/5.0 (compatible;archive.org_bot/1.7.1; collectionId=316; Archive-It; +http://www.archive-it.org)','Archive.org_bot','http://www.archive.org/','Archive.org',''),			 	
(890,'exactseek.com','ExactSEEK','http://www.exactseek.com/','ExactSEEK',''),
(891,'BurstFindCrawler/1.1 (crawler.burstfind.com; http://crawler.burstfind.com; crawler@burstfind.com)','BurstFindCrawler','http://crawler.burstfind.com','Burstfind',''),
(892,'EMPAS_ROBOT','EMPAS_ROBOT','http://www.empas.com/','Empas',''),					
(893,'gsa-crawler (Enterprise; GIX-04637; rex_li@trend.com.tw)','Gsa-crawler','http://www.trendmicro.com/tw/home/enterprise.htm','Trendmicro',''),
(894,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; ZoomSpider.net bot; .NET CLR 1.1.4322)','ZoomSpider','http://www.zoomspider.net/','ZoomSpider',''),					
(895,'WebsiteWorth v1.0','WebsiteWorth','http://directory.sootle.com/website-worth/','Sootle',''),
(896,'PictureOfInternet/3.0 (http://www.malfunction.org/poi; erik@malfunction.org)','PictureOfInternet','http://www.malfunction.org/poi','Malfunction',''),
(897,'Mozilla/4.0 (compatible; MSIE 6.0; TargetSeek/1.0; +http://www.targetgroups.net/TargetSeek.html)','TargetSeek','http://www.targetgroups.net/TargetSeek.html','Targetgroups',''),
(898,'Mozilla/5.0 (compatible; DNS-Digger/1.0; +http://www.dnsdigger.com)','DNS-Digger','http://www.dnsdigger.com','Dnsdigger',''),
(899,'CipinetBot/1.0 (http://www.cipinet.com/bot.html)','CipinetBot','(http://www.cipinet.com/bot.html','Cipinet',''),
(900,'Z-Add Link Checker (http://w3.z-add.co.uk/linkcheck/)','Z-Add Link Checker','http://w3.z-add.co.uk/linkcheck/','Z-add',''),
(901,'NaverBot-1.0 (NHN Corp. / +82-31-784-1989 / nhnbot@naver.com)','NaverBot','http://www.naver.co.jp/','Naver',''),
(902,'EmeraldShield.com Web Spider (http://www.emeraldshield.com/webbot.aspx)','EmeraldShield.com Web Spider','http://www.emeraldshield.com/webbot.aspx','Emeraldshield',''),
(903,'HatenaScreenshot/1.0 (checker)','HatenaScreenshot','http://www.hatena.ne.jp/','Hatena',''),
(904,'Search-Engine-Studio','Search-Engine-Studio','http://www.xtreeme.com/search-engine-studio/','Xtreeme',''),
(905,'HatenaScreenshot/1.0 (checker)','HatenaScreenshot','http://www.hatena.ne.jp/','Hatena',''),
(906,'yoono/1.0 web-crawler/1.0','Yoono web-crawler','http://www.yoono.com/','Yoono',''),
(907,'PlantyNet_WebRobot_V1.9 yangsam@plantynet.com','PlantyNet_WebRobot','http://www.plantynet.com/','PlantyNet',''),
(908,'SandCrawler - Compatibility Testing','SandCrawler','http://www.microsoft.com/','Microsoft',''),
(909,'MJ12bot/v1.0.8 (http://majestic12.co.uk/bot.php?+)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''),
(910,'psycheclone','Psycheclone','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(911,'Mozilla/5.0 (Windows;) NimbleCrawler 2.0.0 obeys UserAgent NimbleCrawler For problems contact: crawler@healthline.com','NimbleCrawler','http://www.healthline.com/','Healthline',''),
(912,'NASA Search 1.0','NASA Search 1.0','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(913,'MQbot metaquerier.cs.uiuc.edu/crawler','Metaquerier','http://metaquerier.cs.uiuc.edu/crawler/','University of Illinois',''),
(914,'Honda-Search/0.7.2 (Nutch; http://lucene.apache.org/nutch/bot.html; search@honda-search.com)','Honda-Search','http://www.honda-search.com/','Honda-Search',''),
(915,'Mozilla/3.0 (compatible; ScollSpider; http://www.webwobot.com)','ScollSpider','http://www.webwobot.com','Webwobot',''),
(916,'webmeasurement-bot, http://rvs.informatik.uni-leipzig.de','Webmeasurement-bot','http://rvs.informatik.uni-leipzig.de','University of Leipzig',''),
(917,'Octora Beta Bot - www.octora.com','Octora Beta Bot','http://www.octora.com','Octora',''),
(918,'KSbot/1.0 (KnowledgeStorm crawler; http://www.knowledgestorm.com/resources/content/crawler/index.html; crawleradmin@knowledgestorm.com)','KSbot','http://www.knowledgestorm.com/resources/content/crawler/index.html','Knowledgestorm',''),
(919,'Blaiz-Bee/2.00.5502 (+http://www.blaiz.net)','Blaiz-Bee','http://www.blaiz.net','Blaiz',''),
(920,'MaSagool/1.0 (MaSagool; http://sagool.jp/; info@sagool.jp)','MaSagool','http://sagool.jp','Sagool',''),
(921,'cometrics-bot, http://www.cometrics.de','Cometrics-bot','http://www.cometrics.de','Cometrics',''),
(922,'StackRambler/2.0 (MSIE incompatible)','StackRambler','http://www.rambler.ru/doc/robots.shtml','Rambler',''),
(923,'HeinrichderMiragoRobot (http://www.miragorobot.com/scripts/deinfo.asp)','HeinrichderMiragoRobot','http://www.miragorobot.com/scripts/deinfo.asp','Mirago',''),
(924,'gonzo2[P] mailto:crawleradmin.t-info@telekom.de','Gonzo2','http://www.suchen.de/','T-info',''),
(925,'Exabot-Test/1.0','Exabot','http://www.exalead.com/search','Exalead',''),
(926,'eruvo-bot 4.8.1 (http://www.eruvo.com)','Eruvo-bot','http://www.eruvo.com','Eruvo',''),
(927,'Missigua Locator 1.9','Missigua Locator 1.9','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(928,'BeijingCrawler','BeijingCrawler','http://www.psychedelix.com/agents/index.shtml','Unknown',''),
(929,'Links4US-Crawler, (+http://links4us.com/)','Links4US-Crawler','http://links4us.com/','Links4US',''),
(930,'Mozilla/5.0 (compatible; MojeekBot/2.0; http://www.mojeek.com/bot.html)','MojeekBot','http://www.mojeek.com/bot.html','Mojeek',''),
(931,'Visbot/1.0 (+http://www.visvo.com/bot.html;bot@visvo.com)','Visbot','http://www.visvo.com/bot.html','Visvo',''),
(932,'gonzo1[P] mailto:crawleradmin.t-info@telekom.de','Gonzo2','http://www.suchen.de/','T-info',''),
(933,'my-bytebot/1.0 (+http://spider.my-byte.de/info)','My-bytebot','http://spider.my-byte.de/info','My-byte',''),
(934,'Gaisbot/3.0+(robot06@gais.cs.ccu.edu.tw;+http://gais.cs.ccu.edu.tw/robot.php)','Gaisbot','http://gais.cs.ccu.edu.tw/robot.php','Gais',''),
(935,'Mozilla/4.0 (compatible; Yahoo Japan; for robot study; kasugiya)','Yahoo Japan robot','http://www.yahoo.co.jp/','Yahoo Japan',''),
(936,'envolk/1.7 (+http://www.envolk.com/envolkspiderinfo.php)','Envolkspider','http://www.envolk.com/envolkspiderinfo.html','Envolk',''), 
(937,'ShopWiki/1.0 ( +http://www.shopwiki.com/wiki/Help:Bot)','ShopWiki','http://www.shopwiki.com/wiki/Help:Bot','ShopWiki',''),
(938,'Mozilla/5.0 (compatible; heritrix/1.6.0 http://www.worio.com/)','Worio','http://www.worio.com/','Worio',''),
(939,'MetagerBot/0.8-dev (MetagerBot; http://metager.de; )','MetagerBot','http://metager.de','Metager',''),
(940,'WebAlta Crawler/1.3.15 (http://www.webalta.ru/bot.html) (Windows; U; Windows NT 5.1; ru-RU)','WebAlta Crawler','http://www.webalta.ru/bot.html','WebAlta',''),
(941,'WebAlta Crawler/1.3.18 (http://www.webalta.net/ru/about_webmaster.html) (Windows; U; Windows NT 5.1; ru-RU)','WebAlta Crawler','http://www.webalta.ru/bot.html','WebAlta',''),
(942,'updated/0.1-alpha (updated crawler; http://www.updated.com; crawler@updated.com)','Updated crawler','http://www.updated.com/','Updated',''),
(943,'traazibot/testengine (+http://www.traazi.de)','Traazibot','http://www.traazi.de','Traazi',''),
(944,'http://www.trendtech.dk/spider.asp)','TrendTech','http://www.trendtech.dk/spider.asp','TrendTech',''),
(945,'Yahoo-Test/4.0','Yahoo-Test/4.0','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),					
(946,'asked/Nutch-0.8 (web crawler; http://asked.jp; epicurus at gmail dot com)','Asked','http://asked.jp','Asked',''),					 
(947,'zedzo.digest/0.1 (http://www.zedzo.com/)','Zedzo.digest','http://www.zedzo.com/','Zedzo',''),					
(948,'VMBot/0.7.2 (VMBot; http://www.VerticalMatch.com/; vmbot@tradedot.com)','VMBot','http://www.VerticalMatch.com/','VerticalMatch',''),					
(949,'BilgiBetaBot/0.8-dev (bilgi.com (Beta) ; http://lucene.apache.org/nutch/bot.html; nutch-agent@lucene.apache.org)','BilgiBetaBot','http://www.bilgi.com','Bilgi',''),
(950,'YooW!/1.8.9 RC1 (+http://www.yoow.eu)','YooW!','http://www.yoow.eu','YooW!',''),
(951,'192.comAgent','192.com','http://www.192.com/','192.com',''),
(952,'Slurpy Verifier/1.0','Slurpy Verifier','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(953,'WebarooBot (Webaroo Bot; http://64.124.122.252/feedback.html)','WebarooBot','http://www.webaroo.com/','Webaroo',''),
(954,'YahooFeedSeeker/2.0 (compatible; Mozilla 4.0; MSIE 5.5; http://publisher.yahoo.com/rssguide)','YahooFeedSeeker','http://help.yahoo.com/help/us/ysearch/slurp','Yahoo',''),
(955,'Flapbot/0.7.2 (Flaptor Crawler; http://www.flaptor.com; crawler at flaptor period com)','Flapbot','http://www.flaptor.com','Flaptor',''),
(956,'Siigle Orumcex v.001 Turkey (http://www.siigle.com)','Siigle Orumcex','http://www.siigle.com','Siigle',''),
(957,'NG-Search/0.90 (NG-SearchBot; http://www.ng-search.com; )','NG-SearchBot','http://www.ng-search.com','NG-Search',''),	
(958,'Speedy Spider (Entireweb; Beta/1.0; http://www.entireweb.com/about/search_tech/speedyspider/)','Speedy Spider','http://www.entireweb.com/about/search_tech/speedyspider/','Entireweb',''),
(959,'ozelot/2.7.3 (Search engine indexer; www.flying-cat.de/ozelot; ozelot@flying-cat.de)','Ozelot','http://www.flying-cat.de/ozelot','Flying-cat',''),
(960,'A1 Sitemap Generator/1.0 (+http://www.micro-sys.dk/products/sitemap-generator/) miggibot/2006.01.24','Miggibot','http://www.micro-sys.dk/developer/miggibot/','Micro-sys',''),
(961,'Strategic Board Bot (+http://www.strategicboard.com)','Strategic Board Bot','http://www.strategicboard.com','Strategic Board',''),
(962,'Accoona-AI-Agent/1.1.2 (aicrawler at accoonabot dot com)','Aicrawler','http://www.accoona.com/','Accoona',''),
(963,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0; ODP entries t_st; http://tuezilla.de/t_st-odp-entries-agent.html)','T�zilla','http://tuezilla.de/','T�zilla',''),
(964,'i1searchbot/2.0 (i1search web crawler; http://www.i1search.com; crawler@i1search.com)','I1searchbot','http://www.i1search.com','I1search',''),
(965,'Mozilla/5.0 (compatible;MAINSEEK_BOT)','Mainseek_Bot','http://www.mainseek.com/','Mainseek',''),
(966,'factbot : http://www.factbites.com/robots','Factbot','http://www.factbites.com/robots','Factbites',''),
(967,'Searchmee! Spider v0.98a','Searchmee! Spider','http://www.searchmee.com/','Searchmee!',''),
(968,'Mozilla/4.0 (compatible; Vagabondo/4.0Beta; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/)','Vagabondo','http://webagent.wise-guys.nl/','WiseGuys',''),
(969,'ilial/Nutch-0.9-dev','Ilial/Nutch','http://www.ucla.edu/','University of California',''),
(970,'FuchsBot +http://www.fuchsbot.tld','FuchsBot','http://www.fuchsbot.tld','FuchsBot',''),
(971,'Nelian Pty Ltd - Spider v2.1 ( http://pcaccessoriesparts.com )','Nelian Pty Ltd - Spider','http://pcaccessoriesparts.com','Pcaccessoriesparts',''),
(972,'Jyxobot/1','Jyxobot','http://www.jyxo.com/','Jyxo',''),
(973,'Theme Spider (+http://www.themespider.com/spider.html)','Theme Spider','http://www.themespider.com/spider.html','Themespider',''),
(974,'Exabot/3.0','Exabot','http://www.exalead.com/search','Exalead',''),
(975,'yacybot (i386 Linux 2.6.17-gentoo-r7; java 1.5.0_08; GMT/en) yacy.net','Yacybot','http://www.yacy.net','Anomic Consulting',''),
(976,'yacybot (i386 Linux 2.6.17-2-686; java 1.5.0_06; Europe/de) yacy.net','Yacybot','http://www.yacy.net','Anomic Consulting',''),
(977,'Mozilla/5.0 (compatible; vlad/1.1; +http://www.freshnotes.com/vlad.html)','Vlad','http://www.freshnotes.com/vlad.html','Freshnotes',''),
(978,'SiteBar/3.3.8 (Bookmark Server; http://sitebar.org/)','SiteBar','http://sitebar.org/','SiteBar',''),
(979,'Shim-Crawler(Mozilla-compatible; http://www.logos.ic.i.u-tokyo.ac.jp/crawl/; crawl@logos.ic.i.u-tokyo.ac.jp)','Shim-Crawler','http://www.logos.ic.i.u-tokyo.ac.jp/crawler/','University of Tokyo',''),
(980,'Google-Sitemaps/1.0','Google-Sitemaps','http://www.google.com/webmasters/bot.html','Google',''),
(981,'MSRBOT (http://research.microsoft.com/research/sv/msrbot/)','MSRBot','http://research.microsoft.com/research/sv/msrbot/','Microsoft',''),
(982,'Mozilla/4.0 (compatible;  Vagabondo/4.0Beta; webcrawler at wise-guys dot nl; http://webagent.wise-guys.nl/; http://www.wise-guys.nl/)','Vagabondo','http://webagent.wise-guys.nl/','WiseGuys',''),
(983,'gonzo1[P] +http://www.suchen.de/popups/faq.jsp','Gonzo1','http://www.suchen.de/','T-info',''),
(984,'sproose/1.0beta (sproose bot; http://www.sproose.com/bot.html; crawler@sproose.com)','Sproose','http://www.sproose.com/bot.html','Sproose',''),
(985,'CydralSpider/2.2 (Cydral Image Search; http://www.cydral.com)','CydralSpider','http://www.cydral.com','Cydral',''),
(986,'Factbot 1.09 (see http://www.factbites.com/webmasters.php)','Factbot','http://www.factbites.com/robots','Factbites',''),
(987,'Webster v0.3 ( http://webster.healeys.net/ )','Webster','http://webster.healeys.net/','Webster.healeys',''),
(988,'msnbot-Products/1.0 (+http://search.msn.com/msnbot.htm)','MSN Bot','http://search.msn.com/msnbot.htm','MSN',''),
(989,'ICCrawler - ICjobs (http://www.icjobs.de/bot.htm)','ICCrawler','http://www.iccenter.net/','ICCenter',''),
(990,'MQbot http://metaquerier.cs.uiuc.edu/crawler','Metaquerier','http://metaquerier.cs.uiuc.edu/crawler/','University of Illinois',''),
(991,'silk/1.0','Silk/1.0','http://www.slider.com/index.html','Slider',''),
(992,'holmes/3.9 (OnetSzukaj/5.0; +http://szukaj.onet.pl)','Holmes','http://szukaj.onet.pl','Szukaj.onet',''),
(993,'Verzamelgids/2.2 (http://www.verzamelgids.nl)','Verzamelgids','http://www.verzamelgids.nl','Verzamelgids',''),
(994,'TCDBOT/Nutch-0.8 (PhD student research;\"http://www.tcd.ie; mcgettrs at t c d dot IE)\"','TCDBOT','http://www.tcd.ie/','Trinity College Dublin',''),
(995,'Seekbot/1.0 (http://www.seekbot.net/bot.html) HTTPFetcher/2.2','Seekbot','http://www.seekbot.net/bot.html','SeekPort',''),
(996,'FAST Enterprise Crawler 6 used by BilBasen ApS (michael@bilinfo.dk)','BilBasen','http://www.bilinfo.dk/','Bilinfo',''),
(997,'Mozilla/5.0 (compatible; CjLogbot 1.0; +http://www.cjlog.com/bot)','CjLogbot','http://www.cjlog.com','CjLog',''),
(998,'ExaBotTest/2.0','Exabot','http://www.exalead.com/search','Exalead',''),
(999,'SygolBot http://www.sygol.com','SygolBot','http://www.sygol.com','Sygol',''),
(1000,'wwwster/1.4 (Beta, mailto:gue@cis.uni-muenchen.de)','Wwwster','http://www.cis.uni-muenchen.de/','Centrum f�r Informations- und Sprachverarbeitung',''),
(1001,'MQBOT/Nutch-0.9-dev (MQBOT Nutch Crawler; http://falcon.cs.uiuc.edu; mqbot@cs.uiuc.edu)','MQBOT','http://falcon.cs.uiuc.edu; mqbot@cs.uiuc.edu','University of Illinois',''),
(1002,'SearchdayBot','SearchdayBot','http://www.searchday.de/','Searchday',''),
(1003,'NutchEC2Test/Nutch-0.9-dev (Testing Nutch on Amazon EC2.; http://lucene.apache.org/nutch/bot.html; ec2test at lucene.com) ','NutchEC2Test','http://www.amazon.com/b/ref=sc_fe_l_2/104-6713356-1433533?ie=UTF8&node=201590011&no=3435361&me=A36L942TSJ2AJA','Amazon',''),
(1004,'Y!J-SRD/1.0','Yahoo Japan robot','http://www.yahoo.co.jp/','Yahoo Japan',''),
(1005,'DoCoMo/2.0/SO502i (compatible; Y!J-SRD/1.0; http://help.yahoo.co.jp/help/jp/search/indexing/indexing-27.html)','Yahoo Japan robot','http://www.yahoo.co.jp/','Yahoo Japan',''),
(1006,'ScholarUniverse/0.8 (Nutch;+http://scholaruniverse.com/bot.jsp; fetch-agent@scholaruniverse.com)','ScholarUniverse','http://scholaruniverse.com/bot.jsp','ScholarUniverse',''),
(1007,'GurujiBot/1.0 (+http://www.guruji.com/WebmasterFAQ.html)','GurujiBot','http://www.guruji.com/en/WebmasterFAQ.html','Guruji',''),
(1008,'CydralSpider/2.4 (Cydral Image Search; http://www.cydral.com)','CydralSpider','http://www.cydral.com','Cydral',''),
(1009,'UOLCrawler (soscrawler@uol.com.br)','UOLCrawler','http://www.uol.com.br/','UOL',''),
(1010,'Mozilla/4.0 (compatible; NaverBot/1.0; http://help.naver.com/delete_main.asp)','NaverBot','http://www.naver.co.jp/','Naver',''),
(1011,'WeRelateBot/0.9 (WeRelate; http://www.werelate.org/wiki/WeRelate:Bot; dallan@werelate.org)','WeRelateBot','http://www.werelate.org/wiki/WeRelate:Bot','WeRelate',''),
(1012,'Catall-Spider/3.3.3(www.Catall.de)','Catall-Spider','http://www.Catall.de','Catall',''),
(1013,'FAST Enterprise Crawler 6 used by Pages Jaunes (pvincent@pagesjaunes.fr)','Pages Jaunes','http://www.pagesjaunes.fr/','Pages Jaunes',''),
(1014,'iaskspider2 (iask@staff.sina.com.cn)','Iaskspider2','http://iask.com/','Sina',''),
(1015,'Mozilla/5.0 (compatible; heritrix/1.8.0 +http://www.accelobot.com)','Accelobot','http://www.accelobot.com/','Accelovation',''),					
(1016,'Bigsearch.ca/Nutch-0.9-dev (Bigsearch.ca Internet Spider; http://www.bigsearch.ca/; info@enhancededge.com) ','Bigsearch','http://www.bigsearch.ca/','Bigsearch',''),
(1017,'UKWizz/Nutch-0.8.1 (UKWizz Nutch crawler; http://www.ukwizz.com/) ','UKWizz','http://www.ukwizz.com/','UKWizz',''), 
(1018,'Yandex/1.01.001 (compatible; Win16; I)','Yandex','http://www.yandex.ru/','Yandex',''),
(1019,'FAST Enterprise Crawler 6 used by Pages Jaunes (crawladmin@gmail.com)','Pages Jaunes','http://www.pagesjaunes.fr/','Pages Jaunes',''), 
(1020,'SBIder/SBIder-0.8.2-dev (http://www.sitesell.com/sbider.html)','SBIder','http://www.sitesell.com/sbider.html','Sitesell',''),
(1021,'Feedster Crawler/3.0; Feedster, Inc.','Feedster Crawler','http://www.feedster.com/','Feedster',''), 
(1022,'MJ12bot/v1.1.1 (http://majestic12.co.uk/bot.php?+)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''),
(1023,'PluckFeedCrawler/2.0 (compatible; Mozilla 4.0; MSIE 5.5; http://www.pluck.com; 1 subscribers)','PluckFeedCrawler','http://www.pluck.com','Pluck',''), 
(1024,'wadaino.jp-crawler 0.2 (http://wadaino.jp/)','Wadaino.jp-crawler','http://wadaino.jp/','Wadaino',''), 
(1025,'RoboCrawl (http://www.canadiancontent.net)','CanadianContent Search','http://www.canadiancontent.net/','CanadianContent',''),
(1026,'Mozilla/4.0 (compatible; MSIE is not me; DAUMOA/1.0.0; DAUM Web Robot; Daum Communications Corp., Korea)','DAUM Web Robot','http://info.daum.net/kor/main.jsp','Daum',''),
(1027,'Twiceler www.cuill.com/twiceler/robot.html','Twiceler','http://www.cuill.com/twiceler/robot.html','Cuill',''),
(1028,'Szukacz/1.5 (robot; www.szukacz.pl/html/jak_dziala_robot.html; info@szukacz.pl)','Szukacz','http://www.szukacz.pl/html/RobotEnglishVersion.html','Szukacz',''),
(1029,'Mozilla/4.0 (compatible; DepSpid/5.03; +http://about.depspid.net)','DepSpid','http://about.depspid.net','DepSpid',''),
(1030,'PlantyNet_WebRobot_V1.9 dhkang@plantynet.com','PlantyNet_WebRobot','http://www.plantynet.com/','PlantyNet',''),
(1031,'favo.eu crawler/0.6 (http://www.favo.eu)','Favo.eu crawler','http://www.favo.eu/','Favo',''),
(1032,'Gromit/1.0','Gromit','http://www2.austlii.edu.au/~dan/gromit/','Australasian Legal Information Institute',''),
(1033,'BlogSearch/1.x +http://www.icerocket.com/','BlogSearch','http://www.icerocket.com/','Icerocket',''),
(1034,'YodaoBot/1.0 (http://www.yodao.com/help/webmaster/spider/; )','YodaoBot','http://www.yodao.com/help/webmaster/spider/','Yodao',''),
(1035,'Execrawl/1.0 (Execrawl; http://www.execrawl.com/; bot@execrawl.com)','Execrawl','http://www.execrawl.com/','Execrawl',''),
(1036,'MJ12bot/v1.1.2 (http://majestic12.co.uk/bot.php?+)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''), 
(1037,'Mozilla/4.0 (compatible; MyFamilyBot/1.0; http://www.ancestry.com/learn/bot.aspx; SearchBot@MyFamilyInc.com)','MyFamilyBot','http://www.ancestry.com/learn/bot.aspx','Ancestry',''), 
(1038,'Pingdom GIGRIB v1.1 (http://www.pingdom.com)','Pingdom','http://www.pingdom.com','Pingdom',''), 
(1039,'Feed24.com','Feed24','http://www.feed24.com/','Feed24',''), 
(1040,'StackRambler/2.0','StackRambler','http://www.rambler.ru/doc/robots.shtml','Rambler',''), 
(1041,'Vacobot; (+http://vaco.ws/bot.html)','Vacobot','http://vaco.ws/bot.html','Vaco',''),
(1042,'SGH-Z130 SHP/VPP/R5 SMB3.1 SMM-MMS/1.1.0 profile/MIDP-2.0 configuration/CLDC-1.0 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''), 
(1043,'Mozilla/5.0 (compatible; Webbot/0.1; http://www.webbot.ru/bot.html)','Webbot','http://www.webbot.ru/bot.html','Webbot',''),
(1044,'Mozilla/4.0 (compatible; MSIE is not me; DAUMOA/1.0.1; DAUM Web Robot; Daum Communications Corp., Korea)','DAUM Web Robot','http://info.daum.net/kor/main.jsp','Daum',''),					
(1045,'gamekitbot/1.0 (+http://www.uchoose.de/crawler/gamekitbot/)','Gamekitbot','http://www.uchoose.de/crawler/gamekitbot/','Uchoose',''),
(1046,'Qweery_robot.txt_CheckBot/3.01 (http://qweerybot.qweery.com)','Qweerybot','http://qweerybot.qweery.com','Qweery',''),
(1047,'QweeryBot/3.01 ( http://qweerybot.qweery.nl)','Qweerybot','http://qweerybot.qweery.com','Qweery',''),
(1048,'Mozilla/5.0 (compatible; egothor/8.0g; +http://ego.ms.mff.cuni.cz/)','Egothor','http://ego.ms.mff.cuni.cz/','Charles University in Prague',''),
(1049,'jeanie/3.3.3(www.sidedc.net/;compatible;MSIE 6.0;Windows NT 5.51)','Jeanie','http://spider.sidedc.net/eng/index.html','Sidedc',''),
(1050,'eApolloBot/1.0 (eApollo search engine robot; http://www.eapollo.com; eapollo at global-opto dot com)','EApolloBot','http://www.eapollo.com','EApollo',''),
(1051,'NextGenSearchBot 1 (for information visit http://www.zoominfo.com/NextGenSearchBot)','NextGenSearchBot','http://www.zoominfo.com/NextGenSearchBot','Zoominfo',''),                   
(1052,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; Mirar Search Indexing Agent see getmirar.com)','Mirar','http://www.mirarsearch.com/','Mirar',''),
(1053,'Fooky.com/ScorpionBot/ScoutOut;http://www.fooky.com/scorpionbots','ScorpionBot','http://www.fooky.com/scorpionbots','Fooky',''),
(1054,'ExaBotTest/3.0','Exabot','http://www.exalead.com/search','Exalead',''),
(1055,'Shim-Crawler(NICT)(Mozilla-compatible; http://www.logos.ic.i.u-tokyo.ac.jp/crawler/; crawler@logos.ic.i.u-tokyo.ac.jp)','Shim-Crawler','http://www.logos.ic.i.u-tokyo.ac.jp/crawler/index.en.html','Chikayama-Taura laboratory',''),
(1056,'NetResearchServer/4.0(loopimprovements.com/robot.html)','NetResearchServer','http://loopimprovements.com/robot.html','Loopimprovements',''),
(1057,'holmes/3.10.1 (OnetSzukaj/5.0; +http://szukaj.onet.pl)','Holmes','http://szukaj.onet.pl','Szukaj.onet',''),
(1058,'SietsCrawler/1.1 (+http://www.siets.biz)','SietsCrawler','http://www.siets.biz','Siets',''),
(1059,'Mozilla/5.0 (compatible; Yoono; http://www.yoono.com/)','Yoono','http://www.yoono.com/','Yoono',''),
(1060,'OpenISearch/1.x (www.openisearch.com)','OpenISearch','http://www.openisearch.com','OpenISearch',''),                    
(1061,'Mozilla/4.0 (compatible; MSIE 6.0 compatible; Asterias Crawler v4; +http://www.singingfish.com/help/spider.html; webmaster@singingfish.com); SpiderThread  Revision: 3.11','Asterias Crawler','http://search.singingfish.com/sfw/home.jsp','Singingfish',''),
(1062,'VMBot/0.9 (VMBot; http://www.verticalmatch.com; vmbot@tradedot.com)','VMBot','http://www.VerticalMatch.com/','VerticalMatch',''),
(1063,'TelenetDigger/1.0; htdig/3.1.6 (webdev@staff.telenet.be)','TelenetDigger','http://www.telenet.be','Telenet',''),
(1064,'LG-C1500 UP.Browser/6.2.3 (GUI) MMP/1.0 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1065,'Nokia9500 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1066,'MOT-V975/81.33.02I MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1067,'Nokia6682/2.0 (3.01.1) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1068,'SonyEricssonP910c/R2A SEMC-Browser/Symbian/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.0 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1069,'MOT-V975/81.33.02I MIB/2.2.1 Profile/MIDP-2.0 Configuration/CLDC-1.1 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1070,'LG-C1500 UP.Browser/6.2.3 (GUI) MMP/1.0 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1071,'Nokia6682/2.0 (3.01.1) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1072,'Nokia6682/2.0 (3.01.1) SymbianOS/8.0 Series60/2.6 Profile/MIDP-2.0 configuration/CLDC-1.1 UP.Link/6.3.0.0.0 (compatible;YahooSeeker/M1A1-R2D2;http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1073,'SonyEricssonP910c/R2A SEMC-Browser/Symbian/3.0 Profile/MIDP-2.0 Configuration/CLDC-1.0 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1074,'SIE-SX1/05 UP.Browser/7.0.0.1.181 (GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 (compatible;YahooSeeker/M1A1-R2D2; http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1075,'SGH-Z130 SHP/VPP/R5 SMB3.1 SMM-MMS/1.1.0 profile/MIDP-2.0 configuration/CLDC-1.0 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1076,'SIE-SX1/05 UP.Browser/7.0.0.1.181 (GUI) MMP/2.0 Profile/MIDP-2.0 Configuration/CLDC-1.1 (compatible;YahooSeeker/M1A1-R2D2;mobile-search-customer-care AT yahoo-inc dot com)','YahooSeeker/M1A1-R2D2','http://help.yahoo.com/help/us/ysearch/crawling/crawling-01.html','Yahoo',''),
(1077,'worio heritrix bot (+http://worio.com/)','Worio heritrix bot','http://worio.com/','Worio',''),
(1078,'Metaeuro Web Crawler/0.2 (MetaEuro Web Search Clustering Engine; http://www.metaeuro.com; crawler at metaeuro dot com)','Metaeuro Web Crawler','http://www.metaeuro.com','Metaeuro',''),
(1079,'MJ12bot/v1.2.0 (http://majestic12.co.uk/bot.php?+)','MJ12bot','http://www.majestic12.co.uk/projects/dsearch/mj12bot.php','Majestic 12',''),
(1080,'Mozilla/5.0 (compatible; Kyluka crawl; http://www.kyluka.com/crawl.html; crawl@kyluka.com)','Kyluka crawl','http://www.kyluka.com/crawl.html','Kyluka',''),
(1081,'ICC-Crawler(Mozilla-compatible; http://kc.nict.go.jp/icc/crawl.html; icc-crawl(at)ml(dot)nict(dot)go(dot)jp)','ICC-Crawler','http://kc.nict.go.jp/icc/crawl.html','NICT',''),
(1082,'Mozilla/5.0 (compatible; Ask Jeeves/Teoma; +http://about.ask.com/en/docs/about/webmasters.shtml)','Ask Jeeves/Teoma','http://about.ask.com/en/docs/about/webmasters.shtml','Ask Jeeves',''),
(1083,'RedBot/redbot-1.0 (Rediff.com Crawler; redbot at rediff dot com)','RedBot','http://www.rediff.com/','Rediff',''),
(1084,'PageBitesHyperBot/600 (http://www.pagebites.com/)','PageBitesHyperBot','http://www.pagebites.com/','PageBites',''),
(1085,'NG-Search/0.9.8 (http://www.ng-search.com)','NG-SearchBot','http://www.ng-search.com','NG-Search',''),
(1086,'FAST Enterprise Crawler 6 used by Pages Jaunes (fastadmin@pagesjaunes.fr)','Pages Jaunes','http://www.pagesjaunes.fr/','Pages Jaunes',''),
(1087,'BilgiBot/1.0(beta) (http://www.bilgi.com/; bilgi at bilgi dot com)','BilgiBot','http://www.bilgi.com','Bilgi',''),
(1088,'Mozilla/5.0 (compatible; Exabot Test/3.0; +http://www.exabot.com/go/robot)','Exabot','http://www.exalead.com/search','Exalead',''),
(1089,'Topodia/1.2-dev (Topodia - Crawler for HTTP content indexing; http://www.topodia.com/; support@topodia.com)','Topodia','http://www.topodia.com/','Topodia',''),
(1090,'Mozilla/5.0 (compatible; heritrix/1.10.2 +http://i.stanford.edu/)','InfoLab robot','http://i.stanford.edu/','Stanford University',''),
(1091,'Mozilla/5.0 (compatible; PalmeraBot; http://www.links24h.com/help/palmera) Version 0.001','PalmeraBot','http://www.links24h.com/help/palmera','Links24h',''),
(1092,'SmiffyDCMetaSpider/1.0','SmiffyDCMetaSpider','http://www.smiffysplace.com/smiffydcmetaspider','Smiffysplace',''),
(1093,'Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; QihooBot 1.0 qihoobot@qihoo.net)','QihooBot','http://www.qihoo.com/','Qihoo',''),
(1094,'jongaimpi/2.10 (jonga; http://www.jonga.co.za; info@jonga.co.za)','Jongaimpi','http://www.jonga.co.za','Jonga',''),                   
(1095,'MetaGer_PreChecker0.1','MetaGer_PreChecker','http://www.metager.de/','MetaGer',''),                    
(1096,'Mozilla/5.0 (compatible; Charlotte/1.0b; http://www.searchme.com/support/)','Charlotte','http://www.searchme.com/support/','Searchme',''),
(1097,'ScollSpider/2.0 (+http://www.webwobot.com/ScollSpider.php)','ScollSpider','http://www.webwobot.com','Webwobot',''),
(1098,'Semager/1.0 (http://www.semager.de)','Semager','http://www.semager.de','Semager',''),
(1099,'Blogdimension/Alpha2 (Blogdimension BlogBot; http://www.blogdimension.com)','Blogdimension BlogBot','http://www.blogdimension.com','Blogdimension',''),
(1100,'QweeryBot/3.02 ( http://qweerybot.qweery.nl)','Qweerybot','http://qweerybot.qweery.com','Qweery',''),
(1101,'IRLbot/3.0 (compatible; MSIE 6.0; http://irl.cs.tamu.edu/crawler)','IRLbot','http://irl.cs.tamu.edu/crawler','Texas A&M University',''),
(1102,'Nebulla/V1.0 Spider (http://spider.nebulla.de)','Nebulla','http://spider.nebulla.de','Nebulla',''),
(1103,'Mozilla/5.0 (compatible; arabulbot/1.1; +http://www.arabul.com/bot.html)','Arabulbot','http://www.arabul.com','Arabul',''),
(1104,'CloakDetect/0.9 (+http://fulltext.seznam.cz/)','CloakDetect','http://fulltext.seznam.cz/','Seznam',''),
(1105,'DataFountains/DMOZ Feature Vector Corpus Creator (http://ivia.ucr.edu/useragents.shtml)','DataFountains','http://infomine.ucr.edu/','University of California',''),
(1106,'Weblog Attitude Diffusion 1.0','Weblog Attitude Diffusion','http://www.user-agents.org/agents/weblogattitude.shtml','Los Alamos National Laboratory',''),
(1107,'Mozilla/5.0 (compatible; worio bot heritrix/1.10.0 +http://worio.com)','Worio bot','http://worio.com','Worio',''),
(1108,'Blaiz-Bee/2.00.8222 (BE Internet Search Engine http://www.rawgrunt.com)','BE Internet Search Engine','http://www.rawgrunt.com','Rawgrunt',''),
(1109,'Mozilla/5.0 (compatible; AboutUsBot/0.9; +http://www.aboutus.org/AboutUsBot)','AboutUsBot','http://www.aboutus.org/AboutUsBot','AboutUs',''),
(1110,'CazoodleBot/0.1 (CazoodleBot Crawler; http://www.cazoodle.com; mqbot@cazoodle.com)','CazoodleBot','http://www.cazoodle.com','Cazoodle',''),
(1111,'Mozilla/4.0 (vBSEO; http://www.vbseo.com)','VBSEO','http://www.vbseo.com','VBSEO',''),
(1112,'Melbot WebSpider & RSS News Crawler www.melbot.info (V.2.42 by A.I.C.E.)','Melbot WebSpider','http://www.melbot.info','Melbot',''),
(1113,'Baiduspider+(+http://www.baidu.com/search/spider_jp.html)','Baiduspider','http://www.baidu.com/search/spider.htm','Baidu.com',''),
(1114,'Mozilla/5.0 (compatible; Exabot-Images/3.0; +http://www.exabot.com/go/robot)','Exabot-Images','http://www.exalead.com/search','Exalead',''),
(1115,'NextGenSearchBot 1 (for information visit http://about.zoominfo.com/About/NextGenSearchBot.aspx)','NextGenSearchBot','http://www.zoominfo.com/NextGenSearchBot','Zoominfo',''), 
(1116,'RufusBot (Rufus Web Miner; http://www.webaroo.com/rooSiteOwners.html)','RufusBot','http://www.webaroo.com/','Webaroo',''), 
(1117,'Mozilla/5.0 (Windows; U; Windows NT 5.1; fr; rv:1.8.1) VoilaBot BETA 1.2 (http://www.voila.com/)','VoilaBot','http://www.voila.com/','Voila',''),
(1118,'iSEEKbot/iSEEKbot-0.9-dev (http://beta.iseek.com/iseekbot.html; bot at iseek dot com)','Iseekbot','http://beta.iseek.com/iseekbot.html','Iseek',''), 
(1119,'Yeti/0.01 (nhn/1noon, yetibot@naver.com, check robots.txt daily and follows it)','Yeti','http://www.1noon.com/','1noon',''),
(1120,'SiteTruth.com site rating system','SiteTruth','http://www.sitetruth.com/','SiteTruth',''),
(1121,'Mozilla/5.0 (compatible; heritrix/@VERSION@ +http://vermut.aol.com)','Vermut','http://vermut.aol.com','AOL',''),                    
(1122,'SynooBot/Mozilla/5.0 (compatible; Synoobot/0.9; http://www.synoo.com/search/bot.html)','SynooBot','http://www.synoo.com/search/bot.html','Synoo',''),                    
(1123,'VisBot/2.0 (Visvo.com Crawler; http://www.visvo.com/bot.html; bot@visvo.com)','Visbot','http://www.visvo.com/bot.html','Visvo',''),
(1124,'Mozilla/5.0 (compatible; Synoobot/0.9; http://www.synoo.com/search/bot.html)','SynooBot','http://www.synoo.com/search/bot.html','Synoo',''),                 
(1125,'MSRBOT (http://research.microsoft.com/research/sv/msrbot)','MSRBOT','http://research.microsoft.com/research/sv/msrbot','Microsoft',''),
(1126,'Speedy Spider (Entireweb; Beta/1.1; http://www.entireweb.com/about/search_tech/speedyspider/)','Speedy Spider','http://www.entireweb.com/about/search_tech/speedyspider/','Entireweb',''),
(1127,'kicktooBotV1.1 kictooBot@kictoo.com','KicktooBot','http://www.kictoo.com/','Kicktoo',''),
(1128,'Mozilla/5.0 (compatible; SiteBaseBot/1.0;  http://dir.sitebase.ru)','SiteBaseBot','http://dir.sitebase.ru','SiteBase',''),
(1129,'Twiceler-0.9 http://www.cuill.com/twiceler/robot.html','Twiceler','http://www.cuill.com/twiceler/robot.html','Cuill',''),
(1130,'WebarooBot (Webaroo Bot; http://www.webaroo.com/rooSiteOwners.html)','WebarooBot','http://www.webaroo.com/','Webaroo',''),
(1131,'Moreoverbot/5.00 (+http://www.moreover.com)','Moreoverbot','http://www.moreover.com','Moreover',''),
(1132,'Mozilla/5.0 (Twiceler-0.9 http://www.cuill.com/twiceler/robot.html)','Twiceler','http://www.cuill.com/twiceler/robot.html','Cuill',''),
(1133,'metatagsdir/0.7 (+http://metatagsdir.com/directory/)','Metatagsdir','http://metatagsdir.com/directory/','Metatagsdir',''),
(1134,'yggdrasil/Nutch-0.9 (yggdrasil biorelated search engine; www dot biotec dot tu minus dresden do de slash schroeder; heiko dot dietze at biotec dot tu minus dresden dot de)','Yggdrasil','http://gopubmed.biotec.tu-dresden.de/','GoPubMed',''),
(1135,'Steeler/3.3 (http://www.tkl.iis.u-tokyo.ac.jp/~crawler/)','Steeler','http://www.tkl.iis.u-tokyo.ac.jp/~crawler/crawler.html.en','University of Tokyo',''),
(1136,'qube/2.0 (+http://qube.qelix.com/v2)','Qube','http://qube.qelix.com/v2','Qube',''),
(1137,'Sogou web spider/3.0(+http://www.sogou.com/docs/help/webmasters.htm#07)','Sogou web spider','http://www.sogou.com/docs/help/webmasters.htm#07','Sogou',''),
(1138,'FAST Enterprise Crawler 6 used by Comperio AS (sts@comperio.no)','Comperio','http://www.comperio.no/index.php?option=com_content&task=blogcategory&id=7&Itemid=27','Comperio',''),
(1139,'LibertyW (+http://www.lw01.com)','LibertyW','http://www.lw01.com/en/','LibertyW',''),
(1140,'Acorn/Nutch-0.9 (Non-Profit Search Engine; acorn.isara.org; acorn at isara dot org)','Acorn','http://acorn.no-ip.org/','Isara',''),
(1141,'IIITBOT/1.1 (Indian Language Web Search Engine; http://webkhoj.iiit.net; pvvpr at iiit dot ac dot in)','IIITBOT','http://webkhoj.iiit.net/','Webkhoj',''),
(1142,'Speedy Spider (Entireweb; Beta/1.2; http://www.entireweb.com/about/search_tech/speedyspider/)','Speedy Spider','http://www.entireweb.com/about/search_tech/speedyspider/','Entireweb',''),                                                           
(1143,'Mozilla/5.0 (compatible; Quantcastbot/1.0; www.quantcast.com)','Quantcastbot','http://www.quantcast.com','Quantcast',''),
(1144,'TestCrawler/Nutch-0.9 (Testing Crawler for Research ; http://balihoo.com/index.aspx; tgautier at balihoo dot com)','Balihoo','http://balihoo.com/index.aspx','Balihoo',''),
(1145,'Mozilla/5.0 (compatible; heritrix/1.12.0 +http://www.accelobot.com)','Accelobot','http://www.accelobot.com/','Accelovation',''),
(1146,'Speedy Spider (Entireweb; Beta/1.3; http://www.entireweb.com/about/search_tech/speedyspider/)','Speedy Spider','http://www.entireweb.com/about/search_tech/speedyspider/','Entireweb',''),
(1147,'great-plains-web-spider/gpws (Flatland Industries Web Spider; http://www.flatlandindustries.com/flatlandbot.php; jason@flatlandindustries.com)','Flatlandbot','http://www.flatlandindustries.com/flatlandbot.php','Flatland Industries',''),
(1148,'NatzanBot, http://www.natzan.com','NatzanBot','http://www.natzan.com','Natzan',''),
(1149,'Gigabot/2.0att','Gigabot','http://www.gigablast.com/','Gigablast',''),
(1150,'Nebullabot/2.2 (http://bot.nebulla.info)','Nebulla','http://spider.nebulla.de','Nebulla',''),
(1151,'FAST Enterprise Crawler 6 used by suckling@un.org (UN OCHA)','UN OCHA','http://www.un.org/','UN OCHA',''),                    
(1152,'KDDI-CA33 UP.Browser/6.2.0.10.4 (GUI) MMP/2.0 (compatible; Googlebot-Mobile/2.1; +http://www.google.com/bot.html)','Googlebot-Mobile','http://www.google.com/bot.html','Google',''),                    
(1153,'Technoratibot/0.7','Technoratibot','http://www.technorati.com/','Technorati',''),                   
(1154,'BlogSearch/1.0 +http://www.icerocket.com/','BlogSearch','http://icerocket.com','IceRocket',''),
(1155,'Mozilla/5.0 (compatible; geourl/2.0b16 - http://geourl.org/bot)','Geourl','http://geourl.org/bot','Geourl',''), 					
(1156,'Bloodhound/Nutch-0.9 (Testing Crawler for Research - obeys robots.txt and robots meta tags ; http://balihoo.com/index.aspx; robot at balihoo dot com)','Balihoo','http://balihoo.com/index.aspx','Balihoo',''),
(1157,'GSiteCrawler/v1.20 rev. 273 (http://gsitecrawler.com/)','GSiteCrawler','http://gsitecrawler.com/','GSiteCrawler',''),                    
(1158,'Speedy Spider (http://www.entireweb.com/about/search_tech/speedyspider/)','Speedy Spider','http://www.entireweb.com/about/search_tech/speedyspider/','Entireweb',''),
(1159,'Mozilla/4.0 (compatible; MSIE 5.5; Windows NT 5.0; mowserbot; http://www.mowser.com/bot)','Mowserbot','http://www.mowser.com/bot','Mowser','')
");
					
					}
				else
					{
					$result2=1;
					}



				//crawlt_login table creation


				//check if table already exist

				$table_exist2 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_login')
						{
						$table_exist2 = 1;
						}
					}


				if($table_exist2 == 0)
					{

					//the table didn't exist, we can create it

					$result3 = mysql_query("CREATE TABLE crawlt_login (
  					id_login INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  					crawlt_user VARCHAR(20) NULL,
  					crawlt_password VARCHAR(45) NULL,
  					admin SMALLINT UNSIGNED NULL,
					site SMALLINT UNSIGNED NULL,
  					PRIMARY KEY(id_login)
					)");
					}
				else
					{
					$result3=1;
					}



				//crawlt_pages table creation


				//check if table already exist

				$table_exist3 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_pages')
						{
						$table_exist3 = 1;
						}
					}


				if($table_exist3 == 0)
					{

					//the table didn't exist, we can create it

					$result4 = mysql_query("CREATE TABLE crawlt_pages (
  					id_page INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  			url_page VARCHAR(255) NULL,
 		 			PRIMARY KEY(id_page)
					)");
					}
				else
					{
					$result4=1;
					}



				//crawlt_site table creation

				//check if table already exist

				$table_exist4 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_site')
						{
						$table_exist4 = 1;
						}
					}


				if($table_exist4 == 0)
					{

					//the table didn't exist, we can create it

					$result5 = mysql_query("CREATE TABLE crawlt_site (
                      id_site SMALLINT UNSIGNED NOT NULL AUTO_INCREMENT,
                      name VARCHAR(45) NOT NULL,
                      url VARCHAR(255) NULL,
                      PRIMARY KEY(id_site)
                    )");
					}
				else
					{
					$result5=1;
					}



				//crawlt_visits table creation

				//check if table already exist

				$table_exist5 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_visits')
						{
						$table_exist5 = 1;
						}
					}


				if($table_exist5 == 0)
					{

					//the table didn't exist, we can create it

					$result6 = mysql_query("CREATE TABLE crawlt_visits (
					  id_visit INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
					  crawlt_site_id_site SMALLINT UNSIGNED NOT NULL,
					  crawlt_pages_id_page INTEGER UNSIGNED NOT NULL,
					  crawlt_crawler_id_crawler SMALLINT UNSIGNED NOT NULL,
					  crawlt_ip_used VARCHAR(16) NOT NULL,
					  date DATETIME NOT NULL,
					  PRIMARY KEY(id_visit, crawlt_site_id_site, crawlt_pages_id_page, crawlt_crawler_id_crawler, crawlt_ip_used),
					  INDEX crawlt_visits_FKIndex1(crawlt_site_id_site),
					  INDEX crawlt_visits_FKIndex2(crawlt_pages_id_page),
					  INDEX crawlt_visits_FKIndex3(crawlt_crawler_id_crawler)
					)");
					}
				else
					{
					$result6=1;
					}



				//crawlt_update table creation

				//check if table already exist

				$table_exist6 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_update')
						{
						$table_exist6 = 1;
						}
					}


				if($table_exist6 == 0)
					{

					//the table didn't exist, we can create it
					
					$result7 = mysql_query("CREATE TABLE crawlt_update (
  					idcrawlt_update INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
  					update_id INTEGER UNSIGNED NULL,
					PRIMARY KEY(idcrawlt_update)
					)");
										
					if($result7==1)
						{
						$result8 =mysql_query("INSERT INTO crawlt_update VALUES (1,'68')");
						}
						
					}
				else
					{
					$result7=1;
					$result8=mysql_query("UPDATE crawlt_update SET update_id='68' WHERE idcrawlt_update='1'");
					if($result8)
						{
						if(mysql_affected_rows()==0)
							{
							mysql_query("INSERT INTO crawlt_update VALUES (1,'68')");
							}
						}									
					}

				//table crawlt_archive creation
				//check if table already exist

				$table_exist9 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_archive')
						{
						$table_exist9 = 1;
						}
					}


				if($table_exist9 == 0)
					{

					//the table didn't exist, we can create it

					$result9 = mysql_query("CREATE TABLE crawlt_archive (
                      mois VARCHAR(20) NOT NULL,
                      nbr_visits INTEGER UNSIGNED NULL,
                      pages_view INTEGER UNSIGNED NULL,
                      top_visits_1 VARCHAR(45) NULL,
                      top_visits_2 VARCHAR(45) NULL,
                      top_visits_3 VARCHAR(45) NULL,
                      top_pages_view_1 VARCHAR(45) NULL,
                      top_pages_view_2 VARCHAR(45) NULL,
                      top_pages_view_3 VARCHAR(45) NULL,
                      PRIMARY KEY(mois)
                    )");
					}
				else
					{
					$result9=1;
					}	



				//table crawlt_ip_data creation

				include dirname(__FILE__)."/crawltrack/include/createtableip.php";
				
				
				//table crawlt_config creation
				
                //check if table already exist

				$table_exist10 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_config')
						{
						$table_exist10 = 1;
						}
					}


				if($table_exist10 == 0)
					{

					//the table didn't exist, we can create it

					$result12 = mysql_query("CREATE TABLE crawlt_config (
                      id_config SMALLINT UNSIGNED NOT NULL,
                      timeshift SMALLINT  NULL,
                      public SMALLINT UNSIGNED NULL,
                      mail SMALLINT UNSIGNED NULL,
                      datelastmail SMALLINT UNSIGNED NULL,
                      addressmail VARCHAR(255) NULL,
                      lang VARCHAR(20) NULL,
                      version INTEGER UNSIGNED NULL,
                      firstdayweek ENUM('Monday','Sunday') NOT NULL default 'Monday',
                      datelastseorequest smallint(5) NOT NULL default '0',
                      loop1 smallint(5) NOT NULL default '0',
                      loop2 smallint(5) NOT NULL default '0',
                      datelastcleaning datetime NOT NULL default '0000-00-00 00:00:00',
                      rowdisplay smallint(5)  NULL default '30',
                      orderdisplay smallint(5) NULL default '0', 
                      typemail smallint(5) NULL default '1',
                      typecharset smallint(5) NULL default '1',
                      blockattack smallint(5) NULL default '0',
                      sessionid smallint(5) NULL default '0',                                          
                      PRIMARY KEY(id_config)
                    )");
                    
                    //insert the data in the table
                    if($result12==1)
						{
						$result13 =mysql_query("INSERT INTO crawlt_config (id_config, timeshift, public, mail, datelastmail,addressmail, lang, version, firstdayweek, rowdisplay, orderdisplay, typemail, typecharset, blockattack, sessionid) VALUES ('1','0','0','0','0','','".$crawltlang."','230','Monday','30','0','1','1','0','0')");
						}
                    
					}
				else
					{
					$result12=1;
					$result13=1;
					}					
				
								
				//table crawlt_ip_used creation
				
                //check if table already exist

				$table_exist11 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_ip_used')
						{
						$table_exist11 = 1;
						}
					}


				if($table_exist11 == 0)
					{

					//the table didn't exist, we can create it

					$result14 = mysql_query("CREATE TABLE crawlt_ip_used (
                      ip_used VARCHAR(16) NOT NULL,
                      code CHAR(2) NULL,
                      PRIMARY KEY(ip_used)
                    )");
                    
                    
					}
				else
					{
					$result14=1;
					}				

				//table crawlt_cache creation
				
                //check if table already exist

				$table_exist12 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_cache')
						{
						$table_exist12 = 1;
						}
					}

				if($table_exist12 == 0)
					{

					//the table didn't exist, we can create it

					$result15 = mysql_query("CREATE TABLE crawlt_cache (
                      cachename VARCHAR(255) NOT NULL,
                      time INT NULL,
                      PRIMARY KEY(cachename)
                    )");
					}
				else
					{
					$result15=1;
					}	
				
				
				//table crawlt_graph creation
				
                //check if table already exist

				$table_exist13 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_graph')
						{
						$table_exist13 = 1;
						}
					}

				if($table_exist13 == 0)
					{

					//the table didn't exist, we can create it

					$result16 = mysql_query("CREATE TABLE crawlt_graph (
                      name varchar(255) NOT NULL default '',
                      graph_values text NOT NULL,
                      KEY name (name)
                    )");
					}
				else
					{
					$result16=1;
					}				
				
				//table crawlt_keyword creation
				
                //check if table already exist

				$table_exist14 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_keyword')
						{
						$table_exist14 = 1;
						}
					}

				if($table_exist14 == 0)
					{

					//the table didn't exist, we can create it

					$result17 = mysql_query("CREATE TABLE crawlt_keyword (
                    id_keyword int(10) unsigned NOT NULL auto_increment,
                    keyword varchar(255) default NULL,
                    PRIMARY KEY  (id_keyword)
                    )");
					}
				else
					{
					$result17=1;
					}					
				
				//table crawlt_seo_position creation
				
                //check if table already exist

				$table_exist15 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_seo_position')
						{
						$table_exist15 = 1;
						}
					}

				if($table_exist15 == 0)
					{

					//the table didn't exist, we can create it

					$result18 = mysql_query("CREATE TABLE crawlt_seo_position (
                    date date default NULL,
                    id_site smallint(5) NOT NULL default '0',
                    linkyahoo int(10) unsigned default NULL,
                    pageyahoo int(10) unsigned default NULL,
                    linkmsn int(10) unsigned default NULL,
                    pagemsn int(10) unsigned default NULL,
                    nbrdelicious int(10) unsigned default '0',
                    tagdelicious varchar(255) NOT NULL default ''
                    )");
					}
				else
					{
					$result18=1;
					}				
				
				//table crawlt_visits_human creation
				
                //check if table already exist

				$table_exist16 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_visits_human')
						{
						$table_exist16 = 1;
						}
					}

				if($table_exist16 == 0)
					{

					//the table didn't exist, we can create it

					$result19 = mysql_query("CREATE TABLE crawlt_visits_human (
                    id_visit int(10) unsigned NOT NULL auto_increment,
                    crawlt_site_id_site smallint(5) unsigned NOT NULL default '0',
                    crawlt_keyword_id_keyword int(10) unsigned NOT NULL default '0',
                    crawlt_id_crawler smallint(5) unsigned NOT NULL default '0',
                    date datetime default NULL,
                    crawlt_id_page int(10) NOT NULL default '0',
                    PRIMARY KEY  (id_visit,crawlt_site_id_site,crawlt_keyword_id_keyword,crawlt_id_crawler),
                    KEY crawlt_visits_human_FKIndex1 (crawlt_site_id_site),
                    KEY crawlt_visits_human_FKIndex2 (crawlt_keyword_id_keyword),
                    KEY crawlt_visits_human_FKIndex3 (crawlt_id_crawler)
                    )");
					}
				else
					{
					$result19=1;
					}	
									
				//table crawlt_attack creation

				include"./include/createtableattack.php";				
               
				//crawlt_good_sites table creation


				//check if table already exist

				$table_exist18 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_good_sites')
						{
						$table_exist18 = 1;
						}
					}


				if($table_exist18 == 0)
					{

					//the table didn't exist, we can create it

					$result22 = mysql_query("CREATE TABLE crawlt_good_sites (
  					id_site INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  			host_site VARCHAR(255) NULL,
 		 			PRIMARY KEY(id_site)
					)");
					}
				else
					{
					$result22=1;
					}					
				//crawlt_sessionid table creation


				//check if table already exist

				$table_exist19 = 0;

				$sql = "SHOW TABLES ";                                                
				$tables = mysql_query($sql); 

				while (list($tablename)=mysql_fetch_array($tables)) 
					{

					if($tablename == 'crawlt_sessionid')
						{
						$table_exist19 = 1;
						}
					}


				if($table_exist19 == 0)
					{

					//the table didn't exist, we can create it

					$result23 = mysql_query("CREATE TABLE crawlt_sessionid (
					id INTEGER UNSIGNED NOT NULL AUTO_INCREMENT,
		  			sessionid VARCHAR(45) NULL,
 		 			PRIMARY KEY(id)
					)");
					}
				else
					{
					$result23=1;
					}				
					
					
								
				if($result==1 && $result2==1 && $result3==1 && $result4==1 && $result5==1 && $result6==1 && $result7==1 && $result8==1 && $result9==1 && $result10==1 && $result11==1 && $result12==1 && $result13==1 && $result14==1 && $result15==1 && $result16==1 && $result17==1 && $result18==1 && $result19==1 && $result20==1 && $result21==1 && $result22==1 && $result23==1)
					{
					//case table creation ok
					echo"<p>".$language['step1_install_ok2']."</p>\n";
					
					echo"<div class=\"form\">\n";
					echo"<form action=\"index.php\" method=\"POST\" >\n";
					echo "<input type=\"hidden\" name ='navig' value='15'>\n";					
					echo "<input type=\"hidden\" name ='validform' value='4'>\n";
					echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
					echo"<input name='ok' type='submit'  value=' ".$language['step4_install']." ' size='60'>\n";
					echo"</form>\n";
					echo"</div>\n";



					}
				elseif($result==1 && $result2==1 && $result3==1 && $result4==1 && $result5==1 && $result6==1 && $result7==1 && $result8==1 && $result9==1 && $result10==1 && $result11==0 && $result12==1 && $result13==1 && $result14==1 && $result15==1 && $result16==1 && $result17==1 && $result18==1 && $result19==1 && $result20==1)
					{
					//case table ip filling no ok
					echo"<p>".$language['step1_install_no_ok4']."</p>\n";

					//case retry
					echo"<div class=\"form\">\n";
					echo"<form action=\"index.php\" method=\"POST\" >\n";
					echo "<input type=\"hidden\" name ='validform' value='3'>\n";
					echo "<input type=\"hidden\" name ='navig' value='15'>\n";
					echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
					echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
					echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
					echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
					echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";										
					echo"<input name='ok' type='submit'  value=' ".$language['retry']." ' size='60'>\n";
					echo"</form>\n";
					echo"</div>\n";
					
					//case continue without ip
					echo"<div class=\"form\">\n";
					echo"<form action=\"index.php\" method=\"POST\" >\n";
					echo "<input type=\"hidden\" name ='navig' value='15'>\n";					
					echo "<input type=\"hidden\" name ='validform' value='4'>\n";
					echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
					echo"<input name='ok' type='submit'  value=' ".$language['step4_install']." ' size='60'>\n";
					echo"</form>\n";
					echo"</div>\n";			

					}					
				else
					{
					//case table creation no ok
					echo"<p>".$language['step1_install_no_ok3']."</p>\n";

					
					echo"<div class=\"form\">\n";
					echo"<form action=\"index.php\" method=\"POST\" >\n";
					echo "<input type=\"hidden\" name ='validform' value='3'>\n";
					echo "<input type=\"hidden\" name ='navig' value='15'>\n";
					echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
					echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
					echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
					echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
					echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";										
					echo"<input name='ok' type='submit'  value=' ".$language['retry']." ' size='60'>\n";
					echo"</form>\n";
					echo"</div>\n";

					}
		

				}
			}
		}
	else
		{
		//case file no ok
		
		echo"<p>".$language['step1_install_no_ok2']."</p>";

		echo"<div class=\"form\">\n";
		echo"<form action=\"index.php\" method=\"POST\" >\n";
		echo "<input type=\"hidden\" name ='validform' value='2'>\n";
		echo "<input type=\"hidden\" name ='lang' value='$crawltlang'>\n";
		echo "<input type=\"hidden\" name ='idmysql' value='$idmysql'>\n";
		echo "<input type=\"hidden\" name ='passwordmysql' value='$passwordmysql'>\n";
		echo "<input type=\"hidden\" name ='hostmysql' value='$hostmysql'>\n";
		echo "<input type=\"hidden\" name ='basemysql' value='$basemysql'>\n";
		echo"<input name='ok' type='submit'  value=' ".$language['back_to_form']." ' size='60'>\n";
		echo"</form>\n";
		echo"</div>\n";
		}

	}


?>