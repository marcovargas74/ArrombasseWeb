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
// file: display-one-page.php
//----------------------------------------------------------------------
if (!defined('IN_CRAWLT'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}
//initialize array
$listcrawler=array();
$nbvisits=array();
$lastdate1=array();
$name=array();
$name2=array();
$nbvisits2=array();
$values=array();
$table=array();

$crawlencode=urlencode($crawler);
$cachename=$navig.$period.$site.$order.$crawlencode.$firstdayweek.$localday.$graphpos.$crawltlang;

//start the caching if fopen exist
if(function_exists('fopen'))
    {
    cache($cachename);
    }

//database connection
$connexion = mysql_connect($crawlthost,$crawltuser,$crawltpassword) or die("MySQL connection to database problem");
$selection = mysql_select_db($crawltdb) or die("MySQL database selection problem");

//include menu
include"include/menumain.php";
include"include/menusite.php";
//order case    
if($order==0)
    {	
    //case date
    $orderby="maxdate DESC";    
    }
elseif($order==2 OR $order==1 OR $order==4)
    {
    //case visits
    $orderby="maxvisites DESC";                   
    }
elseif($order==3)
    {
    //case crawlers
    $orderby="crawler_name ASC";		
    }
//date format
if($period == 0 OR $period >= 1000)
    {
    $datequery= "DATE_FORMAT(MAX(FROM_UNIXTIME(UNIX_TIMESTAMP(date)-($times*3600))), '%H&nbsp;hr&nbsp;%i&nbsp;mn')";
    }
else
    {
    $datequery= "DATE_FORMAT(MAX(FROM_UNIXTIME(UNIX_TIMESTAMP(date)-($times*3600))), '%d/%m/%Y<br>%H&nbsp;hr&nbsp;%i&nbsp;mn')";    
    }
//limite to (value can be modified in the function.php file)
if($displayall=='no')
    {
    $limitquery='LIMIT '.$rowdisplay;
    }
else
    {
    $limitquery='';
    }
//date for the mysql query
if($period>=10)
    {
    $datetolookfor=" date >'".sql_quote($daterequest)."' 
    AND  date <'".sql_quote($daterequest2)."'";    
    }
else
    {
    $datetolookfor=" date >'".sql_quote($daterequest)."'";
    }include"include/timecache.php";
    
 //requete to count the number of page per crawler and to list the crawler and to count the number of visits per crawler and to have the date of last visit for each crawler	      
$sqlstats = "SELECT  crawler_name,   COUNT(DISTINCT id_visit) as maxvisites ,
MAX(FROM_UNIXTIME(UNIX_TIMESTAMP(date)-($times*3600), '%Y-%m-%d %H:%i:%s')) as maxdate,    
$datequery 
FROM crawlt_visits, crawlt_crawler, crawlt_pages
WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler
AND  crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page
AND $datetolookfor    
AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
AND crawlt_pages.url_page='".sql_quote($crawler)."'   
GROUP BY crawler_name
ORDER BY $orderby 
$limitquery";
    	
$requetestats = mysql_query($sqlstats, $connexion) or die("MySQL query error1");

$nbrresult=mysql_num_rows($requetestats);
if($nbrresult>=1)
	{
	$onlyarchive=0;
    
    while ($ligne = mysql_fetch_row($requetestats))                                                                              
        {
        $nbvisits[$ligne[0]]=$ligne[1];
        $lastdatedisplay[$ligne[0]]=$ligne[3];
        }	
 	
     //requete to count the total number of  pages viewed ,total number of visits and total number of crawler
     
     //first we check if that calculation has not already been done
	if( isset($_SESSION['nbrtotcrawlers-'.$cachename]) && isset($_SESSION['nbrtotvisits-'.$cachename]))
		{ 
        $nbrtotcrawlers = $_SESSION['nbrtotcrawlers-'.$cachename];
        $nbrtotvisits = $_SESSION['nbrtotvisits-'.$cachename]; 
        }
    else
        {    
        $sqlstats2 = "SELECT COUNT(DISTINCT crawlt_pages_id_page), COUNT(DISTINCT crawler_name), COUNT(DISTINCT id_visit) FROM crawlt_visits, crawlt_crawler, crawlt_pages
        WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler
        AND  crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page
        AND $datetolookfor         
        AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
        AND crawlt_pages.url_page='".sql_quote($crawler)."'
        "; 
        
        $requetestats2 = mysql_query($sqlstats2, $connexion) or die("MySQL query error2");
        $ligne2 = mysql_fetch_row($requetestats2);
        $nbrtotpages=$ligne2[0];
        $nbrtotcrawlers=$ligne2[1];
        $nbrtotvisits=$ligne2[2];
        
        $_SESSION['nbrtotcrawlers-'.$cachename] = $nbrtotcrawlers;
        $_SESSION['nbrtotvisits-'.$cachename] = $nbrtotvisits;           
        }
	
    //check if there is datas in archive
    $usearchive=0;
    if($period==3 OR ($period>=200 && $period<300))
        {
        $beginperiod =  mktime(0,0,0,$monthbeginserver, 1, $yearbeginserver);        
        
        //data request
        $sqlarchive="SELECT mois, nbr_visits, pages_view FROM crawlt_archive";
        
        $requetearchive = mysql_query($sqlarchive, $connexion) or die("MySQL query error");
            
        $nbrresult=mysql_num_rows($requetearchive);
        if($nbrresult>=1)
            {
            while ($ligne = mysql_fetch_row($requetearchive))                                                                              
                {
                $sitetodisplay = explode('-',$ligne[0]);
                if($sitetodisplay[1]==$site)
                    {
                    $data=$sitetodisplay[0];
                    $archivdate=explode('/',$data);
                    $archivperiod =mktime(0,0,0,$archivdate[0], 1, $archivdate[1]);
                    if($archivperiod >=$beginperiod)
                        {
                        $usearchive=1;
                        }

                    }
                }
            }
                
        }
     //query &  treatment to prepare the display of the top 5 and group the other in the 'Other' category in the crawler graph
    $sqlstats = "SELECT  crawler_name,  COUNT(DISTINCT id_visit) as maxvisites  FROM crawlt_visits, crawlt_crawler, crawlt_pages
    WHERE crawlt_visits.crawlt_crawler_id_crawler=crawlt_crawler.id_crawler 
    AND  crawlt_visits.crawlt_pages_id_page=crawlt_pages.id_page 
    AND $datetolookfor    
    AND crawlt_visits.crawlt_site_id_site='".sql_quote($site)."'
    AND crawlt_pages.url_page='".sql_quote($crawler)."'     
    GROUP BY crawler_name
    ORDER BY maxvisites DESC
    LIMIT 5";
      
     $requetestats = mysql_query($sqlstats, $connexion) or die("MySQL query error"); 
     
     $totaltop5 = 0;
     
     while ($ligne = mysql_fetch_row($requetestats))                                                                              
        {
         if(strlen("$ligne[0]")>15)
            {
            $values[substr("$ligne[0]",0,15)."..."]=$ligne[1];
            }
          else
            {
            $values[$ligne[0]]=$ligne[1];
            }
         $totaltop5 =  $totaltop5 + $ligne[1];        
        }
     
    If ($totaltop5 < $nbrtotvisits)
        {
        $values[$language['other']] = ($nbrtotvisits -$totaltop5); 
        }
    //prepare datas to be transfert to graph file
    $datatransferttograph=addslashes(urlencode(serialize($values)));
    //insert the values in the graph table  
    $graphname="crawler-".$cachename;
       
    //check if this graph exit already in the table     
    $sql = "SELECT name  FROM crawlt_graph
                WHERE name= '".sql_quote($graphname)."'";
                
    
    $requete = mysql_query($sql, $connexion) or die("MySQL query error");
    $nbrresult=mysql_num_rows($requete);
    if($nbrresult >=1)
        {     
        $sql2 ="UPDATE crawlt_graph SET graph_values='".sql_quote($datatransferttograph)."'
                  WHERE name= '".sql_quote($graphname)."'";
        }
    else
        {
        $sql2 ="INSERT INTO crawlt_graph (name,graph_values) VALUES ( '".sql_quote($graphname)."','".sql_quote($datatransferttograph)."')";        
        }    
    $requete2 = mysql_query($sql2, $connexion) or die("MySQL query error");      

	//display---------------------------------------------------------------------------------
    $crawlerdisplay = crawltcuturl($crawler,'55');
    echo"<div class=\"content\">\n";
    echo crawltbackforward($crawlerdisplay,$period,$daytodaylocal,$monthtodaylocal,$yeartodaylocal,$daybeginlocal,$monthbeginlocal,$yearbeginlocal,$dayendweek,$monthendweek,$yearendweek,$crawler,$navig,$site,$graphpos);        
   
       //graph
    echo"<div align='center'onmouseover=\"javascript:montre();\">\n";
    echo"<img src=\"./graphs/crawler-graph.php?graphname=$graphname\" alt=\"graph\"  width=\"450\" heigth=\"175\"/>\n";
    echo"</div>\n";	

    echo"</div>\n";

    echo"<div class='tableau' align='center'>\n";	
    echo"<table   cellpadding='0px' cellspacing='0' width='300px'>\n";	
    echo"<tr><th class='tableau1'>\n";
    echo"".$language['nbr_tot_visits']."\n";
    echo"</th>\n";
    echo"<th class='tableau2'>\n";
    echo"".$language['nbr_tot_crawlers']."\n";
    echo"</th></tr>\n";
    if($usearchive==0)
        {		
        echo"<tr><td class='tableau3'>".numbdisp($nbrtotvisits)."</td>\n";
        echo"<td class='tableau5'>".numbdisp($nbrtotcrawlers)."</td></tr>\n";	
        echo"</table></div><br>\n";	
        }
    else
        {
        echo"<tr><td class='tableau3'>".numbdisp($nbrtotvisits)."*</td>\n";
        echo"<td class='tableau5'>".numbdisp($nbrtotcrawlers)."*</td></tr>\n";	
        echo"</table>\n";
        echo"<p>*".$language['use-archive']."</p></div><br>\n";			
        } 
     if($period != 5)
        {                   
        //graph
        echo"<div class='graphvisits'>\n";    
        //mapgraph
        include"include/mapgraph.php"; 
        echo"<img src=\"./graphs/visit-graph.php?crawltlang=$crawltlang&period=$period&navig=$navig&graphname=$graphname\" USEMAP=\"#visit\" alt=\"graph\" width=\"700\" heigth=\"300\"  border=\"0\"/>\n";
        echo"</div>\n";
        echo"<div class='imprimgraph'>\n";       
        echo"&nbsp;<br><br><br><br><br><br></div>\n";        
        }


    //change text if more than x crawlers	and display limited (value of x can be change in function.php,,it's displaynumber)
    if($nbrtotcrawlers>=$rowdisplay && $displayall=='no')
        {
        echo"<br><h2>";
        printf($language['100_visit_per-crawler'],$rowdisplay);
        echo"<br>\n";
         $crawlencode = urlencode($crawler);
        echo"<span class=\"smalltext\"><a href=\"index.php?navig=$navig&period=$period&site=$site&crawler=$crawlencode&order=$order&displayall=yes&graphpos=$graphpos\">".$language['show_all']."</a></span></h2>";
           }
    else
        {
        echo"<h2>".$language['visit_per-crawler']."</h2>\n";
        }

    echo"<div class='tableau' align='center'>\n";	
    echo"<table   cellpadding='0px'; cellspacing='0' width='100%'>\n";
    if($order==3)
        {
        echo"<tr><th class='tableau1'>\n";
        echo"<form action=\"index.php\" method=\"POST\" >\n";
        echo "<input type=\"hidden\" name ='order' value=\"3\">\n";			
        echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
        echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";         
        echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
        echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
        echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";		
        echo"<input type='submit' class='orderselect' value='".$language['crawler_name']."'>\n";
        echo"</form>\n";		
        echo"</th>\n";
        }
    else
        {
        echo"<tr><th class='tableau1'>\n";
        echo"<form action=\"index.php\" method=\"POST\" >\n";
        echo "<input type=\"hidden\" name ='order' value=\"3\">\n";			
        echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
        echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";         
        echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
        echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
        echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";		
        echo"<input type='submit' class='order' value='".$language['crawler_name']."'>\n";
        echo"</form>\n";		
        echo"</th>\n";
        }	
    if($order==2)
            {
            echo"<th class='tableau1'>\n";
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='order' value=\"2\">\n";			
            echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
            echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";             
            echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
            echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
            echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
            echo"<input type='submit' class='orderselect' value='".$language['nbr_visits']."'>\n";
            echo"</form>\n";			
            echo"</th>\n";
            }
        else
            {
            echo"<th class='tableau1'>\n";
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='order' value=\"2\">\n";			
            echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
            echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";             
            echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
            echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
            echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
            echo"<input type='submit' class='order' value='".$language['nbr_visits']."'>\n";
            echo"</form>\n";
            echo"</th>\n";
            }	
    
    if($order==0)
            {
            echo"<th class='tableau2'>\n";			
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='order' value=\"0\">\n";			
            echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
            echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";             
            echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
            echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
            echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
            echo"<input type='submit' class='orderselect' value='".$language['date_visits']."'>\n";
            echo"</form>\n";
            echo"</th></tr>\n";
            }
        else
            {
            echo"<th class='tableau2'>\n";
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='order' value=\"0\">\n";			
            echo "<input type=\"hidden\" name ='period' value=\"$period\">\n";
            echo "<input type=\"hidden\" name ='graphpos' value=\"$graphpos\">\n";             
            echo "<input type=\"hidden\" name ='navig' value=\"$navig\">\n";
            echo "<input type=\"hidden\" name ='crawler' value=\"$crawler\">\n";
            echo "<input type=\"hidden\" name ='site' value=\"$site\">\n";			
            echo"<input type='submit' class='order' value='".$language['date_visits']."'>\n";
            echo"</form>\n";
            echo"</th></tr>\n";
            }	
    
    //counter for alternate color lane
    $comptligne=2;
    
    foreach ($nbvisits as $page1 => $value)
        {
        $page1display=htmlentities($page1);
         $crawlencode = urlencode($page1);
       
        if ($comptligne%2 ==0)
            {
            echo"<tr><td class='tableau3'><a href='index.php?navig=2&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$crawlencode."&amp;graphpos=".$graphpos."'>".$page1display."</a></td>\n";
            echo"<td class='tableau3'>".numbdisp($nbvisits[$page1])."</td>\n";
            echo"<td class='tableau5'>".$lastdatedisplay[$page1]."</td></tr>\n";
            }
        else
            {
            echo"<tr><td class='tableau30'><a href='index.php?navig=2&amp;period=".$period."&amp;site=".$site."&amp;crawler=".$crawlencode."&amp;graphpos=".$graphpos."'>".$page1display."</a></td>\n";
            echo"<td class='tableau30'>".numbdisp($nbvisits[$page1])."</td>\n";
            echo"<td class='tableau50'>".$lastdatedisplay[$page1]."</td></tr>\n";
            }
        $comptligne++;							
        }

    echo"</table>\n";
    echo"<br>\n";
		
	}	
else
	{
	$sqlstats2 = "SELECT * FROM crawlt_pages
	WHERE crawlt_pages.url_page='".sql_quote($crawler)."'
	ORDER BY url_page ASC";
	
	$requetestats2 = mysql_query($sqlstats2, $connexion) or die("MySQL query error");
		
    //mysql connexion close
    mysql_close($connexion);
		
	
	$nbrresult2=mysql_num_rows($requetestats2);
		if ($nbrresult2==0)
			{
			echo"<h1>Hacking attempt !!!!</h1>";
			exit();
			}
	
    $crawlerdisplay = crawltcuturl($crawler,'55');
    echo"<div class=\"content\">\n";
	echo"<div align='center'>\n";		
    echo crawltbackforward($crawlerdisplay,$period,$daytodaylocal,$monthtodaylocal,$yeartodaylocal,$daybeginlocal,$monthbeginlocal,$yearbeginlocal,$dayendweek,$monthendweek,$yearendweek,$crawler,$navig,$site,$graphpos);				
		
	echo"<h1>".$language['no_visit']."</h1>\n";
	echo"<br>\n";
	}

?>