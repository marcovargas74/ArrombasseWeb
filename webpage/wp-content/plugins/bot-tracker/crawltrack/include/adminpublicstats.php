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
// file: adminpublicstats.php
//----------------------------------------------------------------------

if (!defined('IN_CRAWLT_ADMIN'))
{
	echo"<h1>Hacking attempt !!!!</h1>";
	exit();
}


echo"<h1>".$language['public']."</h1>\n";

if($crawltpublic==1)
    {
    if($validsite==1)
        {
        //update the crawlt_config_table
        
        //database connection
        $connexion = mysql_connect($crawlthost,$crawltuser,$crawltpassword) or die("MySQL connection to database problem");
        $selection = mysql_select_db($crawltdb) or die("MySQL database selection problem");
        
        $sqlupdatepublic ="UPDATE crawlt_config SET public='0'";
        
        $requeteupdatepublic = mysql_query($sqlupdatepublic, $connexion) or die("MySQL query error");
    
        echo"<br><br><p>".$language['update']."</p><br><br>";    
            
        //continue
    
        echo"<form action=\"index.php\" method=\"POST\" >\n";
        echo "<input type=\"hidden\" name ='navig' value='6'>\n";
        echo"<table class=\"centrer\">\n";	
        echo"<tr>\n";
        echo"<td colspan=\"2\">\n";
        echo"<input name='ok' type='submit'  value='OK ' size='20'>\n";
        echo"</td>\n";
        echo"</tr>\n";
        echo"</table>\n";
        echo"</form><br>\n";               
        }
    else
        {
        echo"<br><br><p>".$language['public-set-up2']."</p>\n";
           
        echo"<div class=\"form\">\n";
        echo"<form action=\"index.php\" method=\"POST\" >\n";
        echo "<input type=\"hidden\" name ='navig' value='6'>\n";
        echo "<input type=\"hidden\" name ='validform' value=\"21\">";
        echo "<input type=\"hidden\" name ='validsite' value=\"1\">";
        echo"<table class=\"centrer\">\n";
        echo"<tr>\n";
        echo"<td>\n";
        echo"<input name='ok' type='submit'  value=".$language['yes']." size='20'>\n";
        echo"</td>\n";
        echo"</tr>\n";
        echo"</table>\n";
        echo"</form><br>\n"; 
    
        echo"<form action=\"index.php\" method=\"POST\" >\n";
        echo "<input type=\"hidden\" name ='navig' value='6'>\n";
        echo"<table class=\"centrer\">\n";
        echo"<tr>\n";
        echo"<td>\n";
        echo"<input name='ok' type='submit'  value=".$language['no']." size='20'>\n";
        echo"</td>\n";
        echo"</tr>\n";
        echo"</table>\n";
        echo"</form><br>\n";    
          
        echo"</div><br>\n";    
        
        }
        
    }
else
    {
    
 
        if($validsite !=1)
            {
            //form    
                       
            echo"<br><br><p>".$language['public-set-up']."</p>\n";

            echo"<br><p>".$language['public2']."</p>\n";
               
            echo"<div class=\"form\">\n";
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='navig' value='6'>\n";
            echo "<input type=\"hidden\" name ='validform' value=\"21\">";
            echo "<input type=\"hidden\" name ='validsite' value=\"1\">";
            echo"<table class=\"centrer\">\n";
            echo"<tr>\n";
            echo"<td>\n";
            echo"<input name='ok' type='submit'  value=".$language['yes']." size='20'>\n";
            echo"</td>\n";
            echo"</tr>\n";
            echo"</table>\n";
            echo"</form><br>\n"; 
        
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='navig' value='6'>\n";
            echo"<table class=\"centrer\">\n";
            echo"<tr>\n";
            echo"<td>\n";
            echo"<input name='ok' type='submit'  value=".$language['no']." size='20'>\n";
            echo"</td>\n";
            echo"</tr>\n";
            echo"</table>\n";
            echo"</form><br>\n";    
              
            echo"</div><br>\n"; 
            }
        else
            {
            //update the crawlt_config_table
            
            //database connection
            $connexion = mysql_connect($crawlthost,$crawltuser,$crawltpassword) or die("MySQL connection to database problem");
            $selection = mysql_select_db($crawltdb) or die("MySQL database selection problem");
            
            $sqlupdatepublic ="UPDATE crawlt_config SET public='1'";
            
            $requeteupdatepublic = mysql_query($sqlupdatepublic, $connexion) or die("MySQL query error");
                
            echo"<br><br><p>".$language['update']."</p><br><br>";                
                
                //continue
    
            
            echo"<form action=\"index.php\" method=\"POST\" >\n";
            echo "<input type=\"hidden\" name ='navig' value='6'>\n";
            echo"<table class=\"centrer\">\n";	
            echo"<tr>\n";
            echo"<td colspan=\"2\">\n";
            echo"<input name='ok' type='submit'  value='OK ' size='20'>\n";
            echo"</td>\n";
            echo"</tr>\n";
            echo"</table>\n";
            echo"</form><br>\n";
                    
                
            }
    
        }
   

?>