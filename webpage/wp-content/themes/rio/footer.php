<div id="footer">
  <div align="center">
    <p>&copy; by <?php bloginfo('name'); ?>,
      <?PHP

//-------------------------------------------------------------

//  artmedic useronline 1.0 || http://www.artmedic.de

//  Copyright (C) 2002 Ellen Baitinger, artmedic webdesign 

//  This Software is distributed under the GNU General Public 

//  License.

//-------------------------------------------------------------

$daten="besucher.txt";

$time = time();

$ip = getenv("REMOTE_ADDR");

$ablaufzeit = "$time"-"300";

$pruefung = @file($daten);

while (list ($line_num, $line) = @each ($pruefung)) 

{$zeiten = explode("&&",$line);

if($zeiten[0] <= $ablaufzeit)

{$fp = fopen( "$daten", "r" ); 

$contents = fread($fp, filesize($daten)); 

fclose($fp);

$line=quotemeta($line); 

$string2 = "";

$replace = ereg_replace($line, $string2, $contents);

$fh=fopen($daten, "w");

@flock($fp,2);

fputs($fh, $replace);

@flock($fp,3);

fclose($fh);}}

$ippruefung = @file($daten);

while (list ($line_num, $line) = @each ($ippruefung)) 

{$ips = explode("&&",$line);

if($ips[1] == $ip)

{$fp = fopen( "$daten", "r" ); 

$contents = fread($fp, filesize($daten)); 

fclose($fp);

$line=quotemeta($line); 

$string2 = "";

$replace = ereg_replace($line, $string2, $contents);

$fh=fopen($daten, "w");

@flock($fp,2);

fputs($fh, $replace);

@flock($fp,3);

fclose($fh);}}

$fp = fopen("$daten", "a+");

flock($fp,2);

fputs ($fp, "$time&&$ip&&\n");

flock($fp,3);

fclose ($fp);

$anzahldaten = file($daten);

$anzahl = count($anzahldaten);

echo "<font face=\"Arial, Helvetica, sans-serif\" size=\"1\">$anzahl visitors online.</font>";

?>
      <!-- <?php echo get_num_queries(); ?> queries. <?php timer_stop(1); ?> seconds. -->
    </p>
    <p><a href="http://www.amypink.com/"> Designed by AMY &amp; PINK.</a></p>
  </div>
</div>

<?php /* "Just what do you think you're doing Dave?" */ ?>
<?php wp_footer(); ?>

</body>
</html>
