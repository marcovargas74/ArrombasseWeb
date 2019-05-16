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
// file: frenchiso.php
//----------------------------------------------------------------------
//installation
$language['install']="Installation";
$language['welcome_install'] ="Bienvenue sur CrawlTrack, l'installation va se faire simplement en 3 �tapes.";
$language['menu_install_1']="1) Saisie des donn�es de connection.";
$language['menu_install_2']="2) Param�trage des sites � auditer.";
$language['menu_install_3']="3) Cr�ation du compte administrateur.";
$language['go_install']="Installer";
$language['step1_install'] ="Veuillez saisir dans le formulaire ci-dessous les informations concernant les identifiants de connection � la base de donn�es. Une fois le formulaire valid�, les tables et  le fichier de connection vont �tre automatiquement cr��s.";
$language['step1_install_login_mysql']="Identifiant MySQL";
$language['step1_install_password_mysql']="Mot de passe MySQL";
$language['step1_install_host_mysql']="Serveur MySQL";
$language['step1_install_database_mysql']="Base MySQL";
$language['step1_install_table_mysql']="Pr�fixe des tables";
$language['step1_install_ok'] ="Fichier de connection OK.";
$language['step1_install_ok2'] ="Cr�ation des tables OK.";
$language['step1_install_no_ok'] ="Il manque des informations pour cr�er les tables et le fichier de connection, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['step1_install_no_ok2'] ="Le fichier n'a pas pu �tre cr��, v�rifier que le r�pertoire est en CHMOD 777.";
$language['step1_install_no_ok3'] ="Un probl�me est survenu lors de la cr�ation des tables, essayer de nouveau la proc�dure.";
$language['back_to_form'] ="Retour au formulaire de saisie";
$language['retry'] ="Essayer de nouveau";
$language['step2_install_no_ok']="La connection � la base n'a pas pu s'effectuer, veuillez v�rifier les donn�es saisies.";
$language['step3_install_no_ok']="La s�lection de la base n'a pas pu s'effectuer, veuillez v�rifier les donn�es saisies.";
$language['step4_install']="Suite";
//site creation
//modified in 1.5.0
$language['set_up_site']="Veuillez noter ci-dessous le nom et l'url du site � auditer, le nom est celui qui sera utilis� pour identifier le site lors de l'utilisation de CrawlTrack. L'url du site doit �te sous la forme:www.example.com (sans http:// au d�but ni / � la fin).";
$language['site_name']="Nom du site:";
//modified in 2.0.0
$language['site_no_ok']="Vous devez entrer un nom et une url de site.";
$language['site_ok']="Le site a �t� ajout� � la base de donn�e.";
$language['new_site']="Ajouter un autre site";
//tag creation
$language['tag']="Tag � ins�rer dans vos pages";
//modified in 2.3.0
$language['create_tag']="<p><b>Comment utiliser le tag CrawlTrack:</b><br><ul id=\"listtag\">
<li>le tag Crawltrack est un fichier php, vous devez le mettre sur une page en .php</li>
<li>le tag CrawlTrack doit �tre entre les balises &#60;?php et ?&#62, si il n'y a pas ce type de balises sur votre page, vous devez les ajouter avant et apr�s le tag.</li>
<li>si votre site n'utilise pas des pages en .php, voir documentation sur www.crawltrack.fr.</li>
<li>le mieux pour la protection anti piratage est que le tag CrawlTrack soit la premi�re chose sur votre page juste apr�s la balise &#60;?php.</li>
<li>si vous utiliser un CMS ou un forum, aller voir sur www.crawltrack.fr/fr/doccms.php pour trouver la meilleurs solution pour placer le tag.</li>
<li>le tag CrawlTrack sera parfaitement invisible sur vos pages (y compris dans le code source).</li>
<li>si pour aider au d�veloppement de CrawlTrack vous souhaiter mettre un logo avec un lien vers www.crawltrack.fr, vous trouverez plus bas des mod�les que vous pouvez mettre n'importe o� sur vos pages.</li>
<li>pour toutes autres questions, voir la documentation sur www.crawltrack.fr ou utiliser le forum de support sur le m�me site.</li></ul></p><br>" ;
$language['site_name2']="Nom du site";
//modified in 1.5.0
$language['local_tag']="Tag standard, a utiliser pour un site h�berg� sur le m�me serveur que CrawlTrack. ";
$language['non_local_tag']="Tag a utiliser si le site est h�berg� sur un autre serveur que Crawltrack, attention il faut dans ce cas que les fonctions fsockopen et fputs soit activ�es sur votre h�bergement.";
//login set_up
$language['admin_creation']="Cr�ation du compte administrateur";
$language['admin_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'administrateur.";
$language['user_creation']="Cr�ation du compte utilisateur";
$language['user_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'utilisateur.";
$language['user_site_creation']="Cr�ation du compte utilisateur-site";
$language['user_site_setup']="Veuillez saisir ci-dessous l'identifiant et le mot de passe qui seront utilis�s par l'utilisateur-site.";
$language['admin_rights']="L'administrateur a acc�s � la zone de configuration ainsi qu'aux stats de tous les sites audit�s.";
$language['login']="Identifiant";
$language['password']="Mot de passe";
$language['valid_password']="Saisissez une deuxi�me fois votre mot de passe.";
$language['login_no_ok']="Il manque des informations ou les mots de passe saisies sont diff�rents, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['login_ok']="Le compte a �t� cr��.";
$language['login_no_ok2']="Un probl�me est survenu lors de la cr�ation du compte, essayer de nouveau la proc�dure.";
$language['login_user']="Cr�er un compte utilisateur";
$language['login_user_what']="Un utilisateur a acc�s � l'ensemble des stats des sites";
$language['login_user_site']="Cr�er un compte utilisateur-site";
$language['login_user_site_what']="Un utilisateur-site a acc�s aux stats d'un seul site";
//modified in 1.5.0
$language['login_finish']="L'installation est termin�e.N'oubliez pas de mettre le tag (disponible page outils) sur les pages de votre site.";
//access
$language['restrited_access']="L'acc�s aux statistiques est prot�g�.";
$language['enter_login']="Veuillez saisir ci-dessous votre identifiant et votre mot de passe.";
//display
$language['crawler_name']="Robots";
$language['nbr_visits']="Visites";
$language['nbr_pages']="Pages vues";
$language['date_visits']="Derni�re visite";
$language['display_period']="P�riode �tudi�e :";
$language['today']="Jour";
$language['days']="Semaine";
$language['month']="Mois";
$language['one_year']="Ann�e";
$language['no_visit']="Il n'y a pas eu de visite.";
$language['page']="Pages";
//modified in 1.5.0
$language['admin']="Outils";
$language['nbr_tot_visits']="Total visites";
$language['nbr_tot_pages']="Total pages vues";
$language['nbr_tot_crawlers']="Nbre de robots";
$language['visit_per-crawler']="D�tail des visites";
$language['100_visit_per-crawler']="D�tail des visites (affichage limit� � 100 lignes).";
$language['user_agent']="User agent";
$language['Origin']="Utilisateur";
$language['help']="Aide";
//search
$language['search']="Recherche";
$language['search2']="Rechercher";
$language['search_crawler']="un robot";
$language['search_user_agent']="un user-agent";
$language['search_page']="une page";
$language['search_user']="un utilisateur de robot";
$language['go_search']="Chercher";
$language['result_crawler']="Voici les robots qui correspondent � votre recherche.";
$language['result_ua']="Voici les user-agents qui correspondent � votre recherche.";
$language['result_page']="Voici les pages qui correspondent � votre recherche.";
$language['result_user']="Voici les utilisateurs qui correspondent � votre recherche.";
$language['result_user_crawler']="Voici les robots de cet utilisateur.";
$language['result_user_1']="Utilisateur:&nbsp;";
$language['result_crawler_1']="Mot recherch�:&nbsp;";
$language['no_answer']="Il n'y a pas de r�ponse correspondant � votre recherche.";
$language['to_many_answer']="Il y a plus de 100 r�ponses (affichage limit� � 100 lignes).";
//admin
$language['user_create']="Cr�er un nouveau compte utilisateur.";
$language['user_site_create']="Cr�er un nouveau compte utilisateur-site.";
$language['new_site']="Ajouter un site � auditer.";
$language['see_tag']="Voir les tags � ins�rer.";
$language['new_crawler']="Ajouter un nouveau robot.";
$language['crawler_creation']="Veuillez compl�ter le formulaire ci-dessous avec les donn�es du nouveau robot."; 
$language['crawler_name2']="Nom du robot:";
$language['crawler_user_agent']="User agent:";
$language['crawler_user']="Utilisateur du robot:";
$language['crawler_url']="Adresse de l'utilisateur (sous la forme http://www.example.com)";
$language['crawler_url2']="Adresse de l'utilisateur:";
$language['crawler_no_ok']="Il manque des informations, veuillez v�rifier les infos saisies dans le formulaire et revalider apr�s correction.";
$language['exist']="Ce robot existe d�j� dans la base de donn�e";
$language['exist_data']="Voici les informations le concernant dans la base:";
$language['crawler_no_ok2']="Un probl�me est survenu lors de la cr�ation du robot, essayer de nouveau la proc�dure.";
$language['crawler_ok']="Le robot a �t� ajout� � la base de donn�e.";
$language['user_suppress']="Supprimer un compte utilisateur ou utilisateur-site.";
$language['user_list']="Liste des logins utilisateurs et utilisateur-sites";
$language['suppress_user']="Supprimer ce compte";
$language['user_suppress_validation']="Etes vous s�r de vouloir supprimer ce compte?";
$language['yes']="Oui";
$language['no']="Non";
$language['user_suppress_ok']="Le compte a �t� supprim� avec succ�s.";
$language['user_suppress_no_ok']="Un probl�me est survenu lors de la suppression du compte, essayer de nouveau la proc�dure.";
$language['site_suppress']="Supprimer un site.";
$language['site_list']="Liste des sites";
$language['suppress_site']="Supprimer ce site";
$language['site_suppress_validation']="Etes vous s�r de vouloir supprimer ce site?";
$language['site_suppress_ok']="Le site a �t� supprim� avec succ�s.";
$language['site_suppress_no_ok']="Un probl�me est survenu lors de la suppression du site, essayer de nouveau la proc�dure.";
$language['crawler_suppress']="Supprimer un robot.";
$language['crawler_list']="Liste des robots";
$language['suppress_crawler']="Supprimer ce robot";
$language['crawler_suppress_validation']="Etes vous s�r de vouloir supprimer ce robot?";
$language['crawler_suppress_ok']="Le robot a �t� supprim� avec succ�s.";
$language['crawler_suppress_no_ok']="Un probl�me est survenu lors de la suppression du robot, essayer de nouveau la proc�dure.";
$language['crawler_test_creation']="Cr�er un robot de test.";
$language['crawler_test_suppress']="Supprimer le robot de test.";
$language['crawler_test_text']="Une fois le robot de test cr��, allez visiter votre site avec l'ordinateur et le navigateur utilis�s pour cr�er le robot."; 
$language['crawler_test_text2']="Si tout va bien, votre visite apparaitra dans CrawlTrack comme �tant celle du robot Test-Crawltrack. N'oubliez pas ensuite de supprimer ce robot de test.";
$language['crawler_test_no_exist']="Le robot de test n'existe pas dans la base de donn�es.";
$language['exist_site']="Ce site existe d�j� dans la base de donn�e";
$language['exist_login']="Ce login existe d�j� dans la base de donn�e";
//1.2.0
$language['update_title']="Mise � jour de la liste de robots.";
$language['update_crawler']="Mettre � jour la liste de robots.";
$language['list_up_to_date']="Il n'y a pas de mise � jour disponible actuellement.";
$language['update_ok']="La mise � jour s'est bien pass�e.";
$language['crawler_add']="robots ont �t� ajout�s � la base de donn�es";
$language['no_access']="La mise � jour en ligne ne fonctionne pas.<br><br>Pour mettre � jour veuillez cliquer sur le lien ci-dessous pour t�l�charger la derni�re liste de robot, placez le fichier crawlerlist.php dans le r�pertoire include de CrawlTrack et relancez la proc�dure de mise � jour.";
$language['no_access2']="La liaison avec CrawlTrack.fr a �chou�, veuillez r�essayer ult�rieurement.";
$language['download_update']="Si vous avez d�j� t�l�charg� et upload� sur votre site la liste de robot, cliquez sur le bouton ci-dessous pour faire la mise � jour.";
$language['download']="T�l�charger la liste de robot";
$language['your_list']="La liste que vous utilisez est:";
$language['crawltrack_list']="La liste disponible sur Crawltrack.fr est:";
$language['no_update']="Ne pas mettre � jour la liste.";
$language['no_crawler_list']="Le fichier crawlerlist.php n'est pas pr�sent dans votre r�pertoire include";
//1.3.0
$language['use_user_agent']="La d�tection peux se faire par le user agent ou par l'IP. Vous devez donc mettre l'une ou l'autre des informations.";
$language['user_agent_or_ip']="User agent ou IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Modification de la table crawlt_crawler OK.";
$language['files_mod_ok']="Modification des fichiers configconnect.php et crawltrack.php OK.";
$language['update_crawltrack_ok']="La mise � jour de CrawlTrack est termin�e, vous utilisez maintenant la version:";
$language['table_mod_no_ok']="La modification  de la table crawlt_crawler n'a pas pu se faire.";
$language['files_mod_no_ok']="Il y a eu un probl�me lors de la mise � jour des fichiers configconnect.php et crawltrack.php.";
$language['update_crawltrack_no_ok']="La mise � jour de CrawlTrack n'a pas pu se faire.";
$language['no_logo']="Pas de logo.";
//modified in 1.5.0
$language['data_suppress_ok']="Les donn�es ont �t� archiv�es avec succ�s.";
$language['data_suppress_no_ok']="Un probl�me est survenu lors de l'archivage des donn�es, essayer de nouveau la proc�dure.";
$language['data_suppress_validation']="Etes vous s�r de vouloir archiver toutes les &nbsp;";
//modified in 2.0.0
$language['data_suppress']="Archivage des donn�es les plus anciennes de la table des visites de robots.";
$language['data_suppress2']="Archiver les";
$language['one_year_data']="donn�es vieilles de plus d'un an";
$language['six_months_data']="donn�es vieilles de plus de six mois";
$language['one_month_data']="donn�es vieilles de plus d'un mois";
$language['oldest_data']="La donn�e la plus ancienne date du &nbsp;";
$language['no_data']="Il n'y a pas de donn�e dans la table des visites.";
//1.4.0
$language['time_set_up']="D�calage horaire";
$language['server_time']="Date et heure du serveur =";
$language['local_time']="Date et heure locale=";
$language['time_difference']="Diff�rence en heures entre l'heure du serveur et l'heure locale=";
$language['time_server']="Vous utilisez actuellement l'heure du serveur, voulez vous que les donn�es soient affich�es en utilisant votre heure locale ?";
$language['time_local']="Vous utilisez actuellement l'heure locale, voulez vous que les donn�es soient affich�es en utilisant votre heure du serveur ?";
$language['decal_ok']="CrawlTrack, utilisera maintenant votre heure locale; vous pouvez � tout moment revenir en heure serveur";
$language['nodecal_ok']="CrawlTrack, utilisera maintenant l'heure du serveur; vous pouvez � tout moment revenir en heure locale";
$language['need_javascript']="Vous devez activer javascript pour utiliser cette fonctionnalit�.";
//1.5.0 
$language['origin']="Provenance";
$language['crawler_ip_used']="IP utilis�es";
$language['crawler_country']="Pays d'origine";
$language['other']="Autres";
$language['pc-page-view']="Part du site visit�e";
$language['pc-page-noview']="Part du site non visit�e";
$language['print']="Imprimer";
$language['ip_suppress_ok']="Les visites ont �t� supprim�e avec succ�s.";
$language['ip_suppress_no_ok']="Un probl�me est survenu lors de la suppression des visites, essayer de nouveau la proc�dure.";
$language['no_ip']="Il n'y a pas eu d'IP enregistr�e sur la p�riode.";
$language['ip_suppress_validation']="Cette IP a �t� utilis�e par plusieurs robots diff�rents, il y a donc un doute sur l'origine r�elle de ces 
visites.Voulez vous supprimer les visites correspondantes � cette IP de la base?";
$language['ip_suppress_validation2']="Etes vous s�r de vouloir supprimer les visites venant de cette IP de la base de donn�e?";
$language['ip_suppress_validation3']="Si vous voulez interdire l'acc�s � votre site depuis cette IP, ajoutez la ligne suivante dans votre fichier .htaccess 
� la racine de votre site:";
$language['ip_suppress']="Supprimer une IP";
$language['diff-day-before']="par rapport � la veille";
$language['daily-stats']="Statistiques journali�res";
$language['top-crawler']="Robot le plus actif:";
$language['stat-access']="Voir les statistiques d�taill�es:";
$language['stat-crawltrack']="Ces donn�es sont enregistr�es gr�ce �:";
$language['nbr-pages-top-crawler']="Il a visit�";
$language['of-site']="du site";
$language['mail']="Recevoir un r�sum� journalier par Email.";
$language['set_up_mail']="Si vous voulez recevoir un r�sum� journalier de vos statistiques par Email, entrez ci-dessous votre adresse Email.";
$language['email-address']="Adresse Email:";
$language['address_no_ok']="L'adresse que vous avez saisie n'est pas correcte.";
$language['set_up_mail2']="L'envoi du r�sum� journalier par Email est actuellement activ�. Voulez vous le d�sactiver?";
$language['update']="La modification a �t� prise en compte";
$language['no-visits-day-before']="Il n'y a pas eu de visites hier.";
$language['search_ip']="Localiser une adresse IP";
$language['ip']="Adresse IP";
$language['maxmind']="Cette recherche a �t� faites en utilisant la base de donn�es GeoLite cr�e par Maxmind disponible � l'adresse suivante:";
$language['ip_no_ok']="L'adresse IP que vous avez saisie n'est pas correcte.";
$language['public']="Mettre les statistiques en acc�s libre.";
$language['public-set-up2']="L'acc�s aux statistiques est actuellement libre, voulez vous le prot�ger par mot de passe?";
$language['public-set-up']="L'acc�s aux statistiques est actuellement prot�g� par mot de passe, voulez vous le rendre libre?";
$language['public2']="Seul l'acc�s � la page Outils restera prot�g�e par votre mot de passe";
$language['admin_protected']="L'acc�s � la page Outils est prot�g�.";
$language['no_data_to_suppress']="Il n'y a pas de donn�es � archiver pour la p�riode demand�e.";
$language['data_suppress3']="L'archivage des donn�es permet de r�duire la taille de la base de donn�es, mais en contre partie
les donn�es correspondantes ne sont plus accessibles dans les pages de statistiques. Seul un tableau de r�sum� de ces donn�es reste
accessible (onglet Robots section Archives). Il est donc conseiller de ne faire l'archivage que si il faut absolument r�duire la taille 
la base de donn�es; le d�tail des donn�es archiv�es n'�tant absolument pas r�cup�rable.";
$language['archive']="Archives";
$language['month2']="Mois";
$language['top_visits']="Top 3 en nombre de visites";
$language['top_pages']="Top 3 en nombre de pages vues";
$language['no-archive']="Il n'y a pas de donn�es archiv�es.";
$language['use-archive']="Attention une partie des donn�es a �t� archiv�e, ces valeurs sont donc tronqu�es.";
$language['url_update']="Mettre � jour les donn�es des sites";
$language['set_up_url']="Compl�tez le tableau ci-dessous en mettant les urls des sites sous la forme: www.example.com (sans http:// au d�but ni / � la fin)."; 
$language['site_url']="Url du site:";
//1.6.0
$language['page_cache']="Dernier calcul: ";
//1.7.0
$language['step1_install_no_ok4']="Un probl�me est survenu lors du remplissage de la table des IP, cela arrive sur certain h�bergements car cette table comporte plus de 78 000 enregistrements. Vous pouvez soit essayer de nouveau la proc�dure, soit continuer sans cette table. Dans ce cas les pays d'origine des robots ne pourront pas �tre d�termin�s. Sur la page 'Probl�mes connus' de la documentation sur www.crawltrack.fr vous trouverez un moyen pour remplir la table des IP manuellement. ";
$language['show_all']="Voir toutes les lignes";
$language['from']="du";
$language['to']="au";
$language['firstweekday-title']="Choix du 1er jour de la semaine";
$language['firstweekday-set-up2']="Le premier jour de la semaine est actuellement le lundi, voulez vous changer pour le dimanche?";
$language['firstweekday-set-up']="Le premier jour de la semaine est actuellement le dimanche, voulez vous changer pour le lundi?";
$language['01']="Janvier";
$language['02']="F�vrier";
$language['03']="Mars";
$language['04']="Avril";
$language['05']="Mai";
$language['06']="Juin";
$language['07']="Juillet";
$language['08']="Ao�t";
$language['09']="Septembre";
$language['10']="Octobre";
$language['11']="Novembre";
$language['12']="D�cembre";
$language['day0']="Lundi";
$language['day1']="Mardi";
$language['day2']="Mercredi";
$language['day3']="Jeudi";
$language['day4']="Vendredi";
$language['day5']="Samedi";
$language['day6']="Dimanche";
//2.0.0
$language['ask']="Ask";
$language['google']="Google";
$language['msn']="Live Search";
$language['yahoo']="Yahoo";
$language['delicious']="Del.icio.us";
$language['index']="Indexation";
$language['keyword']="Mots clefs";
$language['entry-page']="Pages d'entr�e";
$language['searchengine']="Moteur de recherche";
$language['social-bookmark']="Social bookmarks";
$language['tag']="Tags";
$language['nbr_tot_bookmark']="Bookmarks";
$language['nbr_tot_link']="Liens vers votre site";
$language['nbr_tot_pages_index']="Pages index�es";
$language['nbr_visits_crawler']="Nombre de visites du robot";
$language['nbr_tot_visit_seo']="Visiteurs envoy�s sur le site";
$language['100_lines']="Affichage limit� � 100 lignes.";
$language['8days']="Depuis 8 jours";
$language['close']="Fermer la fen�tre";
$language['date']="Date";
$language['modif_site']="Modifier le nom o� l'url d'un site.";
$language['site_url2']="Url du site";
$language['modif_site2']="Modifier les donn�es de ce site.";
$language['n/a']="N/A";
$language['no-info-day-before']="Pas d'information pour la veille";
$language['data_human_suppress_ok']="Les donn�es ont �t� supprim�es avec succ�s.";
$language['data_human_suppress_no_ok']="Un probl�me est survenu lors de la suppression des donn�es, essayer de nouveau la proc�dure.";
$language['data_human_suppress_validation']="Etes vous s�r de vouloir supprimer toutes les &nbsp;";
$language['data_human_suppress']="Suppression des donn�es les plus anciennes de la table des visites d'internautes (mots clefs et pages d'entr�es).";
$language['data_human_suppress2']="Supprimer les";
$language['one_year_human_data']="donn�es vieilles de plus d'un an";
$language['six_months_human_data']="donn�es vieilles de plus de six mois";
$language['one_month_human_data']="donn�es vieilles de plus d'un mois";
$language['data_human_suppress3']="La suppresion des donn�es permet de r�duire la taille de la base de donn�es, mais en contre partie
les donn�es correspondantes ne sont plus accessibles dans les pages de statistiques. Il est donc conseiller de ne faire la suppression que si il faut absolument r�duire la taille 
la base de donn�es; les donn�es supprim�es n'�tant absolument pas r�cup�rables.";
$language['no_data_human_to_suppress']="Il n'y a pas de donn�es � supprimer pour la p�riode demand�e.";
$language['choose_language']="Choisissez votre langue.";
//2.1.0
$language['since_beginning']="Tout";
//2.2.0
$language['admin_database']="Voir la taille de la base de donn�es";
$language['table_name']="Nom de la table";
$language['nbr_of_data']="Nombre d'enregistrements";
$language['table_size']="Taille de la table";
$language['database_size']="Taille de la base de donn�es";
$language['total']="Total:";
$language['mailsubject']="R�sum� journalier CrawlTrack";
$language['yesterday']="Hier";
$language['beginmonth']="Depuis le d�but du mois";
$language['lastmonth']="Le mois pr�c�dent � la m�me date";
//2.2.0
$language['admin_database']="Voir la taille de la base de donn�es";
$language['table_name']="Nom de la table";
$language['nbr_of_data']="Nombre d'enregistrements";
$language['table_size']="Taille de la table";
$language['database_size']="Taille de la base de donn�es";
$language['total']="Total:";
$language['mailsubject']="R�sum� journalier CrawlTrack";
$language['beginmonth']="Depuis le d�but du mois";
$language['evolution']="Evolution par rapport �";
$language['lastthreemonths']="3 derniers mois";
$language['set_up_mail3']="Vous utilisez actuellement les adresses suivantes:";
$language['set_up_mail4']="Ajouter une adresse";
$language['set_up_mail5']="Entrez ci-dessous l'adresse Email suppl�mentaire.";
$language['set_up_mail6']="Supprimer une ou plusieurs adresses";
$language['set_up_mail7']="Supprimer les adresses s�lectionn�es";
$language['chmod_no_ok']="Le fichier crawltrack.php n'a pas pu �tre modifi�, mettez  le r�pertoire de CrawlTrack en CHMOD 777 et relancez la mise � jour. N'oubliez pas ensuite pour des raisons de s�curit� de le remettre en CHMOD 711.";
$language['display_parameters']="Param�tres d'affichage";
$language['ordertype']="Classement:";
$language['orderbydate']="par date et heure de visite";
$language['orderbypagesview']="par nombre de pages vues";
$language['orderbyvisites']="par nombre de visites";
$language['orderbyname']="par ordre alphab�tique";
$language['numberrowdisplay']="Nombre de lignes affich�es:";
//2.2.1
$language['french']="Fran�ais";
$language['english']="Anglais";
$language['german']="Allemand";
$language['spanish']="Espagnol";
$language['turkish']="Turc";
$language['dutch']="Hollandais";
//2.3.0
$language['hacking']="Attaques";
$language['hacking2']="Tentatives de hacking";
$language['hacking3']="Injection de code";
$language['hacking4']="Injection SQL";
$language['no_hacking']="Il n'y a pas eu de tentative";
$language['attack_detail']="D�tail des attaques";
$language['attack']="Param�tres utilis�s pour les tentatives d'injection de code";
$language['attack_sql']="Param�tres utilis�s pour les tentatives d'injection SQL";
$language['bad_site']="Fichier/script que le hacker a tent� d'injecter";
$language['bad_sql']="Requ�te sql que le hacker a tent� d'injecter";
$language['bad_url']="Url demand�es";
$language['hacker']="Attaquants";
$language['date_hacking']="Heures";
$language['unknown']="Inconnu";
$language['danger']="Vous pouvez �tre expos� si vous utilisez un de ces scripts";
$language['attack_number_display']="D�tails des attaques (affichage limit� � %d attaquants).";
$language['update_attack']="Mettre � jour la liste des attaques."; 
$language['no_update_attack']="Ne pas mettre � jour la liste des attaques.";
$language['update_title_attack']="Mise � jour de la liste des attaques.";
$language['attack_type']="Type d'attaque";
$language['parameter']="Param�tre";
$language['script']="Script";
$language['attack_add']="attaques ont �t� ajout�es � la base de donn�es";
$language['no_access_attack']="La mise � jour en ligne ne fonctionne pas.<br><br>Pour mettre � jour veuillez cliquer sur le lien ci-dessous pour t�l�charger la derni�re liste d'attaques, placez le fichier attacklist.php dans le r�pertoire include de CrawlTrack et relancez la proc�dure de mise � jour.";
$language['download_update_attack']="Si vous avez d�j� t�l�charg� et upload� sur votre site la liste d'attaques, cliquez sur le bouton ci-dessous pour faire la mise � jour.";
$language['download_attack']="T�l�charger la liste d'attaques.";
$language['no_attack_list']="Le fichier attacklist.php n'existe pas dans votre r�pertoire include.";
$language['change_password']="Changer votre mot de passe";
$language['old_password']="Mot de passe actuel";
$language['new_password']="Nouveau mot de passe";
$language['valid_new_password']="Entrer une deuxi�me fois votre nouveau mot de passe.";
$language['goodsite_update']="Mettre � jour la liste de sites de confiance";
$language['goodsite_list']="Sites de confiance";
$language['goodsite_list2']="Un lien vers un de ces sites pr�sent dans une url n'est pas consid�r� comme une attaque.";
$language['goodsite_list3']="Liste actuelle des sites de confiance";
$language['suppress_goodsite']="Supprimer ce site de la liste.";
$language['goodsite_suppress_validation']="Etes vous s�r de vouloir supprimer ce site?";
$language['good_site']="Site de confiance";
$language['goodsite_suppress_ok']="Le site a �t� supprim� avec succ�s.";
$language['goodsite_suppress_no_ok']="Un probl�me est survenu lors de la suppression du site, essayer de nouveau la proc�dure.";
$language['list_empty']="Il n'y a pas de site de confiance";
$language['add_goodsite']="Ajouter un site de confiance dans la liste";
$language['goodsite_no_ok']="Vous devez entrer une url de site.";
$language['attack-blocked']="Toutes ces attaques ont bloqu�es par CrawlTrack comme demand�";
$language['attack-no-blocked']="Attention, votre CrawlTrack n'est pas param�tr� pour bloquer ces attaques (voir page outils)";
$language['attack_parameters']="Param�tres de protection anti-piratage";
$language['attack_action']="Action en cas de d�tection d'une attaque";
$language['attack_block']="L'enregistrer et la bloquer";
$language['attack_no_block']="Seulement l'enregistrer";
$language['attack_block_alert']="Avant de choisir le bloquage des attaques, ce qui est le mieux pour la s�curit� de votre site, lisez la documentation (sur www.crawltrack.fr) pour 
�tre s�r qu'il n'y aura pas de probl�me avec vos visiteurs normaux.";
$language['crawltrack-backlink']="CrawlTrack est gratuit, si vous l'appr�cier et voulez le faire connaitre pourquoi ne pas mettre un lien vers www.crawltrack.fr sur vos pages?<br>Si vous choisissez
l'option pas de logo, ce lien sera invisible. Vous avez ci-dessous deux options pour chaque logo, une en php et la deuxi�me en html. Vous pouvez mettre ce lien � n'importe quelle position sur vos pages.";
$language['session_id_parameters']="Traitement des identifiants de session";
$language['remove_session_id']="Retirer les identifiants de session des url";
$language['session_id_alert']="Enlever les identifiants de session des url, va �viter les entr�es multiples dans la table des pages si vous avez un script qui ajoute des identifiants de session dans l'url.";
$language['session_id_used']="Identifiants de session utilis�s";
//country code
$country = array(
"ad" => "Andorre",
"ae" => "Emirats Arabes Unis",
"af" => "Afghanistan",
"ag" => "Antigua et Barbuda",
"ai" => "Anguilla",
"al" => "Albanie",
"am" => "Arm�nie",
"an" => "Antilles Neerlandaises",
"ao" => "Angola",
"aq" => "Antarctique",
"ar" => "Argentine",
"as" => "American Samoa",
"at" => "Autriche",
"au" => "Australie",
"aw" => "Aruba",
"az" => "Azerbaidjan",
"ba" => "Bosnie Herz�govine",
"bb" => "Barbade",
"bd" => "Bangladesh",
"be" => "Belgique",
"bf" => "Burkina Faso",
"bg" => "Bulgarie",
"bh" => "Bahrein",
"bi" => "Burundi",
"bj" => "B�nin",
"bm" => "Bermudes",
"bn" => "Brunei",
"bo" => "Bolivie",
"br" => "Br�sil",
"bs" => "Bahamas",
"bt" => "Bhoutan",
"bw" => "Botswana",
"by" => "Bi�lorussie",
"bz" => "B�lize",
"ca" => "Canada",
"cd" => "R�p. d�m. du Congo",
"cf" => "R�p Centrafricaine",
"cg" => "Congo",
"ch" => "Suisse",
"ci" => "C�te d'Ivoire",
"ck" => "Cook (�les)",
"cl" => "Chili",
"cm" => "Cameroun",
"cn" => "Chine",
"co" => "Colombie",
"cr" => "Costa Rica",
"cs" => "Serbie et Mont�n�gro",    
"cu" => "Cuba",
"cv" => "Cap Vert",
"cx" => "Christmas (�le)",
"cy" => "Chypre",
"cz" => "Tch�quie",
"de" => "Allemagne",
"dj" => "Djibouti",
"dk" => "Danemark",
"dm" => "Dominique",
"do" => "R�p Dominicaine",
"dz" => "Alg�rie",
"ec" => "Equateur",
"ee" => "Estonie",
"eg" => "Egypte",
"er" => "Erythr�e",
"es" => "Espagne",
"et" => "Ethiopie",
"fi" => "Finlande",
"fj" => "Fidji",
"fk" => "Malouines (�les)",
"fm" => "Micron�sie",
"fo" => "Faroe (�les)",
"fr" => "France",
"ga" => "Gabon",
"gb" => "Grande Bretagne",   
"gd" => "Grenade",
"ge" => "G�orgie",
"gf" => "Guyane Fran�aise",
"gh" => "Ghana",
"gi" => "Gibraltar",
"gl" => "Groenland",
"gm" => "Gambie",
"gn" => "Guin�e",
"gp" => "Guadeloupe",
"gq" => "Guin�e Equatoriale",
"gr" => "Gr�ce",
"gs" => "G�orgie du sud",
"gt" => "Guatemala",
"gu" => "Guam",
"gw" => "Guin�e-Bissau",
"gy" => "Guyana",
"hk" => "Hong Kong",
"hn" => "Honduras",
"hr" => "Croatie",
"ht" => "Haiti",
"hu" => "Hongrie",
"id" => "Indon�sie",
"ie" => "Irlande",
"il" => "Isra�l",
"in" => "Inde",
"io" => "Ter. Brit. Oc�an Indien",
"iq" => "Iraq",
"ir" => "Iran",
"is" => "Islande",
"it" => "Italie",
"jm" => "Jama�que",
"jo" => "Jordanie",
"jp" => "Japon",
"ke" => "Kenya",
"kg" => "Kirghizistan",
"kh" => "Cambodge",
"ki" => "Kiribati",
"km" => "Comores",
"kn" => "Saint Kitts et Nevis",
"kr" => "Cor�e du sud",
"kw" => "Kowe�t",
"ky" => "Ca�manes (�les)",
"kz" => "Kazakhstan",
"la" => "Laos",
"lb" => "Liban",
"lc" => "Sainte Lucie",
"li" => "Liechtenstein",
"lk" => "Sri Lanka",
"lr" => "Liberia",
"ls" => "Lesotho",
"lt" => "Lituanie",
"lu" => "Luxembourg",
"lv" => "Lettonie",
"ly" => "Libye",
"ma" => "Maroc",
"mc" => "Monaco",
"md" => "Moldavie",
"mg" => "Madagascar",
"mh" => "Marshall (�les)",
"mk" => "Mac�doine",
"ml" => "Mali",
"mm" => "Myanmar",
"mn" => "Mongolie",
"mo" => "Macao",
"mp" => "Mariannes du nord (�les)",
"mq" => "Martinique",
"mr" => "Mauritanie",
"mt" => "Malte",
"mu" => "Maurice (�le)",
"mv" => "Maldives",
"mw" => "Malawi",
"mx" => "Mexique",
"my" => "Malaisie",
"mz" => "Mozambique",
"na" => "Namibie",
"nc" => "Nouvelle Cal�donie",
"ne" => "Niger",
"nf" => "Norfolk (�le)",
"ng" => "Nig�ria",
"ni" => "Nicaragua",
"nl" => "Pays Bas",
"no" => "Norv�ge",
"np" => "N�pal",
"nr" => "Nauru",
"nu" => "Niue",
"nz" => "Nouvelle Z�lande",
"om" => "Oman",
"pa" => "Panama",
"pe" => "P�rou",
"pf" => "Polyn�sie Fran�aise",
"pg" => "Papouasie Nvelle Guin�e",
"ph" => "Philippines",
"pk" => "Pakistan",
"pl" => "Pologne",
"pr" => "Porto Rico",
"ps" => "Territoires Palestiniens",   
"pt" => "Portugal",
"pw" => "Palau",
"py" => "Paraguay",
"qa" => "Qatar",
"re" => "R�union (�le de la)",
"ro" => "Roumanie",
"ru" => "Russie",
"rs" => "Russie",
"rw" => "Rwanda",
"sa" => "Arabie Saoudite",
"sb" => "Salomon (�les)",
"sc" => "Seychelles",
"sd" => "Soudan",
"se" => "Su�de",
"sg" => "Singapour",
"sh" => "St. H�l�ne",
"si" => "Slov�nie",
"sj" => "Svalbard/Jan Mayen (�les)",
"sk" => "Slovaquie",
"sl" => "Sierra Leone",
"sm" => "Saint-Marin",
"sn" => "S�n�gal",
"so" => "Somalie",
"sr" => "Suriname",
"st" => "Sao Tome et Principe",
"sv" => "Salvador",
"sy" => "Syrie",
"sz" => "Swaziland",
"td" => "Tchad",
"tf" => "Territoires Fr du sud",
"tg" => "Togo",
"th" => "Thailande",
"tj" => "Tadjikistan",
"tk" => "Tokelau",
"tl" => "Timor Leste",   
"tm" => "Turkm�nistan",
"tn" => "Tunisie",
"to" => "Tonga",
"tr" => "Turquie",
"tt" => "Trinit� et Tobago",
"tv" => "Tuvalu",
"tw" => "Taiwan",
"tz" => "Tanzanie",
"ua" => "Ukraine",
"ug" => "Ouganda",
"us" => "�tats-Unis",
"uy" => "Uruguay",
"uz" => "Ouzb�kistan",
"va" => "Vatican",
"vc" => "St Vincent et les Grenadines",
"ve" => "Venezuela",
"vg" => "Vierges Brit. (�les)",
"vi" => "Vierges USA (�les)",
"vn" => "Vi�t Nam",
"vu" => "Vanuatu",
"ws" => "Western Samoa",
"ye" => "Yemen",
"yt" => "Mayotte",
"za" => "Afrique du Sud",
"zm" => "Zambie",
"zw" => "Zimbabwe",
"xx" => "Inconnu",
"a2" => "Inconnu",
"eu" => "Union Europ�enne",  
);
?>