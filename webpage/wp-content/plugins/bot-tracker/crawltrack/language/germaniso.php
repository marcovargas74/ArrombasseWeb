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
// Translation: Oliver Weiss (http://www.brazzaville.de)
//              M.Brueck  (http://www.phantastor.de)
//              Dirk Hombrecher (http://veillesud.veillefrance.com)
//----------------------------------------------------------------------
// file: germaniso.php
//----------------------------------------------------------------------
//installation
$language['install']="Installation";
$language['welcome_install'] ="Willkommen bei CrawlTrack, die Installation ist ganz einfach, nur 3 Schritte.";
$language['menu_install_1']="1) Definition der Verbindungsparameter zur Datenbank.";
$language['menu_install_2']="2) Definition der Websites.";
$language['menu_install_3']="3) Benutzerrechte.";
$language['go_install']="Installation";
$language['step1_install'] ="Geben Sie bitte die Parameter Ihrer Datenbank ein. Wenn alle Eingaben in Ordnung sind, werden die Datanbanks�tze und die lokalen Parameterdateien erstellt.";
$language['step1_install_login_mysql']="Benutzername MySQL";
$language['step1_install_password_mysql']="Passwort MySQL";
$language['step1_install_host_mysql']="Host MySQL";
$language['step1_install_database_mysql']="Datenbank MySQL";
$language['step1_install_ok'] ="Parameterdateien sind in Ordnung.";
$language['step1_install_ok2'] ="Datens�tze sind in Ordnung.";
$language['step1_install_no_ok'] ="Es fehlen Informationen, �berpr�fen Sie bitte Ihre Angaben.";
$language['step1_install_no_ok2'] ="Parameterdateien wurden nicht erstellt, �berpr�fen Sie CHMOD 777.";
$language['step1_install_no_ok3'] ="Problem w�hrend des Aufbaus der Datens�tze, versuchen Sie es noch einmal.";
$language['back_to_form'] ="Zur�ck zur Eingabe";
$language['retry'] ="Neuer Versuch";
$language['step2_install_no_ok']="Verbindung zur Datenbank unm�glich, �berpr�fen Sie Ihre Eingaben.";
$language['step3_install_no_ok']="Auswahl der Datenbank unm�glich, �berpr�fen Sie Ihre Eingaben.";
$language['step4_install']="Los";
//site creation
//modified in 1.5.0
$language['set_up_site']="Bitte tragen Sie hier den Namen Ihrer Website und die URL ein. Der Name wird von CrawlTrack genutzt. Die URL muss so aussehen, z.B. www.example.com (ohne http:// am Anfang und / am Ende).";
$language['site_name']="Name Ihrer Website:";
//modified in 2.0.0
$language['site_no_ok']="Geben Sie den Namen und die URL Ihrer Website ein.";
$language['site_ok']="Die Website wurde der Datenbank hinzugef�gt.";
$language['new_site']="Neue Website hinzuf�gen";
//tag creation
$language['tag']="Das Tag f�r Ihre Webseiten";
$language['create_tag']="<p><b>Wie man den CrawlTrack tag benutzt:</b><br><ul id=\"listtag\">
<li>the CrawlTrack tag ist eine php Datei, die in eine .php Seite eingebunden wird.</li>
<li>the CrawlTrack tag muss zwischen &#60;?php and ?&#62 tags stehen. Wenn keine vorhanden sind, m�ssen diese erst zugefuegt werden, bevor Sie CrawlTrack tag nutzen koennen.</li>
<li>Wenn Ihre Seiten nicht aus .php Dateien besteht, lesen Sie die Dokumentation auf www.crawltrack.fr.</li>
<li>Die beste Loesung f�r den Anti-hacking Schutz ist, den CrawlTrack tag direkt am Beginn der .php Seite nach &#60;?php einzufuegen.</li>
<li>Wenn Sie ein Content Management Script nutzen (Forum, Blog, Galerie, CMS, etc.), schauen Sie sich www.crawltrack.fr/doccms.php an, um die Beste L�sung zum Einbau des Codes zu erhalten.</li>
<li>Der CrawlTrack tag gibt keinerlei sichtbare Daten am Bildschirm aus (nicht einmal im Quelltext).</li>
<li>Wenn Sie CrawlTrack mit einem Logo und einem Link zu www.crawltrack.fr unterstuetzen moechten, finden Sie weiter unten Codes, die Sie auf Ihren Seiten einbinden koennen.</li>
<li>Fuer weitere Fragen, lesen Sie bitte die Dokumentation auf www.crawltrack.fr oder nutzen das Supportforum unter dem selben Link.</li></ul></p><br>" ;
$language['site_name2']="Name der Website";
//modified in 1.5.0
$language['local_tag']="Nutzen Sie das Standard Tag, wenn Crawltrack und Ihre Website auf dem gleichen Server gehostet werden.";
$language['non_local_tag']="Nutzen Sie dieses Tag, wenn Crawltrack und Ihre Website auf unterschiedlichen Servern gehostet werden. In diesem Fall m�ssen die Funktionen fsockopen und fputs aktiviert sein.";
//login set_up
$language['admin_creation']="Einrichtung des Administratorkontos";
$language['admin_setup']="Bitte Benutzername und Passwort f�r den Administrator definieren.";
$language['user_creation']="Einrichtung eines Benutzerkontos";
$language['user_setup']="Bitte Benutzername und Passwort definieren.";
$language['user_site_creation']="Einrichtung eines Benutzer-Website-Kontos";
$language['user_site_setup']="Bitte Benutzername und Passwort definieren.";
$language['admin_rights']="Administratoren haben Zugang zu allen Statistiken und zum Setup";
$language['login']="Benutzername";
$language['password']="Passwort";
$language['valid_password']="Wiederholung des Passworts.";
$language['login_no_ok']="Fehlende Daten oder unterschiedliche Passw�rter, �berpr�fung Sie das Formular.";
$language['login_ok']="Das Konto wurde erstellt.";
$language['login_no_ok2']="Es ist ein Problem beim Aufbau des Kontos aufgetaucht, versuchen Sie es noch einmal.";
$language['login_user']="Einrichtung eines Benutzerkontos";
$language['login_user_what']="Benutzer haben Zugang zu allen Statistiken";
$language['login_user_site']="Einrichtung eines Benutzer-Website-Kontos";
$language['login_user_site_what']="Benutzer-Website-Konten haben NUR Zugang zu den Statistiken der ausgew�hlten Website";
//modified in 1.5.0
$language['login_finish']="Installation abgeschlossen. Bitte vergessen Sie nicht, die Tags auf Ihren Webseiten einzubauen.";
//access
$language['restrited_access']="Gesch�tzter Zugang";
$language['enter_login']="Bitte geben Sie Ihren Benutzernamen und Ihr Passwort ein.";
//display
$language['crawler_name']="Crawler";
$language['nbr_visits']="Besuche";
$language['nbr_pages']="Gesehene Seiten";
$language['date_visits']="Letzter Besuch";
$language['display_period']="Analysierter Zeitraum:";
$language['today']="Tag";
$language['days']="Woche";
//modified in 1.5.0
$language['month']="Monat";
$language['one_year']="Jahr";
$language['no_visit']="Kein Besuch.";
$language['page']="Seiten";
//modified in 1.5.0
$language['admin']="Tools";
$language['nbr_tot_visits']="Alle Besuche";
$language['nbr_tot_pages']="Alle besuchten Seiten";
$language['nbr_tot_crawlers']="Anzahl der Crawler";
$language['visit_per-crawler']="Besucherdetails";
$language['100_visit_per-crawler']="Besucherdetails (die Anzeige ist auf 100 Zeilen beschr�nkt).";
$language['user_agent']="Benutzeragent";
$language['Origin']="Benutzer";
$language['help']="Hilfe";
//search
$language['search']="Suche";
$language['search2']="Suche";
$language['search_crawler']="einen Crawler";
$language['search_user_agent']="einen Benutzeragenten";
$language['search_page']="eine Seite";
$language['search_user']="einen Crawlerbenutzer";
$language['go_search']="Suche";
$language['result_crawler']="Hier die gesuchten Crawler.";
$language['result_ua']="Hier die gesuchten Benutzeragenten.";
$language['result_page']="Hier die gesuchten Seiten.";
$language['result_user']="Hier die gesuchten Crawlerbenutzer.";
$language['result_user_crawler']="Hier die Crawler f�r diesen Benutzer.";
$language['result_user_1']="Benutzer:&nbsp;";
$language['result_crawler_1']="Keywordsuche:&nbsp;";
$language['no_answer']="Keine Antwort.";
$language['to_many_answer']="Es gibt mehr als 100 Antworten (das Display ist auf 100 Zeilen beschr�nkt).";
//admin
$language['user_create']="Neues Benutzerkonto anlegen";
$language['user_site_create']="Neues Benutzer-Website-Konto anlegen";
$language['new_site']="Neue Website anlegen";
$language['see_tag']="Anzeigen des Programmcodes, der meinen Seiten hinzugef�gt werden mu�";
$language['new_crawler']="Crawler hinzuf�gen";
$language['crawler_creation']="Bitte vervollst�ndigen Sie das folgende Formular mit den neuen Crawlerdaten."; 
$language['crawler_name2']="Name des Crawlers:";
$language['crawler_user_agent']="Benutzeragent:";
$language['crawler_user']="Crawlerbenutzer:";
$language['crawler_url']="Benutzer-URL (z. Bspl.: http://www.example.com)";
$language['crawler_url2']="Benutzer-URL:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Fehlende Daten, bitte �berpr�fen Sie Ihre Eingaben.";
$language['exist']="Dieser Crawler befindet bereits in der Datenbank";
$language['exist_data']="Hier die Daten aus der Datenbank:";
$language['crawler_no_ok2']="Bei der Einrichtung des Crawlers ist ein Problem aufgetreten, neuer Versuch.";
$language['crawler_ok']="Der Crawler wurde der Datenbank hinzugef�gt.";
$language['user_suppress']="Benutzer- oder Benutzer-Website-Konten l�schen";
$language['user_list']="Bestehende Konten";
$language['suppress_user']="l�schen";
$language['user_suppress_validation']="M�chten Sie dieses Konto wirklich l�schen?";
$language['yes']="Ja";
$language['no']="Nein";
$language['user_suppress_ok']="Das Konto wurde erfolgreich gel�scht.";
$language['user_suppress_no_ok']="Bei der L�schung des Kontos ist ein Problem aufgetaucht, neuer Versuch.";
$language['site_suppress']="Website(s) l�schen";
$language['site_list']="Definierte Websites";
$language['suppress_site']="l�schen";
$language['site_suppress_validation']="M�chten Sie diese Website wirklich l�schen?";
$language['site_suppress_ok']="Die Website wurde erfolgreich gel�scht.";
$language['site_suppress_no_ok']="Bei der L�schung der Website ist ein Problem aufgetaucht, neuer Versuch.";
$language['crawler_suppress']="Crawler l�schen";
$language['crawler_list']="Liste der Crawler";
$language['suppress_crawler']="l�schen";
$language['crawler_suppress_validation']="M�chten Sie diesen Crawler wirklich l�schen?";
$language['crawler_suppress_ok']="Der Crawler wurde erfolgreich gel�scht.";
$language['crawler_suppress_no_ok']="Bei der L�schung des Crawlersist ein Problem aufgetaucht, neuer Versuch.";
$language['crawler_test_creation']="Testcrawler einrichten";
$language['crawler_test_suppress']="Testcrawler l�schen";
$language['crawler_test_text']="Wenn der Testcrawler eingerichtet ist, besuchen Sie Ihre Seiten mit dem Computer und dem Browser, mit dem Sie den Testcrawler angelegt haben."; 
$language['crawler_test_text2']="Wenn alles in Ordnung ist, werden Ihre Besuche in CrawlTrack angezeigt. Vergessen Sie nicht den Testcrawler nach dem Test zu l�schen.";
$language['crawler_test_no_exist']="Der Testcrawler existiert nicht in der Datenbank.";
$language['exist_site']="Diese Site wurde bereits angelegt.";
$language['exist_login']="Dieser Benutzername ist schon vergeben.";
//1.2.0
$language['update_title']="Update Crawlerliste";
$language['update_crawler']="Crawlerliste updaten";
$language['list_up_to_date']="Keine neuen Updates vorhanden.";
$language['update_ok']="Update in Arbeit.";
$language['crawler_add']="Neue Crawler wurden der Datenbank hinzugef�gt.";
$language['no_access']="Das Update ist nicht verf�gbar.<br><br>Zum Download der neuesten Crawlerliste bitte den Link unten klicken und kopieren Sie die Datei 'crawlerlist.php' in Ihr include Verzeichnis. Bitte starten Sie danach die Updateprozedur.";
$language['no_access2']="Zugriff auf www.CrawlTrack.info nicht m�glich, versuchen Sie es sp�ter noch einmal.";
$language['download_update']="Wenn auf Ihrer Site eine neue Crawlerliste existiert, klicken Sie bitte unten, um die Daten in die Datenbank zu kopieren.";
$language['download']="Crawlerliste herunterladen.";
$language['your_list']="Versionsnummer Ihrer Liste:";
$language['crawltrack_list']="Versionsnummer der Liste auf www.Crawltrack.fr:";
$language['no_update']="Crawlerliste nicht updaten";
$language['no_crawler_list']="Die crawlerlist.php Datei existiert nicht im include Verzeichnis.";
//1.3.0
$language['use_user_agent']="Die Feststellung kann durch Benutzeragent oder durch IP erfolgen. Sie m�ssen also weitere Informationen eingeben";
$language['user_agent_or_ip']="Benutzeragent oder IP";
$language['crawler_ip']="IP: ";
$language['table_mod_ok']="�nderung der Datenbank erfolgreich.";
$language['files_mod_ok']="�nderung der Dateien 'configconnect.php' und 'crawltrack.php' erfolgreich.";
$language['update_crawltrack_ok']="Die Aktualisierung CrawlTrack wird beendet, Sie benutzen jetzt Version:";
$language['table_mod_no_ok']="Die �nderung der Datenbank konnte nicht erfolgen.";
$language['files_mod_no_ok']="Es hat ein Problem bei der Aktualisierung von 'configconnect.php' und 'crawltrack.php' gegeben.";
$language['update_crawltrack_no_ok']="Die Aktualisierung von CrawlTrack konnte nicht erfolgen.";
$language['logo']="Wahl des Logos.";
$language['logo_choice']="W�hlen Sie das Logo, das auf Ihrer Seite am Ort des Tags von CrawlTrack angezeigt werden soll. Wenn Sie kein Logo verwenden m�chten, w�hlen Sie die Option: \"Kein Logo\"";
$language['no_logo']="Kein Logo.";
//modified in 1.5.0
$language['data_suppress_ok']="Die Daten wurden erfolgreich archiviert.";
$language['data_suppress_no_ok']="W&auml;hrend der Archivierung ist ein Problem aufgetreten. Bitte versuchen Sie es noch einmal.";
$language['data_suppress_validation']="Sind Sie sicher, dass Sie alle Daten archivieren wollen? &nbsp;";
$language['data_suppress']="Die �ltesten Daten der Visits Tabelle archivieren..";
$language['data_suppress2']="Alles archivierenl";
$language['one_year_data']="Daten, die &auml;lter sind als 1 Jahr";
$language['six_months_data']="Daten, die &auml;lter sind als 6 Monate";
$language['one_month_data']="Daten, die &auml;lter sind als 1 Monat";
$language['oldest_data']="Die �ltesten Daten von &nbsp;";
$language['no_data']="Es gibt keine Daten in der Visits Tabelle.";
//1.4.0
$language['time_set_up']="Zeitverschiebung";
$language['server_time']="Serverdatum und Stunde =";
$language['local_time']="Lokales Datum und Stunde =";
$language['time_difference']="Unterschied zwischen Serverzeit und lokaler Zeit: ";
$language['time_server']="Sie verwenden die Serverzeit, m�chten Sie auf die lokale Zeit umschalten?";
$language['time_local']="Sie verwenden die lokale Zeit, m�chten Sie auf die Serverzeit umschalten?";
$language['decal_ok']="CrawlTrack verwendet jetzt die lokale Zeit. Sie k�nnen jederzeit wieder auf die Serverzeit umschalten.";
$language['nodecal_ok']="CrawlTrack verwendet jetzt die Serverzeit. Sie k�nnen jederzeit wieder auf die lokale Zeit umschalten.";
$language['need_javascript']="Sie m�ssen Javascript aktivieren, um diese Funktion zu verwenden.";
//1.5.0 
$language['origin']="Quelle";
$language['crawler_ip_used']="IP-Adresse";
$language['crawler_country']="Herkunftsland";
$language['other']="Others";
$language['pc-page-view']="Besuchter Teil der Seite";
$language['pc-page-noview']="Nicht-besuchter Teil der Seite";
$language['print']="Drucken";
$language['ip_suppress_ok']="Die Visits wurden erfolgreich gel&ouml;scht.";
$language['ip_suppress_no_ok']="W�hrend der L&ouml;schung ist ein Problem aufgetreten. Bitte versuchen Sie es noch einmal.";
$language['no_ip']="F&uuml;r diesen Zeitraum wurden keine IP-Adressen registriert.";
$language['ip_suppress_validation']="Die IP-Adresse wurde von mehreren Crawlern genutzt, deshalb ist die Herkunft der Visits unklar. M&ouml;chten Sie Visits von dieser IP aus der Tabelle entfernen?";
$language['ip_suppress_validation2']="Sind Sie sicher, dass Sie Visits von dieser IP-Adresse unterdr&uuml;cken wollen?";
$language['ip_suppress_validation3']="Wenn Sie Visits von dieser IP unterdr&uuml;cken wollen, erg�nzen Sie folgende Zeilen in Ihrer .htaccess Datei:";
$language['ip_suppress']="IP-Adresse unterdr�cken";
$language['diff-day-before']="Mit Vortag vergleichen";
$language['daily-stats']="Tagesstatistik";
$language['top-crawler']="Weitere aktive Crawler";
$language['stat-access']="Statistikdetails ansehen:";
$language['stat-crawltrack']="Diese Daten wurden aufgezeichnet mit:";
$language['nbr-pages-top-crawler']="Besucht:";
$language['of-site']="der Seite";
$language['mail']="T�glichen Bericht per E-Mail empfangen.";
$language['set_up_mail']="Wenn Sie t�glich eine Zusammenfassung der Statistik via Email erhalten wollen, geben Sie bitte Ihre Email Adresse unten ein.";
$language['email-address']="E-Mail Adresse:";
$language['address_no_ok']="Die eingegebene Adresse ist nicht korrekt.";
$language['set_up_mail2']="Der t�gliche Bericht per E-Mail wurde aktiviert. M�chten Sie ihn stoppen?";
$language['update']="Die �nderung wurde gespeichert.";
$language['search_ip']="IP-Adresse tracken";
$language['ip']="IP-Adresse";
$language['maxmind']="Diese Aufzeichung nutzt die GeoLite Datenbanken von Maxmin, verf�gbar �ber:";
$language['ip_no_ok']="Die eingegebene IP-Adresse ist nicht korrekt..";
$language['public']="Zugriff zur Statistik komplett freischalten.";
$language['public-set-up2']="Der Zugang zur Statistik ist komplett freigegeben, m�chten Sie ihn passwortsch�tzen?";
$language['public-set-up']="Der Zugang zur Statistik ist passwortgesch�tzt, m�chten Sie ihn freigeben?";
$language['public2']="Nur die Tools-Seite ist passwortgesch�tzt.";
$language['admin_protected']="Der Zugang zur Tools-Seite ist passwortgesch�tzt.";
$language['no_data_to_suppress']="F�r diesen Zeitraum existieren keine Daten im Archiv.";
$language['data_suppress3']="Das Archivieren von Daten reduziert die Datenmenge in der Datenbank. Die archivierten Daten sind allerdings nicht mehr Statistik-Ansicht zu sehen. Es wird nur eine Zusammenfassung dieser Daten im Bereich Archiv zur Verf�gung stehen. Sie sollten also Daten nur dann archivieren, wenn Sie wirklich Platz in Ihrer Datenbank freimachen m�chten. Details der archivierten Daten gehen unwiderbringlich verloren.";
$language['archive']="Archiv";
$language['month2']="Monat";
$language['top_visits']="Top 3 nach Anzahl der Visits";
$language['top_pages']="Top 3 nach Anzahl der besuchten Seite";
$language['no-archive']="Keine Daten archiviert.";
$language['use-archive']="Diese Angabe ist nicht vollst&auml; da diese Daten teilweise archiviert sind.";
$language['url_update']="Update der Seitendaten";
$language['set_up_url']="Tragen Sie in die Tabelle die URL(s) Ihrer Website(s) ein, z.B. www.example.com (ohne http:// am Anfang und / am Ende)."; 
$language['site_url']="URL Ihrer Seite:";
//1.6.0
$language['page_cache']="Letzte Berechnung: ";
//1.7.0
$language['step1_install_no_ok4']="W�hrend des f�llens der IP Tabelle ist ein Problem aufgetreten, dies kann bei manchen Hostern vorkommen, da diese Tabelle 78 000 Zeilen enth�lt. Sie k�nnen es erneut versuchen oder ohne diese Tabelle fortfahren. In diesem Fall ist aber keine �bersicht �ber die L�nderherkunft der Crawler verf�gbar. Auf der 'Troubleshooting' Seite der Dokumentation auf  www.crawltrack.fr, finden Sie Informationen, wie Sie diese Tabelle manuell f�llen k�nnen.";
$language['show_all']="Alle Zeilen zeigen";
$language['from']="von";
$language['to']="bis";
$language['firstweekday-title']="Wahl des ersten Tages der Woche";
$language['firstweekday-set-up2']="Der erste Tag der Woche ist jetzt der Montag, wollen Sie zu Sonntag wechseln??";
$language['firstweekday-set-up']="Der erste Tag der Woche ist jetzt der Sonntag, wollen Sie zu Montag wechseln?";
$language['01']="Januar";
$language['02']="Februar";
$language['03']="M�rz";
$language['04']="April";
$language['05']="Mai";
$language['06']="Juni";
$language['07']="Juli";
$language['08']="August";
$language['09']="September";
$language['10']="Oktober";
$language['11']="November";
$language['12']="Dezember";
$language['day0']="Montag";
$language['day1']="Dienstag";
$language['day2']="Mittwoch";
$language['day3']="Donnerstag";
$language['day4']="Freitag";
$language['day5']="Samstag";
$language['day6']="Sonntag";
//2.0.0
$language['ask']="Ask";
$language['google']="Google";
$language['msn']="Live Search";
$language['yahoo']="Yahoo";
$language['delicious']="Del.icio.us";
$language['index']="Indexierung";
$language['keyword']="Suchbegriff";
$language['entry-page']="Einstiegsseite";
$language['searchengine']="Suchmaschinen";
$language['social-bookmark']="Social bookmarks";
$language['tag']="Tags";
$language['nbr_tot_bookmark']="Bookmarks";
$language['nbr_tot_link']="Backlinks";
$language['nbr_tot_pages_index']="Indizierte Seite";
$language['nbr_visits_crawler']="Anzahl der Crawlerbesuche";
$language['nbr_tot_visit_seo']="Anzahl Besucher";
$language['100_lines']="Anzeige auf 100 Eintr&auml;ge limitiert";
$language['8days']="Seit 8 Tagen";
$language['close']="Schliessen";
$language['date']="Datum";
$language['modif_site']="Modifiziert Namen oder Url einer Seite.";
$language['site_url2']="URL der Seite";
$language['modif_site2']="Daten dieser Seite &auml;dern";
$language['no-info-day-before']="Keine Daten f�r Vortag vorhanden";
$language['data_human_suppress_ok']="Die Daten wurden erfolgreich gel�scht.";
$language['data_human_suppress_no_ok']="Bei der L�schung der Daten ist ein Problem aufgetaucht, neuer Versuch.";
$language['data_human_suppress_validation']="M�chten Sie wirklich &nbsp;";
$language['data_human_suppress']="Alte Daten aus Besuchertabelle l�schen (Suchbegriffe und Einstiegsseiten).";
$language['data_human_suppress2']="&nbsp;";
$language['one_year_human_data']="alle Daten l�schen, die �lter als ein Jahr sind?";
$language['six_months_human_data']="alle Daten l�schen, die �lter als 6 Monate sind?";
$language['one_month_human_data']="alle Daten l�schen, die �lter als ein Monat sind?";
$language['data_human_suppress3']="Die Datenkompression reduziert den Speicheraufwand, komprimierte Daten sind aber nicht mehr verf�gbar f�r die Statistikdarstellung. Komprimieren Sie deshalb nur Daten, wenn Sie unbedingt die Gr��e des Speicherplatz reduzieren m�ssen. Komprimierte Daten k�nnen nicht wieder hergestellt werden.";
$language['no_data_human_to_suppress']="Keine Daten in der Besuchertabelle vorhanden.";
$language['choose_language']="W�hlen Sie Ihre Sprache.";
//2.1.0
$language['since_beginning']="Alles";
//2.2.0
$language['admin_database']="Datenbank-Groesse ansehen";
$language['table_name']="Tabellen-Name";
$language['nbr_of_data']="Anzahl Daten";
$language['table_size']="Tabellen Groesse";
$language['database_size']="Datenbank Groesse";
$language['total']="Total:";
$language['mailsubject']="CrawlTrack taeglicher Bericht";
$language['beginmonth']="Seit Beginn des Monats";
$language['evolution']="Veraenderung im Vergleich zu";
$language['lastthreemonths']="3 letzten Monate";
$language['set_up_mail3']="Folgende Adresse wird momentan verwendet:";
$language['set_up_mail4']="Adresse zufuegen";
$language['set_up_mail5']="Neue Email Adresse unten eintragen.";
$language['set_up_mail6']="Eine oder mehr Email Adressen loeschen";
$language['set_up_mail7']="Ausgewaehlte Adressen loeschen";
$language['chmod_no_ok']="Das update der crawltrack.php ist fehlgeschlagen. Setzen Sie f�r den Crawltrack Ordner CHMOD 777 und starten Sie das Update neu. Vergessen Sie nicht den Ordner nach dem update aus Sicherheitsgruenden wieder auf CHMOD 711 zu setzen";
$language['display_parameters']="Anzeige Einstellungen";
$language['ordertype']="Reihenfolge:";
$language['orderbydate']="nach Datum";
$language['orderbypagesview']="nach Anzahl gesehener Seiten";
$language['orderbyvisites']="nach Anzahl der Besuche";
$language['orderbyname']="alphabetische Reihenfolge";
$language['numberrowdisplay']="Anzahl der anzuzeigenden Zeilen:";
//2.2.1
$language['french']="Franz�sisch";
$language['english']="Englisch";
$language['german']="Deutsch";
$language['spanish']="Spanisch";
$language['turkish']="T�rkisch";
$language['dutch']="Holl�ndisch";
//2.3.0
$language['hacking']="Angriffe";
$language['hacking2']="Hackingversuche";
$language['no_hacking']="Es gab keine Angriffe";
$language['attack_detail']="Details der Angriffe";
$language['attack']="Typ des Angriffs";
$language['bad_site']="Datei / Script, welches der Hacker hochladen wollte";
$language['bad_url']="URL(s) des Angriffs";
$language['hacker']="Angreifer";
$language['date_hacking']="Zeit";
$language['unknown']="Unbekannt";
$language['hacking3']="Code injection";
$language['hacking4']="SQL injection";
$language['attack']="Parameter genutzt fuer code injection Versuche";
$language['attack_sql']="Parameters genutzt fuer sql injection Versuche";
$language['bad_sql']="SQL query, die der Hacker versuchte einzuschleusen";
$language['danger']="Es koennte ein Risiko bestehen, wenn Sie eines folgender Scripte nutzen";
$language['attack_number_display']="Angreifer details (Anzeige begrenzt auf %d Angreifer).";
$language['update_attack']="Angreifer-Liste aktualisieren.";
$language['no_update_attack']="Angreifer-Liste nicht aktualisieren.";
$language['update_title_attack']="Angreifer-Liste aktualisieren.";
$language['attack_type']="Typ des Angriffs";
$language['parameter']="Parameter";
$language['script']="Script";
$language['attack_add']="Angriffe wurden der datenbank zugefuegt";
$language['no_access_attack']="Online update ist nicht verfuegbar.<br><br>Um upzudaten, klicken Sie auf den unten sthenden Link um sich die neueste Angriffsliste zu laden, laden Sie dann die attacklist.php in Ihren CrawlTrack include Ordner und starten den Updateprozess erneut.";
$language['download_update_attack']="Falll Sie bereits die neue Liste hochgeladen haben, klicken Sie unten stehen Button um die Datenbank upzudaten.";
$language['download_attack']="Download der Angriffliste.";
$language['no_attack_list']="Eine attacklist.php existiert nicht in Ihrerm include Ordner.";
$language['change_password']="Passwort aendern";
$language['old_password']="Aktuelles Passwort";
$language['new_password']="Neues Passwort";
$language['valid_new_password']="Neues Passwort (Wiederholung).";
$language['goodsite_update']="Update der Liste vertrauenswuerdiger Seiten";
$language['goodsite_list']="Vertrauenswuerdige Seiten";
$language['goodsite_list2']="Kommt ein Link zu diesen Seiten in einer Url vor, wird sie nicht als Angriff gewertet.";
$language['goodsite_list3']="Aktuelle Liste vertrauenswuerdiger Seiten";
$language['suppress_goodsite']="Diese Seite von der Liste streichen.";
$language['goodsite_suppress_validation']="Sind Sie sicher, dass sie diese Seiten von der Liste streichen wollen?";
$language['good_site']="Seite vertrauen";
$language['goodsite_suppress_ok']="Diese Seite wurde von der Liste entfernt.";
$language['goodsite_suppress_no_ok']="Beim entfernen ist ein Problem aufgetreten. Bitte versuchen Sie es erneut.";
$language['list_empty']="Es gib noch keine vertrauenswuerdigen Seiten in der Liste";
$language['add_goodsite']="Eine Seite in die Liste aufnehmen";
$language['goodsite_no_ok']="Sie muessen eine Webseiten Url angeben.";
$language['attack-blocked']="All diese Angriffe werden wie gewuenscht von CrawlTrack geblockt";
$language['attack-no-blocked']="Vorsicht ! Ihr CrawlTrack ist nicht eingestellt, um Angriffe zu blocken ! (siehe Einstellungen)";
$language['attack_parameters']="Hacking Schutz Parameter";
$language['attack_action']="Aktion wenn ein Angriff entdeckt wurde";
$language['attack_block']="Aufzeichnen und blocken";
$language['attack_no_block']="Nur aufzeichnen";
$language['attack_block_alert']="Bevor Sie Angriffe blocken, was sicherlich das Beste f�r Ihre Seitensicherheit ist, schauen Sie sich bitte die Dokumentation auf www.crawltrack.fr an, um sicher zu stellen, dass Ihre normalen Besucher keine Probleme beim Seitenbesuch haben.";
$language['crawltrack-backlink']="CrawlTrack ist kostenlos. Wenn Sie es moegen und wollen, dass andere es auch einsetzen warum kein Logo dazu nutzen?<br>Wenn Sie aber die nologo option nutzen, wird der Link unsichtbar. Sie finden unten je 2 Optionen pro Logo: Eine fuer eine Php Seite und die zweite fuer eine Html Seite. Sie koennen den Link irgendwo auf Ihren Seiten anbringen.";
$language['session_id_parameters']="Session Id Behandlung";
$language['remove_session_id']="Entferne Session Id aus Seiten Url";
$language['session_id_alert']="Wenn Sie Session Ids entfernen, vermeiden Sie multiple Eintraege in die Datenbank.";
$language['session_id_used']="genutzte Session Id";
//country code
$country = array(
"ad" => "Andorra",
"ae" => "Vereinigte Arabische Emirate",
"af" => "Afghanistan",
"ag" => "Antigua und Barbuda",
"ai" => "Anguilla",
"al" => "Albanien",
"am" => "Armenien",
"an" => "Die Niederlande Antillen",
"ao" => "Angola",
"aq" => "Antarktik",
"ar" => "Argentinien",
"as" => "Amerikanische Samoa-Inseln",
"at" => "�sterreich ",
"au" => "Australien",
"aw" => "Aruba",
"az" => "Aserbaidschan",
"ba" => "Bosnien und Herzegowina",
"bb" => "Barbados",
"bd" => "Bangladesch",
"be" => "Belgien",
"bf" => "Burkina Faso",
"bg" => "Bulgarien",
"bh" => "Bahrain",
"bi" => "Burundi",
"bj" => "Benin",
"bm" => "Bermuda",
"bn" => "Brunei",
"bo" => "Bolivien",
"br" => "Brasilien",
"bs" => "Bahamas",
"bt" => "Bhutan",
"bw" => "Botsuana",
"by" => "Wei�russland",
"bz" => "Belize",
"ca" => "Kanada",
"cd" => "Demokratische Republik Kongo",
"cf" => "Zentralafrikanische Republik",
"cg" => "Kongo",
"ch" => "Schweiz",
"ci" => "Elfenbeink�ste",
"ck" => "Cook Islands",
"cl" => "Chile",
"cm" => "Kamerun",
"cn" => "China",
"co" => "Kolumbien",
"cr" => "Costa Rica",
"cs" => "Serbien",
"cu" => "Kuba",
"cv" => "Kap Verde",
"cx" => "Weihnachtsinsel",
"cy" => "Zypern",
"cz" => "Tschechien",
"de" => "Deutschland",
"dj" => "Dschibuti",
"dk" => "D�nemark",
"dm" => "Dominica",
"do" => "Dominikanische Republik",
"dz" => "Algerien",
"ec" => "Ecuador",
"ee" => "Estland",
"eg" => "�gypten",
"er" => "Eritrea",
"es" => "Spanien",
"et" => "�thiopien",
"fi" => "Finnland",
"fj" => "Fidschi",
"fk" => "Falklandinseln",
"fm" => "Mikronesien",
"fo" => "Faroe Inseln",
"fr" => "Frankreich",
"ga" => "Gabun",
"gb" => "Gro�britannien",
"gd" => "Grenada",
"ge" => "Georgien",
"gf" => "Franz�sisches Guyana",
"gh" => "Ghana",
"gi" => "Gibraltar",
"gl" => "Gr�nland",
"gm" => "Gambia",
"gn" => "Guinea",
"gp" => "Guadeloupe",
"gq" => "�quatorialguinea",
"gr" => "Griechenland",
"gs" => "South Georgia and the South Sandwich Islands",
"gt" => "Guatemala",
"gu" => "Guam",
"gw" => "Guinea-Bissau",
"gy" => "Guyana",
"hk" => "Hong Kong",
"hn" => "Honduras",
"hr" => "Kroatien",
"ht" => "Haiti",
"hu" => "Ungarn",
"id" => "Indonesien",
"ie" => "Irland",
"il" => "Israel",
"in" => "Indien ",
"io" => "British Indian Ocean Territory",
"iq" => "Irak",
"ir" => "Iran",
"is" => "Island",
"it" => "Italien",
"jm" => "Jamaika",
"jo" => "Jordanien",
"jp" => "Japan",
"ke" => "Kenia",
"kg" => "Kirgisistan",
"kh" => "Kambodscha",
"ki" => "Kiribati",
"km" => "Komoren",
"kn" => "St. Kitts und Nevis",
"kr" => "S�dkorea",
"kw" => "Kuwait",
"ky" => "Cayman-Inseln",
"kz" => "Kasachstan",
"la" => "Laos",
"lb" => "Libanon",
"lc" => "Saint Lucia",
"li" => "Liechtenstein",
"lk" => "Sri Lanka",
"lr" => "Liberia",
"ls" => "Lesotho",
"lt" => "Litauen",
"lu" => "Luxemburg",
"lv" => "Lettland",
"ly" => "Libyen",
"ma" => "Marokko",
"mc" => "Monaco",
"md" => "Moldawien",
"mg" => "Madagaskar",
"mh" => "Marshallinseln",
"mk" => "Mazedonien",
"ml" => "Mali",
"mm" => "Myanmar",
"mn" => "Mongolei",
"mo" => "Macau",
"mp" => "Northern Mariana Islands",
"mq" => "Martinique",
"mr" => "Mauretanien",
"ms" => "Montserrat",
"mt" => "Malta",
"mu" => "Mauritius",
"mv" => "Malediven",
"mw" => "Malawi",
"mx" => "Mexiko",
"my" => "Malaysia",
"mz" => "Mosambik",
"na" => "Namibia",
"nc" => "Neu-Kaledonien",
"ne" => "Niger",
"nf" => "Norfolk Insel",
"ng" => "Nigeria",
"ni" => "Nicaragua",
"nl" => "Niederlande",
"no" => "Norwegen",
"np" => "Nepal",
"nr" => "Nauru",
"nu" => "Niue",
"nz" => "Neuseeland",
"om" => "Oman",
"pa" => "Panama",
"pe" => "Peru",
"pf" => "Franz�sische Polinesien",
"pg" => "Papua-Neuguinea",
"ph" => "Philippinen",
"pk" => "Pakistan",
"pl" => "Polen",
"pr" => "Puerto Rico",
"ps" => "Pal�stina",
"pt" => "Portugal",
"pw" => "Palau",
"py" => "Paraguay",
"qa" => "Katar",
"re" => "Reunion Island",
"ro" => "Rum�nien",
"ru" => "Russland",
"rs" => "Russland",
"rw" => "Ruanda",
"sa" => "Saudi-Arabien",
"sb" => "Salomonen",
"sc" => "Seychellen",
"sd" => "Sudan",
"se" => "Schweden",
"sg" => "Singapur",
"sh" => "Saint Helena",
"si" => "Slowenien",
"sj" => "Svalbard",
"sk" => "Slowakei",
"sl" => "Sierra Leone",
"sm" => "San Marino",
"sn" => "Senegal",
"so" => "Somalia",
"sr" => "Suriname",
"st" => "S�o Tom� und Pr�ncipe",
"sv" => "El Salvador",
"sy" => "Syrien",
"sz" => "Schweiz",
"td" => "Tschad",
"tf" => "Franz�sische S�dliche Gegenden",
"tg" => "Togo",
"th" => "Thailand",
"tj" => "Tadschikistan",
"tk" => "Tokelau",
"tl" => "Osttimor",
"tm" => "Turkmenistan",
"tn" => "Tunesien",
"to" => "Tonga",
"tr" => "T�rkei",
"tt" => "Trinidad und Tobago",
"tv" => "Tuvalu",
"tw" => "Taiwan",
"tz" => "Tansania",
"ua" => "Ukraine",
"ug" => "Uganda",
"us" => "USA",
"uy" => "Uruguay",
"uz" => "Usbekistan",
"va" => "Vatikanstadt",
"vc" => "St. Vincent und die Grenadinen",
"ve" => "Venezuela",
"vg" => "Virgin Islands, British",
"vi" => "Virgin Islands, U.S.",
"vn" => "Vietnam",
"vu" => "Vanuatu",
"ws" => "Samoa",
"ye" => "Jemen",
"yt" => "Mayotte",
"za" => "S�dafrika",
"zm" => "Sambia",
"zw" => "Zimbabwe",
"xx" => "Unbekannt",
"a2" => "Unbekannt",
"eu" => "European Union",       
);
?>