<?php
//----------------------------------------------------------------------
//  CrawlTrack 2.3.0
//----------------------------------------------------------------------
// Crawler Tracker for website
//----------------------------------------------------------------------
// Author: Jean-Denis Brun
//----------------------------------------------------------------------
// Translation: Leo Vonk
//----------------------------------------------------------------------
// Website: www.crawltrack.fr
//----------------------------------------------------------------------
// That script is distributed under GNU GPL license
//----------------------------------------------------------------------
// file: dutchiso.php
//----------------------------------------------------------------------
//installation
$language['install']="Installatie";
$language['welcome_install'] ="Welkom bij CrawlTrack, installatie in drie eenvoudige stappen .";
$language['menu_install_1']="1) Voer de database toegangsgegevens in dit formulier in.";
$language['menu_install_2']="2) Set-up websites.";
$language['menu_install_3']="3) Beheerders account set-up.";
$language['go_install']="Installeren";
$language['step1_install'] ="Voer de volgende gegevens in voor toegang tot de database, als de invoer wordt goedgekeurd wordt de database automatisch aangemaakt.";
$language['step1_install_login_mysql']="Gebruikersnaam  MySQL";
$language['step1_install_password_mysql']="Password MySQL";
$language['step1_install_host_mysql']="Host MySQL";
$language['step1_install_database_mysql']="Database MySQL";
$language['step1_install_ok'] ="Toegangsgevens OK.";
$language['step1_install_ok2'] ="Tabellen aangemaakt OK.";
$language['step1_install_no_ok'] ="Er missen gegevens of deze zijn niet correct. Controleer het gegevensformulier en probeer opnieuw.";
$language['step1_install_no_ok2'] ="Het bestand kan niet worden gemaakt, controleer of de directory -include- is CHMOD 777.";
$language['step1_install_no_ok3'] ="Fout tijdens het maken van de tabellen, probeer opnieuw.";
$language['back_to_form'] ="Terug naar het formulier";
$language['retry'] ="Probeer opnieuw";
$language['step2_install_no_ok']="Kan geen verbinding maken met database, controleer de toegangsgegevens.";
$language['step3_install_no_ok']="Kan geen database selecteren, controleer de toegangsgegevens.";
$language['step4_install']="Ga";
//site creation
//modified in 1.5.0
$language['set_up_site']="Voer de website naam en url in, deze naam is de naam die Crawltrack gebruikt. Url voorbeeld: www.mijndomein.nl (zonder http:// aan het begin en zonder / aan het eind)."; 
$language['site_name']="Website naam:";
//modified in 2.0.0
$language['site_no_ok']="U moet een website naam en url invoeren.";
$language['site_ok']="De website is toegevoegd aan de database.";
$language['new_site']="Nieuwe website toevoegen";
//tag creation
$language['tag']="Tag om op uw website in te voegen";
//modified in 2.3.0
$language['create_tag']="<p><b>How to use that CrawlTrack tag:</b><br><ul id=\"listtag\">
<li>the CrawlTrack tag is a php file, you have to insert it in a .php page.</li>
<li>the CrawlTrack tag have to be between &#60;?php and ?&#62 tags, if there is not such tags on your page, you have to add them before and after the CrawlTrack tag.</li>
<li>if your site is not using .php pages, see documentation on www.crawltrack.fr.</li>
<li>the best for anti-hacking protection is to have the CrawlTrack tag being the first thing in your page just after &#60;?php.</li>
<li>if you are using any sort of content management script (discussion board, blog, gallery, CMS etc.), have a look on www.crawltrack.fr/doccms.php to find the best solution to place the tag.</li>
<li>the CrawlTrack tag will give absolutly no output  visible on your pages (even in the source code).</li>
<li>if to support CrawlTrack you would like to see the logo with a link to www.crawltrack.fr, you will find below logo models that you can put at any place on your pages.</li>
<li>for any other questions, see the documentation on www.crawltrack.fr or use the support forum on the same site.</li></ul></p><br>" ;
$language['site_name2']="Website naam";
//modified in 1.5.0
$language['local_tag']="Gebruik deze tag in het geval uw site zich op dezelfde server bevindt als Crawltrack.";
$language['non_local_tag']="Gebruik deze tag indien uw site zich op een andere server bevindt dan Crawltrack, in dit geval is het noodzakelijk de fsockopen en fputs functies te activeren.";
//login set_up
$language['admin_creation']="Beheerders account set-up";
$language['admin_setup']="Voer beheerders login en password in.";
$language['user_creation']="Gebruikers account set-up";
$language['user_setup']="Voer beheerders login and password in.";
$language['user_site_creation']="Gebruikers account set-up";
$language['user_site_setup']="Voer beheerders login and password in.";
$language['admin_rights']="De beheerder heeft toegang tot alle statistieken en set-up gegevens.";
$language['login']="Login";
$language['password']="Password";
$language['valid_password']="Herhaal het password.";
$language['login_no_ok']=" Gegevens niet juist of password niet hetzelfde, controleer de gegevens en probeer opnieuw.";
$language['login_ok']="Account is aangemaakt.";
$language['login_no_ok2']="Er is een probleem ontstaan tijdens de setup, probeer opnieuw.";
$language['login_user']="Aanmaken gebruikers account";
$language['login_user_what']="Gebruiker heeft toegang tot alle statistieken";
$language['login_user_site']="aanmaken gebruiker website account";
$language['login_user_site_what']="Gebruiker website heeft toegang tot de statistieken van 1 website";
//modified in 1.5.0
$language['login_finish']="Installatie is klaar. Vergeet niet de tag (beschikbaar op de tools pagina) op uw webpagina's te plaatsen.";
//access
$language['restrited_access']="Beveiligde toegang.";
$language['enter_login']="Vul onderstaand uw login and password in.";
//display
$language['crawler_name']="Crawlers";
$language['nbr_visits']="Bezoekers";
$language['nbr_pages']="Bekeken pagina's";
$language['date_visits']="Laatste bezoek";
$language['display_period']="Geselecteerde datum: ";
$language['today']="Dag";
$language['days']="Week";
//modified in 1.5.0
$language['month']="Maand";
$language['one_year']="Jaar";
$language['no_visit']="Er is nog geen crawler bezoek waargenomen.";
$language['page']="Pagina's";
//modified in 1.5.0
$language['admin']="Tools";
$language['nbr_tot_visits']="Totaal aantal bezoeken";
$language['nbr_tot_pages']="Totaal aantal bekeken pagina's";
$language['nbr_tot_crawlers']="aantal crawlers";
$language['visit_per-crawler']="Bezoek details";
$language['100_visit_per-crawler']="Bezoek details (display beperkt tot %d regels).";
$language['user_agent']="User agent";
$language['Origin']="Gebruiker";
$language['help']="Help";
//search
$language['search']="Zoeken";
$language['search2']="Zoeken";
$language['search_crawler']="Een crawler";
$language['search_user_agent']="Een user-agent";
$language['search_page']="Een pagina";
$language['search_user']="Een crawler gebruiker";
$language['go_search']="Zoeken";
$language['result_crawler']="Gevonden Crawlers.";
$language['result_ua']="Gevonden user-agents.";
$language['result_page']="Gevonden pagina's.";
$language['result_user']="Gevonden crawler gebruikers.";
$language['result_user_crawler']="Gevonden crawlers van deze gebruiker.";
$language['result_user_1']="Gebruiker:&nbsp;";
$language['result_crawler_1']="Zoek keyword:&nbsp;";
$language['no_answer']="Er is geen antwoord.";
$language['to_many_answer']="Er zijn meer dan 100 regels (display beperkt tot 100 regels).";
//admin
$language['user_create']="Maak nieuw gebruikers account aan.";
$language['user_site_create']="Maak een nieuwe website gebruikers account aan.";
$language['new_site']="Voeg een website toe.";
$language['see_tag']="Laat de tags om in te voegen zien.";
$language['new_crawler']="Voeg een nieuwe crawler toe";
$language['crawler_creation']="Vul het volgende formulier met de gegevens van de nieuwe Crawler."; 
$language['crawler_name2']="Crawler naam:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="Crawler gebruiker:";
$language['crawler_url']="Gebruikers url, url (voorbeeld: http://www.example.com)";
$language['crawler_url2']="Gebruikers url:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Er missen gegevens, controleer het formulier en probeer opnieuw.";
$language['exist']="Deze crawler is al in de database aanwezig";
$language['exist_data']="Dit is de betreffende data uit de datebase:";
$language['crawler_no_ok2']="Er is een probleem met het cre�ren van de crawler, probeer opnieuw.";
$language['crawler_ok']="De crawler is aan de database toegevoegd.";
$language['user_suppress']="Verwijder een gebruiker website account.";
$language['user_list']="Lijst van gebruikers en gebruiker websites logins";
$language['suppress_user']="Verwijder dit account";
$language['user_suppress_validation']="Bent u er zeker van dat u dit account wilt verwijderen?";
$language['yes']="Ja";
$language['no']="Nee";
$language['user_suppress_ok']="Het account is verwijderd.";
$language['user_suppress_no_ok']="Er is een probleem opgetreden tijdens het verwijderen, probeer het opnieuw.";
$language['site_suppress']="Verwijder een website .";
$language['site_list']="Websites lijst";
$language['suppress_site']="Verwijder deze website";
$language['site_suppress_validation']="bent u er zeker van dat u deze website wilt verwijderen?";
$language['site_suppress_ok']="De website is verwijderd.";
$language['site_suppress_no_ok']="Er is een probleem opgetreden tijdens het verwijderen, probeer het opnieuw.";
$language['crawler_suppress']="Verwijder een crawler.";
$language['crawler_list']="Crawler lijst";
$language['suppress_crawler']="Verwijder deze crawler";
$language['crawler_suppress_validation']="Bent u er zeker van dat u deze crawler wilt verwijderen?";
$language['crawler_suppress_ok']="De crawler is verwijderd.";
$language['crawler_suppress_no_ok']="Er is een probleem opgetreden tijdens het verwijderen, probeer het opnieuw.";
$language['crawler_test_creation']="Maak een test crawler.";
$language['crawler_test_suppress']="Verwijder de test crawler.";
$language['crawler_test_text']="Als de test crawler is aangemaakt gedraagt uw browser zich als test crawler."; 
$language['crawler_test_text2']="Als alles goed is verschijnen uw bezoeken met de test crawler in de statistieken van Crawltrack. Vergeet de test crawler niet te verwijderen!";
$language['crawler_test_no_exist']="De test crawler bestaat niet in de database.";
$language['exist_site']="Deze site is al in de database aanwezig";
$language['exist_login']="Deze login is al in database aanwezig";
//1.2.0
$language['update_title']="Crawlers update lijst .";
$language['update_crawler']="Update de crawlers lijst.";
$language['list_up_to_date']="Op dit moment zijn er geen updates beschikbaar.";
$language['update_ok']="Update geslaagd.";
$language['crawler_add']="Crawlers zijn toegevoegd aan de database";
$language['no_access']="Online update is niet beschikbaar.<br><br>Klik op onderstaande link om lijst met de laatste crawlers te downloaden., upload de crawlerlist.php file in uw CrawlTrack -include- directory en herstart de update procedure.";
$language['no_access2']="Link naar www.CrawlTrack.info werkt niet, probeer later opnieuw.";
$language['download_update']="Als u de nieuwe crawler lijst al hebt geupload, Klik dan hieronder op de knop om uw database bij te werken.";
$language['download']="Download de crawlers lijst.";
$language['your_list']="De lijst die u gebruikt is:";
$language['crawltrack_list']="De lijst, beschikbaar op www.Crawltrack.fr is:";
$language['no_update']="Werk de crawler lijst niet bij.";
$language['no_crawler_list']="Het bestand crawlerlist.php bestaat niet in uw include directory.";
//1.3.0
$language['use_user_agent']="Crawler detectie wordt gedaan op basis van user agent of IP. U moet een user agent of IP nummer invoeren.";
$language['user_agent_or_ip']="User agent of IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Crawlt_crawler tabel bijgwerkt OK.";
$language['files_mod_ok']="Configconnect.php and crawltrack.php bestanden bijgwerkt OK.";
$language['update_crawltrack_ok']="CrawlTrack bijwerken is klaar, u gebruikt nu versie:";
$language['table_mod_no_ok']="Crawlt_crawler tabel bijwerken mislukt.";
$language['files_mod_no_ok']="Er is een probleem ontstaan tijdens het bijwerken van configconnect.php and crawltrack.php.";
$language['update_crawltrack_no_ok']="Er is een probleem ontstaan tijdens het bijwerken van CrawlTrack.";
$language['logo']="Logo keuze.";
$language['logo_choice']="U kunt een logo kiezen dat verschijnt op de pagina's waarop de tag is geplaatst. Als u geen logo wilt kies dan: \"Geen logo\".";
$language['no_logo']="Geen logo.";
//modified in 1.5.0
$language['data_suppress_ok']="De informatie is verwerkt.";
$language['data_suppress_no_ok']="Er is een probleem ontstaan tijden het archiveren van de gegevens, probeer opnieuw.";
$language['data_suppress_validation']="Wilt u alles archiveren? &nbsp;";
$language['data_suppress']="Archiveer de oudste gegevens uit de bezoeken tabel.";
$language['data_suppress2']="Archiveer alles";
$language['one_year_data']="Gegevens meer dan 1 jaar oud";
$language['six_months_data']="Gegevens meer dan 6 maanden oud";
$language['one_month_data']="Gegevens meer dan 1 maand oud";
$language['oldest_data']="De oudste gegevens uit de &nbsp;";
$language['no_data']="Er bevindt zich geen informatie in de bezoeken tabel.";
//1.4.0
$language['time_set_up']="Tijd verschil";
$language['server_time']="Server datum en tijd=";
$language['local_time']="Locale datum and tijd=";
$language['time_difference']="Verschil in uren tussen de server tijd en de locale tijd=";
$language['time_server']=" U gebruikt nu de server tijd, wilt u de locale tijd gebruiken bij het laten zien van de informatie?";
$language['time_local']="U gebruikt nu de locale tijd, wilt u de server tijd gebruiken bij het laten zien van de informatie?";
$language['decal_ok']="CrawlTrack, gebruikt nu de locale tijd, u kunt altijd weer terug naar de server tijd.";
$language['nodecal_ok']="CrawlTrack, gebruikt nu de server tijd, u kunt altijd weer terug naar de locale tijd.";
$language['need_javascript']="Voor deze functie moet u javascript activeren.";
//1.5.0 
$language['origin']="Bron";
$language['crawler_ip_used']="Gebruikt IP";
$language['crawler_country']="Land van herkomst";
$language['other']="Anderen";
$language['pc-page-view']="Bezochte deel van de site";
$language['pc-page-noview']="Niet bezochte deel van de site";
$language['print']="Print";
$language['ip_suppress_ok']="De bezoeken zijn verwijderd.";
$language['ip_suppress_no_ok']="Er is een probleem opgetreden tijden het verwijderen van de bezoeken, probeer opnieuw.";
$language['no_ip']="Er zijn geen IP gegevens voor deze periode.";
$language['ip_suppress_validation']="Dit IP wordt door verschillende crawlers gebruikt, er bestaat dus twijfel over de herkomst van deze bezoeken. Wilt u deze gegevens verwijderen?";
$language['ip_suppress_validation2']="Weet u zeker dat u de gegevens afkomstig van dit IP wilt verwijderen?";
$language['ip_suppress_validation3']="Als u dit IP de toegang tot uw site wilt verbieden voeg dan de volgende regel toe aan uw htaccess bestand in de route directory:";
$language['ip_suppress']="Verwijder een IP";
$language['diff-day-before']="Vergelijk met de vorige dag";
$language['daily-stats']="Dagelijkse statistieken";
$language['top-crawler']="Meest active crawler:";
$language['stat-access']="Zie detail statistieken:";
$language['stat-crawltrack']="Deze informatie is verzameld met:";
$language['nbr-pages-top-crawler']="De bezoeken";
$language['of-site']="van de site";
$language['mail']="Ontvang een dagelijkse samenvatting per e-mail.";
$language['set_up_mail']="Als u een dagelijkse samenvatting per e-mail wilt ontvangen vul dan hieronder uw e-mail adres in.";
$language['email-address']="E-mail adres:";
$language['address_no_ok']="Fout e-mail adres.";
$language['set_up_mail2']="De dagelijkse e-mail is geactiveerd. Wilt u dit stoppen?";
$language['update']="De aanpassing is uitgevoerd.";
$language['search_ip']="Track een IP address";
$language['ip']="IP address";
$language['maxmind']="Deze track is uitgevoerd met behulp van de GeoLite database gemaakt door Maxmind en beschikbaar op het volgend adres:";
$language['ip_no_ok']="Het IP address is fout.";
$language['public']="Stel vrije toegang tot de statistieken in.";
$language['public-set-up2']="De toegang tot uw statistieken is vrij, wilt u deze beschermen met een password?";
$language['public-set-up']="De toegang tot u statistieken is beveiligd met een wachtwoord, wilt u de statistieken vrij toegangkelijk maken?";
$language['public2']="Alleen de Tool pagina blijft beschermd met het password.";
$language['admin_protected']="De toegang tot de Tool pagina is beschermd.";
$language['no_data_to_suppress']="Er is geen informatie in de geselecteerde periode beschikbaar om te archiveren.";
$language['data_suppress3']="Het archiveren van data reduceert de grote van de database. De gegevens zij echter niet meer te zien in de overzichten. Voor de samenvatting is deze informatie wel beschikbaar (pagina Crawlers sectie Archieven). Archiveer alleen als u database te groot wordt en u deze echt moet verkleinen."; 
$language['archive']="Archieven";
$language['month2']="maand";
$language['top_visits']="Top 3 in aantal bezoeken";
$language['top_pages']="Top 3 in aantal bekeken pagina's";
$language['no-archive']="Er is geen data gearchiveerd.";
$language['use-archive']="De informatie is gedeeltelijk gearchiveerd en is niet compleet.";
$language['url_update']="Werk de site informatie bij";
$language['set_up_url']="Vul de volgende tabel met sites url: voorbeeld  www.example.com (zonder http:// aan het begin en zonder / aan het einde)."; 
$language['site_url']="Site url:";
//1.6.0
$language['page_cache']="Laatste berekening: ";
//1.7.0
$language['step1_install_no_ok4']="Er is een probleem ontstaan tijdens het vullen van de IP tabel, Dit kan voorkomen op sommige servers als de tabel meer dan 78000 rijen groot is. U kunt proberen verder te gaan zonder deze tabel. In dit geval wordt niet het land vertoond waaruit de crawler afkomstig is. op de 'Troubleshooting' pagina is documentatie beschikbaar op www.crawltrack.fr, hier vindt u een procedure om de tabel handmatig te vullen.";
$language['show_all']="Laat alle regels zien";
$language['from']="van";
$language['to']="tot";
$language['firstweekday-title']="Kies de eerste dag van de week";
$language['firstweekday-set-up2']="Thans is de eerste dag van de week Maandag, wilt u deze wijzigen in Zondag?";
$language['firstweekday-set-up']="Thans is de eerste dag van de week Zondag, wilt u deze wijzigen in Maandag?";
$language['01']="Januari";
$language['02']="Februari";
$language['03']="Maart";
$language['04']="April";
$language['05']="Mei";
$language['06']="Juni";
$language['07']="Juli";
$language['08']="Augustus";
$language['09']="September";
$language['10']="October";
$language['11']="November";
$language['12']="December";
$language['day0']="Maandag";
$language['day1']="Dinsdag";
$language['day2']="Woensdag";
$language['day3']="Donderdag";
$language['day4']="Vrijdag";
$language['day5']="Zaterdag";
$language['day6']="Zondag";
//2.0.0
$language['ask']="Ask";
$language['google']="Google";
$language['msn']="Live Search";
$language['yahoo']="Yahoo";
$language['delicious']="Del.icio.us";
$language['index']="Indexering";
$language['keyword']="Keywords";
$language['entry-page']="Landings pagina";
$language['searchengine']="Search engines";
$language['social-bookmark']="Social bookmarks";
$language['tag']="Tags";
$language['nbr_tot_bookmark']="Bookmarks";
$language['nbr_tot_link']="Backlinks";
$language['nbr_tot_pages_index']="Geindexeerde pages";
$language['nbr_visits_crawler']="aantal bezoeken crawler";
$language['nbr_tot_visit_seo']="Bezoekers die zijn verwezen naar uw site";
$language['100_lines']="Display beperkt tot %d regels.";
$language['8days']="Sinds 8 dagen";
$language['close']="Sluiten";
$language['date']="Datum";
$language['modif_site']="Gegevens van de naam en url van deze site aanpassen.";
$language['site_url2']="Site url";
$language['modif_site2']="Gegevens van deze site aanpassen.";
$language['no-info-day-before']="Er is geen informatie van de vorige dag.";
$language['data_human_suppress_ok']="De gegevens zijn verwijderd.";
$language['data_human_suppress_no_ok']="Er is een probleem onstaan tijden het verwijderen, probeer opnieuw.";
$language['data_human_suppress_validation']="Bent u er zeker van dat u alles wilt verwijderen &nbsp;";
$language['data_human_suppress']="Verwijder de oudste data uit de bezoekers tabel. (keywords en landingspagina's).";
$language['data_human_suppress2']="Verwijder alles";
$language['one_year_human_data']="Informatie meer dan 1 jaar oud";
$language['six_months_human_data']="Informatie meer dan 6 maanden oud";
$language['one_month_human_data']="Informatie meer dan 1 maand oud";
$language['data_human_suppress3']="Het archiveren van data reduceert de grote van de database. Ze zij echter niet meer te zien in de overzichten. Voor de samenvatting is deze informatie wel beschikbaar (pagina Crawlers sectie Archieven). Archiveer allen als u database te groot wordt en u deze echt moet verkleinen."; 
$language['no_data_human_to_suppress']="TEr is geen informatie beschikbaar in de human visits tabel.";
$language['choose_language']="Kies uw taal.";
//2.1.0
$language['since_beginning']="Alles";
//2.2.0
$language['admin_database']="Bekijk de database grootte";
$language['table_name']="Tabel naam";
$language['nbr_of_data']="Hoeveelheid data";
$language['table_size']="Tabel grootte";
$language['database_size']="Database grootte";
$language['total']="Total:";
$language['mailsubject']="CrawlTrack dagelijkse samenvatting";
$language['beginmonth']="Sinds het begin van de maand";
$language['evolution']="Wijzigingen in vergelijking tot";
$language['lastthreemonths']="Laatste 3 maanden";
$language['set_up_mail3']="Op dit moment gebruikt u het volgende adres:";
$language['set_up_mail4']="Voeg een adres toe";
$language['set_up_mail5']="Vul hier onder het nieuwe E-mailadres in";
$language['set_up_mail6']="Verwijder ��n of meerdere E-mailadressen";
$language['set_up_mail7']="Verwijder het geselecteerde adres";
$language['chmod_no_ok']="Het bijwerken van crawltrack.php is mislukt, CHMOD 777 de CrawlTrack directory en update opnieuw. Stel, om beveiligings redenen, chmod 711 in na een succesvolle update.";
$language['display_parameters']="Toon parameters";
$language['ordertype']="Volgorde:";
$language['orderbydate']="op datum";
$language['orderbypagesview']="op het aantal bekeken pagina's";
$language['orderbyvisites']="op het aantal bezoeken";
$language['orderbyname']="op alphabetische volgorde";
$language['numberrowdisplay']="Aantal vertoonde rijen:";
//2.2.1
$language['french']="Frans";
$language['english']="Engels";
$language['german']="Duits";
$language['spanish']="Spaans";
$language['turkish']="Turks";
$language['dutch']="Nederlands";
//2.3.0
$language['hacking']="Attacks";
$language['hacking2']="Hacking attempts";
$language['hacking3']="Code injection";
$language['hacking4']="SQL injection";
$language['no_hacking']="There is no attempts";
$language['attack_detail']="Attacks details";
$language['attack']="Parameters used for code injection attempts";
$language['attack_sql']="Parameters used for sql injection attempts";
$language['bad_site']="File/script the hacker attempted to inject";
$language['bad_sql']="SQL query the hacker attempted to inject";
$language['bad_url']="Url requested";
$language['hacker']="Attackers";
$language['date_hacking']="Time";
$language['unknown']="Unknown";
$language['danger']="You could be at risk if you run one of these scripts";
$language['attack_number_display']="Attacks details (display limited to %d attackers).";
$language['update_attack']="Update the attacks list.";
$language['no_update_attack']="Do not update the attacks list.";
$language['update_title_attack']="Attacks list update.";
$language['attack_type']="Type of attack";
$language['parameter']="Parameter";
$language['script']="Script";
$language['attack_add']="attacks have been added to the database";
$language['no_access_attack']="Online update is not available.<br><br>To update, click on the link below to download the last attacks list, upload the attacklist.php file in your CrawlTrack include folder and restart the update procedure.";
$language['download_update_attack']="If you have already upload on your site the new attacks list, click on the button below to update your database.";
$language['download_attack']="Download the attacks list.";
$language['no_attack_list']="The file attacklist.php didn't exist in your include folder.";
$language['change_password']="Change your password";
$language['old_password']="Actual password";
$language['new_password']="New password";
$language['valid_new_password']="Enter a second time the new password.";
$language['goodsite_update']="Update trust sites list";
$language['goodsite_list']="Trust sites";
$language['goodsite_list2']="A link to these sites present in an url is not count as an attack";
$language['goodsite_list3']="Actual list of trust sites";
$language['suppress_goodsite']="Suppress that site of the list.";
$language['goodsite_suppress_validation']="Are you sure that you want to suppress that site?";
$language['good_site']="Trust site";
$language['goodsite_suppress_ok']="The site has been successfully deleted.";
$language['goodsite_suppress_no_ok']="A problem appear during the site suppression, try again.";
$language['list_empty']="There is no trust site yet";
$language['add_goodsite']="Add a new trust site in the list";
$language['goodsite_no_ok']="You have to enter a website url.";
$language['attack-blocked']="All these attacks have been blocked by CrawlTrack as requested";
$language['attack-no-blocked']="Be carefull your CrawlTrack is not set-up to block attacks (see tools page)";
$language['attack_parameters']="Hacking protection parameters";
$language['attack_action']="Action when an attack is detected";
$language['attack_block']="Record it and block it";
$language['attack_no_block']="Just record it";
$language['attack_block_alert']="Before to block attacks, which is the best for your site safety, have a look on the documentation (on www.crawltrack.fr) to 
be sure that they will be no problem with your normal visitors.";
$language['crawltrack-backlink']="CrawlTrack is free, if you like it and want to share it why don't put a backlink on your page?<br>If you choose
the nologo option, this link will be invisible on your page. You will find below two options per logo, one for a php page and the second one for an html page. You can put that link in any position on your page.";
$language['session_id_parameters']="Session id treatment";
$language['remove_session_id']="Remove session id on pages url";
$language['session_id_alert']="To remove the session id on pages url will avoid to have multiple entry in the pages table if you use a script which had a session id in the url.";
$language['session_id_used']="Session id used";
//country code
$country = array(

    "ad" => "Andorra",
    "ae" => "United Arab Emirates",
    "af" => "Afghanistan",
    "ag" => "Antigua and Barbuda",
    "ai" => "Anguilla",
    "al" => "Albania",
    "am" => "Armenia",
    "an" => "Netherlands Antilles",
    "ao" => "Angola",
    "aq" => "Antarctica",
    "ar" => "Argentina",
    "as" => "American Samoa",
    "at" => "Austria",
    "au" => "Australia",
    "aw" => "Aruba",
    "az" => "Azerbaijan",
    "ba" => "Bosnia and Herzegovina",
    "bb" => "Barbados",
    "bd" => "Bangladesh",
    "be" => "Belgium",
    "bf" => "Burkina Faso",
    "bg" => "Bulgaria",
    "bh" => "Bahrain",
    "bi" => "Burundi",
    "bj" => "Benin",
    "bm" => "Bermuda",
    "bn" => "Bruneo",
    "bo" => "Bolivia",
    "br" => "Brazil",
    "bs" => "Bahamas",
    "bt" => "Bhutan",
    "bw" => "Botswana",
    "by" => "Belarus",
    "bz" => "Belize",
    "ca" => "Canada",
    "cd" => "The Democratic Republic of the Congo",
    "cf" => "Central African Republic",
    "cg" => "Congo",
    "ch" => "Switzerland",
    "ci" => "Cote D'Ivoire",
    "ck" => "Cook Islands",
    "cl" => "Chile",
    "cm" => "Cameroon",
    "cn" => "China",
    "co" => "Colombia",
    "cr" => "Costa Rica",
    "cs" => "Serbia and Montenegro",
    "cu" => "Cuba",
    "cv" => "Cape Verde",
    "cx" => "Christmas Island",
    "cy" => "Cyprus",
    "cz" => "Czech Republic",
    "de" => "Germany",
    "dj" => "Djibouti",
    "dk" => "Denmark",
    "dm" => "Dominica",
    "do" => "Dominican Republic",
    "dz" => "Algeria",
    "ec" => "Ecuador",
    "ee" => "Estonia",
    "eg" => "Egypt",
    "er" => "Eritrea",
    "es" => "Spain",
    "et" => "Ethiopia",
    "fi" => "Finland",
    "fj" => "Fiji",
    "fk" => "Falkland Islands (Malvinas)",
    "fm" => "Federated States of Micronesia ",
    "fo" => "Faroe Islands",
    "fr" => "France",
    "ga" => "Gabon",
    "gb" => "Great Britain",
    "gd" => "Grenada",
    "ge" => "Georgia",
    "gf" => "French Guyana",
    "gh" => "Ghana",
    "gi" => "Gibraltar",
    "gl" => "Greenland",
    "gm" => "Gambia",
    "gn" => "Guinea",
    "gp" => "Guadeloupe",
    "gq" => "Equatorial Guinea",
    "gr" => "Greece",
    "gs" => "South Georgia and the South Sandwich Islands",
    "gt" => "Guatemala",
    "gu" => "Guam",
    "gw" => "Guinea-Bissau",
    "gy" => "Guyana",
    "hk" => "Hong Kong",
    "hn" => "Honduras",
    "hr" => "Croatia",
    "ht" => "Haiti",
    "hu" => "Hungary",
    "id" => "Indonesia",
    "ie" => "Ireland",
    "il" => "Israel",
    "in" => "India",
    "io" => "British Indian Ocean Territory",
    "iq" => "Iraq",
    "ir" => "Iran",
    "is" => "Iceland",
    "it" => "Italy",
    "jm" => "Jamaica",
    "jo" => "Jordan",
    "jp" => "Japan",
    "ke" => "Kenya",
    "kg" => "Kyrgyzstan",
    "kh" => "Cambodia",
    "ki" => "Kiribati",
    "km" => "Comoros",
    "kn" => "Saint Kitts and Nevis",
    "kr" => "Republic of Korea",
    "kw" => "Kuwait",
    "ky" => "Cayman Islands",
    "kz" => "Kazakhstan",
    "la" => "Laos",
    "lb" => "Lebanon",
    "lc" => "Saint Lucia",
    "li" => "Liechtenstein",
    "lk" => "Sri Lanka",
    "lr" => "Liberia",
    "ls" => "Lesotho",
    "lt" => "Lithuania",
    "lu" => "Luxembourg",
    "lv" => "Latvia",
    "ly" => "Libya",
    "ma" => "Morocco",
    "mc" => "Monaco",
    "md" => "Moldova",
    "mg" => "Madagascar",
    "mh" => "Marshall Islands",
    "mk" => "Macedonia",
    "ml" => "Mali",
    "mm" => "Myanmar",
    "mn" => "Mongolia",
    "mo" => "Macau",
    "mp" => "Northern Mariana Islands",
    "mq" => "Martinique",
    "mr" => "Mauritania",
    "ms" => "Montserrat",
    "mt" => "Malta",
    "mu" => "Mauritius",
    "mv" => "Maldives",
    "mw" => "Malawi",
    "mx" => "Mexico",
    "my" => "Malaysia",
    "mz" => "Mozambique",
    "na" => "Namibia",
    "nc" => "New Caledonia",
    "ne" => "Niger",
    "nf" => "Norfolk Island",
    "ng" => "Nigeria",
    "ni" => "Nicaragua",
    "nl" => "Netherlands",
    "no" => "Norway",
    "np" => "Nepal",
    "nr" => "Nauru",
    "nu" => "Niue",
    "nz" => "New Zealand",
    "om" => "Oman",
    "pa" => "Panama",
    "pe" => "Peru",
    "pf" => "French Polynesia",
    "pg" => "Papua New Guinea",
    "ph" => "Philippines",
    "pk" => "Pakistan",
    "pl" => "Poland",
    "pr" => "Puerto Rico",
    "ps" => "Palestinian territory",
    "pt" => "Portugal",
    "pw" => "Palau",
    "py" => "Paraguay",
    "qa" => "Qatar",
    "re" => "Reunion Island",
    "ro" => "Romania",
    "ru" => "Russian Federation",
    "rs" => "Russia",
    "rw" => "Rwanda",
    "sa" => "Saudi Arabia",
    "sb" => "Solomon Islands",
    "sc" => "Seychelles",
    "sd" => "Sudan",
    "se" => "Sweden",
    "sg" => "Singapore",
    "sh" => "Saint Helena",
    "si" => "Slovenia",
    "sj" => "Svalbard",
    "sk" => "Slovakia",
    "sl" => "Sierra Leone",
    "sm" => "San Marino",
    "sn" => "Senegal",
    "so" => "Somalia",
    "sr" => "Suriname",
    "st" => "Sao Tome and Principe",
    "sv" => "El Salvador",
    "sy" => "Syrian Arab Republic",
    "sz" => "Switzerland",
    "td" => "Chad",
    "tf" => "French Southern Territories",
    "tg" => "Togo",
    "th" => "Thailand",
    "tj" => "Tajikistan",
    "tk" => "Tokelau",
    "tl" => "Timor Leste",
    "tm" => "Turkmenistan",
    "tn" => "Tunisia",
    "to" => "Tonga",
    "tr" => "Turkey",
    "tt" => "Trinidad and Tobago",
    "tv" => "Tuvalu",
    "tw" => "Taiwan",
    "tz" => "Tanzania",
    "ua" => "Ukraine",
    "ug" => "Uganda",
    "us" => "United States",
    "uy" => "Uruguay",
    "uz" => "Uzbekistan",
    "va" => "Vatican City",
    "vc" => "Saint Vincent and the Grenadines",
    "ve" => "Venezuela",
    "vg" => "Virgin Islands, British",
    "vi" => "Virgin Islands, U.S.",
    "vn" => "Vietnam",
    "vu" => "Vanuatu",
    "ws" => "Samoa",
    "ye" => "Yemen",
    "yt" => "Mayotte",
    "za" => "South Africa",
    "zm" => "Zambia",
    "zw" => "Zimbabwe",
    "xx" => "Unknown",
    "a2" => "Unknown", 
    "eu" => "European Union",       
);

?>
