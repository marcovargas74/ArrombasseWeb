<?php
//----------------------------------------------------------------------
// CrawlTrack 2.3.0
//----------------------------------------------------------------------
// Crawler Tracker // Bot takip sayaci
//----------------------------------------------------------------------
// Kodlayan: Jean-Denis Brun
//----------------------------------------------------------------------
// Website: www.crawltrack.fr
//----------------------------------------------------------------------
// Bu script GNU GPL lisansiyla korunmaktadir
//----------------------------------------------------------------------
// Dosya: turkish.php
//----------------------------------------------------------------------
// Translator : Erhan HARMANKAYA 
//----------------------------------------------------------------------
//installation
$language['install']="Kurulum";
$language['welcome_install'] ="CrawlTrack'a Hosgeldiz! Kurulum basit 3 asamada tamamlanacaktir.";
$language['menu_install_1']="1) Veritabani bilgileri.";
$language['menu_install_2']="2) Site ayarlamalari.";
$language['menu_install_3']="3) Yönetici hesabi ayarlari.";
$language['go_install']="Kur";
$language['step1_install'] ="Lütfen veritabani bilgilerini giriniz. Forum gönderildiginde veritabanina baglanilmis ve tüm tablolar yaratilmis olacaktir.";
$language['step1_install_login_mysql']=" MySQL Kullanici Adi";
$language['step1_install_password_mysql']="MySQL Sifre";
$language['step1_install_host_mysql']="MySQL Host";
$language['step1_install_database_mysql']="MySQL Adi";
$language['step1_install_ok'] ="Baglanma tamamlandi.";
$language['step1_install_ok2'] ="Tablo olusumlari tamamlandi.";
$language['step1_install_no_ok'] ="Bilgilerinizde bir eksiklik var lütfen forum bilgilerini kontrol ediniz.";
$language['step1_install_no_ok2'] ="Dosya olusumu basarizi!, Klasöre CHMOD 777 verdiginizden emin olun.";
$language['step1_install_no_ok3'] ="Tablo olusumu sirasinda hata olustu lütfen tekrar deneyin.";
$language['back_to_form'] ="GERI DÖN";
$language['retry'] ="Tekrar dene";
$language['step2_install_no_ok']="Veritabanina baglanilamadi lütfen bilgilerinizi kontrol ediniz.";
$language['step3_install_no_ok']="Veritabani Seçilemedi. Baglantilari kontrol edin.";
$language['step4_install']="Git";
//site creation
//modified in 1.5.0
$language['set_up_site']="Lütfen asagiya web sayfasi adresini ve ismini giriniz. Adres örnegi: www.example.com (basinda http:// kullanmayin- sonunda / kullanmayin)."; 
$language['site_name']="Site Ismi:";
$language['site_no_ok']="Bir websitesi ismi girmek zorundasiniz.";
$language['site_ok']="Site veritabanina kaydedildi.";
$language['new_site']="Yeni site ekle";
//tag creation
$language['tag']="Sayfaniza eklemeniz gereken kod";
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
$language['site_name2']="Site Adresi";
//modified in 1.5.0
$language['local_tag']="CrawlTrack ile kod eklenecek site ayni serverda ise eklenmesi gereken kod.";
$language['non_local_tag']="CrawlTrack ve site ayni serverda degilse lütfen bu kodu kullanin aksi halinde kod çalismayacaktir.";
//login set_up
$language['admin_creation']="Yönetici Hesabi Ayarlari";
$language['admin_setup']="Lütfen Yönetici giris kullanici adi ve sifrenizi giriniz.";
$language['user_creation']="Kullanici hesabi ayarlari";
$language['user_setup']="Lütfen kullanici adi ve parolasi girin.";
$language['user_site_creation']="Kullanici websitesi ayarlari";
$language['user_site_setup']="Lütfen kullanici sitesi girisi ve parolasi belirleyin.";
$language['admin_rights']="Yönetici bütün websitelerine girebilir";
$language['login']="K.Adi";
$language['password']="Sifre";
$language['valid_password']="Sifreyi tekrar giriniz.";
$language['login_no_ok']="Kullanicii sifreleri uyusmuyor lütfen tekrar deneyin.";
$language['login_ok']="Hesap kaydedildi.";
$language['login_no_ok2']="Bir hata olustu tekrar deneyin.";
$language['login_user']="Kullanici Hesabi olustur";
$language['login_user_what']="Kullanici bütün site istatistiklerine erisebilir";
$language['login_user_site']="Kullanici hesabi olustur";
$language['login_user_site_what']="Kullanici sitesi bir istatistik görebilir";
//modified in 1.5.0
$language['login_finish']="Kurulum basariyla tamamlandi.Scriptin çalismasi için gerekli kodlari lütfen sitenize yerlestiriniz.";
//access
$language['restrited_access']="Parola Korumasi.";
$language['enter_login']="Lütfen kullanici adi ve parolanizi giriniz.";
//display
$language['crawler_name']="Botlar";
$language['nbr_visits']="Ziyaret";
$language['nbr_pages']="Sayfa";
$language['date_visits']="Son giris";
$language['display_period']="Çalisma periyodu :";
$language['today']="Gün";
$language['days']="Hafta";
//modified in 1.5.0
$language['month']="Ay";
$language['one_year']="Yil";
$language['no_visit']="Ziyaret bulunmamaktadir.";
$language['page']="Sayfa";
//modified in 1.5.0
$language['admin']="Ayarlar";
$language['nbr_tot_visits']="Toplam ziyaret";
$language['nbr_tot_pages']="Toplam ziyaret edilen sayfalar";
$language['nbr_tot_crawlers']="Bot sayisi";
$language['visit_per-crawler']="Ziyaret Bilgileri";
$language['100_visit_per-crawler']="Ziyaret bilgileri (%d satir gösteriliyor).";
$language['user_agent']="Ajan";
$language['Origin']="Kullanici";
$language['help']="Yardim";
//search
$language['search']="Arama";
$language['search2']="Arama";
$language['search_crawler']=" Bot";
$language['search_user_agent']="Ajan";
$language['search_page']=" sayfa";
$language['search_user']="bot kullanicisi";
$language['go_search']="Arama";
$language['result_crawler']="Baktiginiz Botlar.";
$language['result_ua']="Bakmis oldugunuz ajanlar.";
$language['result_page']="Bakmis oldugunuz sayfalar.";
$language['result_user']="Baktiginiz Botlar.";
$language['result_user_crawler']="Kullaniciya ait Botlar.";
$language['result_user_1']="Kullanici:&nbsp;";
$language['result_crawler_1']="Arama kelimesi:&nbsp;";
$language['no_answer']="Yanit yok!.";
$language['to_many_answer']="100 den fazla sonuç (100 satir gösteriliyor).";
//admin
$language['user_create']="Yeni hesap olustur.";
$language['user_site_create']="Yeni kullanici-sitesi hesabi olustur.";
$language['new_site']="Site ekle.";
$language['see_tag']="Eklenmesi gerekn Kodlari göster.";
$language['new_crawler']="Yeni Crawler ekle";
$language['crawler_creation']="Lütfen formu doldurun."; 
$language['crawler_name2']="Bot ismi:";
$language['crawler_user_agent']="Ajan:";
$language['crawler_user']="Bot Kullanici:";
$language['crawler_url']="Kullanici Adresi (örnek: http://www.example.com)";
$language['crawler_url2']="Kullanici Adresi:";
$language['crawler_ip']="IP:";
$language['crawler_no_ok']="Lütfen formu doldurun.";
$language['exist']="Bot zaten veritabaninda mevcut!";
$language['exist_data']="Veritabaniyla eslesen bilgiler:";
$language['crawler_no_ok2']="Bot olusturma esnasinda hata olustu. Tekrar deneyin!.";
$language['crawler_ok']="Bot eklendi.";
$language['user_suppress']="Kullanici veya Kullanici-sitesi Iptal et.";
$language['user_list']="Kullanici veya Kullanici-Sitesi listesi";
$language['suppress_user']="Hesabi iptal et";
$language['user_suppress_validation']="Bu hesabi iptal etmek istediginize eminmisiniz";
$language['yes']="Evet";
$language['no']="Hayir";
$language['user_suppress_ok']="Hesap silindi.";
$language['user_suppress_no_ok']="Hata olustu tekrar deneyin.";
$language['site_suppress']="Site Sil.";
$language['site_list']="Site Listesi";
$language['suppress_site']="Site sil";
$language['site_suppress_validation']="Bu websitesini silmek istediginize eminmisiniz?";
$language['site_suppress_ok']="site silindi.";
$language['site_suppress_no_ok']="Hata olustu tekrar deneyin.";
$language['crawler_suppress']="Bot Sil.";
$language['crawler_list']="Bot listesi";
$language['suppress_crawler']="Botu sil";
$language['crawler_suppress_validation']="Bu botu silmek istediginize eminmisiniz?";
$language['crawler_suppress_ok']="Bot silindi.";
$language['crawler_suppress_no_ok']="Hata olustu tekrar deneyin.";
$language['crawler_test_creation']="Test botu olustur.";
$language['crawler_test_suppress']="Test botunu devre disi birak.";
$language['crawler_test_text']="Test botunu olusturduktan sonra kendi sitenizin bir kaç sayfasini zaiyaret ediniz.Sitenize sanki bot modunda giris yaptiginiz varsayilacaktir."; 
$language['crawler_test_text2']="Test boltunu olusturduysaniz artik sitenizi ziyaret edebilirsiniz. Ziyaret ettiginiz her sayfa CrawlTrack sayacinda görünecektir.Test isleminiz bittikten sonra TEST BOTUnu silmeyi unutmayin.";
$language['crawler_test_no_exist']="Bu bot kayitli degil.";
$language['exist_site']="Bu site önceden kayit edilmis";
$language['exist_login']="Bu kullanici adi önceden kullaniliyor";
//1.2.0
$language['update_title']="Bot listesi güncelle.";
$language['update_crawler']="Bot listesi güncelle.";
$language['list_up_to_date']="Güncellenmesi gereken bir liste bulunmamaktadir.";
$language['update_ok']="Güncelleme tamamlandi.";
$language['crawler_add']="botlar veritabanina yazildi";
$language['no_access']="Inetaraktif güncelleme suan kullanilamamktadir.<br><br>Güncellemeye devam etmek için, asagidaki linke tiklayin ve listeyi bilgisayariniza yükleyin, crawlerlist.php dosyasini include klasörüne yükledikten soran güncelleme islemini tekrar baslatin.";
$language['no_access2']="CrawTrack.info adresinde sorun çikti tekrar deneyin.";
$language['download_update']="Bot listesini yüklediyseniz güncellemek için tiklayin.";
$language['download']="Bot listesini yükle.";
$language['your_list']="Kullanciginiz liste:";
$language['crawltrack_list']="www.Crawltrack.fr adresindeki güncel bot listesi:";
$language['no_update']="Bot güncellemesini iptal et.";
$language['no_crawler_list']="Inculude kalsöründe herhangi bir crawlerlist.php dosyasi bulunamadi.";
//1.3.0
$language['use_user_agent']="Bot tanimlamasi Ajan veya IP tarafindan yapiliyor. Bu iki bilgiyi girmek zorundasiniz.";
$language['user_agent_or_ip']="Ajan adi veya IP";
$language['crawler_ip']="IP:";
$language['table_mod_ok']="Crawlt_crawler tablosu güncellendi.";
$language['files_mod_ok']="Configconnect.php ve crawltrack.php dosyalari güncellendi.";
$language['update_crawltrack_ok']="CrawlTrack güncellenmesi tamamlandi, suanki sürümünüz :";
$language['table_mod_no_ok']="Crawlt_crawler tablosu OLUSTURULAMADI.";
$language['files_mod_no_ok']="configconnect.php ve crawltrack.php güncellenmesinde sorun olustu.";
$language['update_crawltrack_no_ok']="CrawlTrack güncellenmesinde sorun olustu.";
$language['logo']="Logo Seçimi.";
$language['logo_choice']="CrawlTrack kodunu ekledikten sonra sitenizde görünecek kodu seçebilirsiniz. eger CrawlTrack logosunu görmek istemiyorsaniz, \"Logo yok\" Seçin.";
$language['no_logo']="Logo yok.";
//modified in 1.5.0
$language['data_suppress_ok']="Bilgiler arsivlendi.";
$language['data_suppress_no_ok']="Bilgi arsivlenmesinde hata olustu.";
$language['data_suppress_validation']="Bunlari arsivlemek istediginize eminmisiniz &nbsp;";
$language['data_suppress']="Ziyaret tablosundaki eski bilgileri arsivle.";
$language['data_suppress2']="Tümünü Arsivle";
$language['one_year_data']="bir seneden daha önceki bilgiler";
$language['six_months_data']="alti aydan daha eski bilgiler";
$language['one_month_data']="bir aydan daha eski bilgiler";
$language['oldest_data']="Su tarihten önceki bilgiler &nbsp;";
$language['no_data']="Ziyaret tablosunda bilgi bulunamadi!.";
//1.4.0
$language['time_set_up']="Zaman Farki";
$language['server_time']="Sunucu zamani =";
$language['local_time']="Yerel zaman=";
$language['time_difference']="Sunucu zamani ile yerel zaman arasindaki fark=";
$language['time_server']="Su anda sunucu zamanini kullaniyorsunuz. Zamanin bilgisayarinizin zamaniyla degistirilmesini istiyormusunuz?";
$language['time_local']="Su anda yerel zamani kullaniyorsunuz. Zamanin sunucu zamaniyla degistirilmesini istiyormusunuz?";
$language['decal_ok']="CrawlTrack, yerel zamani kullanacak; istediginiz zaman sunucu zamanina dönüs yapabilirsiniz";
$language['nodecal_ok']="CrawlTrack, sunucu zamanini kullanacak; istediginiz zaman yerel zaman ayarlarina geri dönebilirsiniz";
$language['need_javascript']="YLütfen JavaScript kullanimizi açik konuma getirin.";
//1.5.0 
$language['origin']="Kaynak";
$language['crawler_ip_used']="Kullanilan IP";
$language['crawler_country']="Ülke";
$language['other']="Diger";
$language['pc-page-view']="Ziyaret edilen kisim";
$language['pc-page-noview']="Ziyaret edilmeyen kisim";
$language['print']="Yazdir";
$language['ip_suppress_ok']="Ziyaretler basariyla silindi.";
$language['ip_suppress_no_ok']="Bir hata olustu!.";
$language['no_ip']="Bu periotta bir IP kayidi bulunamadi.";
$language['ip_suppress_validation']="Bu IP baska bir Bot tarafindan kullaniliyor, bu sebeple bir karisiklik olustu. Bu IP ile eslesen bilgileri temizlemek istiyormusunuz?";
$language['ip_suppress_validation2']="Bu IP den gelen bilgileri engellemek istiyormusunuz?";
$language['ip_suppress_validation3']="Eger bu IP nin sitenizi kullanmasini enellemek istiyorsaniz,  .htaccess dosyasina su kodlari ekleyip ana dizininize atiniz:";
$language['ip_suppress']="IP Yasakla";
$language['diff-day-before']="önceki güne oranla";
$language['daily-stats']="Günlük istatistik";
$language['top-crawler']="Aktif Botlar:";
$language['stat-access']="Istatislik detaylari";
$language['stat-crawltrack']="Bu bilgiler sunlarla eslesmektedir:";
$language['nbr-pages-top-crawler']="ziyaret";
$language['of-site']="";
$language['mail']="Günlük E-mail raporu yolla.";
$language['set_up_mail']="Lütfen adresinizi giriniz.";
$language['email-address']="Email adresi:";
$language['address_no_ok']="Girdiginiz adres geçerli degil.";
$language['set_up_mail2']="Günlük E-mail gönderimi aktf. Iptal etmek istiyormusunuz ?";
$language['update']="Düzenleme tamamlandi.";
$language['search_ip']="Ip adresi sayaci tut";
$language['ip']="IP adresi";
$language['maxmind']="Bu sayaç Maxmind tarafindan gelistirilen GeoLite veritabani kullanilarak hazirlanmistir ve su adreste mevcuttur :";
$language['ip_no_ok']="Girdiginiz IP adresi geçersiz.";
$language['public']="Istatistik girisindeki korumayi kaldir.";
$language['public-set-up2']="Su anda istatistiklere ulasmada herhangi bir engel bulunmamaktadir bunu degistirmek istermisiniz";
$language['public-set-up']="Su anda istatistiklerinizde Parola korumasi mevcut. Bunu kaldirmak istermisiniz";
$language['public2']="Sadece Ayarlar sayfasi korunacak";
$language['admin_protected']="Ayarlar sayfasina giris korunuyor.";
$language['no_data_to_suppress']="Bilgi bulunamadi.";
$language['data_suppress3']="Arsivlenen bilgiler veritabinda büyük yer kaplamaktadir, . Bu yüzden su an sadece özet bilgiler kullanilabilir durumda (BOT ARSIVI).
 Veri tabaninizin gereksiz bilgilerle isgal edilmeyecegini ve çalismasinda bir problem olusmayacagini düsünüyorsaniz bilgileri arsivleyebilirsiniz .";
$language['archive']="Arsiv";
$language['month2']="Ay";
$language['top_visits']="Ziyaretteki en iyi 3";
$language['top_pages']="Sayfalardaki en iyi 3";
$language['no-archive']="Arsiv yok.";
$language['use-archive']="Bir kisim bilgiler arsivlendi, sunlar tamamlanamadi.";
$language['url_update']="Site bilgileri güncelle";
$language['set_up_url']="Lütfen site adresini girin: www.example.com (Siteden önce http:// sonra ise / kullanmayin)."; 
$language['site_url']="Site adresi:";
//1.6.0
$language['page_cache']="Son hesaplama: ";
//1.7.0
$language['step1_install_no_ok4']="Bir hata olustu. Lütfen www.crawltrack.info destek forumunu ziyaret ediniz";
$language['show_all']="Bütün satirlari göster";
$language['from']="";
$language['to']="den";
$language['firstweekday-title']="Haftanin ilk günü?";
$language['firstweekday-set-up2']="Haftanin baslangiç günü Pazartesi seçili bunu Pazar olarak degistirmek istermisiniz";
$language['firstweekday-set-up']="Haftanin baslangiç günü Pazar seçili bunu Pazartesi olarak degistirmek istermisiniz?";
// modified in 2.0.0
$language['ask']="Ask";
$language['google']="Google";
$language['msn']="Live Search";
$language['yahoo']="Yahoo";
$language['delicious']="Del.icio.us";
$language['index']="Indexation";
$language['keyword']="Anahtar Kelime";
$language['entry-page']="Giris Sayfasi";
$language['searchengine']="Arama Motorlari";
$language['social-bookmark']="Sik Kullanilanlar";
$language['tag']="Etiketler";
$language['nbr_tot_bookmark']="Sik Kullanilanlar";
$language['nbr_tot_link']="Backlink";
$language['nbr_tot_pages_index']="Indexlenmis sayfalar";
$language['nbr_visits_crawler']="Ziyaret eden Bot sayisi";
$language['nbr_tot_visit_seo']="Ziyaretçi Gönderenler";
$language['100_lines']="%d satir gösteriliyor.";
$language['8days']="8 günden bu yana";
$language['close']="Kapat";
$language['date']="Tarih";
$language['modif_site']="Site veya Isim düzenlemesi.";
$language['site_url2']="Site adresi";
$language['modif_site2']="Bu bilgileri Düzenle.";
$language['no-info-day-before']="Önceki günden bilgi bulunmamaktadir";
$language['data_human_suppress_ok']="Bilgiler basariyla silindi.";
$language['data_human_suppress_no_ok']="Bir hata olustu tekrar deneyin.";
$language['data_human_suppress_validation']="Bunlari silmek istediginize eminmisiniz &nbsp;";
$language['data_human_suppress']="Kullanýcý ziyaret tablosundaki eski bilgileri sil( Anahtar kelime ve giriþ sayfalarý)";
$language['data_human_suppress2']="Hepsini sil";
$language['one_year_human_data']="bir yildan eski bilgiler";
$language['six_months_human_data']="alti aydan eski bilgiler";
$language['one_month_human_data']="bir aydan eski bilgiler";
$language['data_human_suppress3']="Arsivlenen bilgiler veritabinda büyük yer kaplamaktadir, . Bu yüzden su an sadece özet bilgiler kullanilabilir durumda (BOT ARSIVI).
 Veri tabaninizin gereksiz bilgilerle isgal edilmeyecegini ve çalismasinda bir problem olusmayacagini düsünüyorsaniz bilgileri arsivleyebilirsiniz  .";
$language['no_data_human_to_suppress']="Kisisel giris tablosunda bilgi bulunamadi.";
$language['choose_language']="Dil seçimini yapiniz.";
$language['01']="Ocak";
$language['02']="Subat";
$language['03']="Mart";
$language['04']="Nisan";
$language['05']="Mayis";
$language['06']="Haziran";
$language['07']="Temmuz";
$language['08']="Agustos";
$language['09']="Eylül";
$language['10']="Ekim";
$language['11']="Kasim";
$language['12']="Aralik";
$language['day0']="Pazartesi";
$language['day1']="Sali";
$language['day2']="Çarsamba";
$language['day3']="Persembe";
$language['day4']="Cuma";
$language['day5']="Cumartesi";
$language['day6']="Pazar";
//2.1.0
$language['since_beginning']="Her sey";
//2.2.0
$language['admin_database']="Veritabaný büyüklüðünü göster";
$language['table_name']="Tablo Adý";
$language['nbr_of_data']="Veri Sayýsý";
$language['table_size']="Tablo Büyüklüðü";
$language['database_size']="Veritabaný Büyüklüðü";
$language['total']="Toplam:";
$language['mailsubject']="CrawlTrack günlük özet";
$language['beginmonth']="Aybaþýndan bu yana";
$language['evolution']="Kıyaslamayı değiştir";
$language['lastthreemonths']="Son 3 ay";
$language['set_up_mail3']="Þu an kullanýlan adres:";
$language['set_up_mail4']="Adres ekle";
$language['set_up_mail5']="Adresi giriniz.";
$language['set_up_mail6']="Bir veya birden fazla adres sil";
$language['set_up_mail7']="Seçili adresi sil";
$language['chmod_no_ok']="Crawltrack.php dosyasý güncelleme iþlemi abþarýs oldu,Crawltrack klasörüne  CHMOD 777 verip lütfen güncelleme iþlemini yeniden baþlatýn.Güvenliðiniz açýsýndan güncelleme iþlemi bitiminde dosyalara tekrar 771 izinlerini atamayý unutmayýnýz.";
$language['display_parameters']="Görünüm özellikleri";
$language['ordertype']="Düzen:";
$language['orderbydate']="gün olarak";
$language['orderbypagesview']="gösterilen sayfa sayýsý olarak";
$language['orderbyvisites']="ziyaret olarak";
$language['orderbyname']="alfabetik olarak";
$language['numberrowdisplay']="Gösterilen satýr sayýsý:";
//2.2.1
$language['french']="Fransızca";
$language['english']="İngiliz";
$language['german']="Alman";
$language['spanish']="İspanyol";
$language['turkish']="Türkçe";
$language['dutch']="Hollandalı";
//2.3.0
$language['hacking']="Saldýrý";
$language['hacking2']="Saldýrý giriþimi";
$language['hacking3']="Code injection";
$language['hacking4']="SQL injection";
$language['no_hacking']="Herhangi bir tehtit yok";
$language['attack_detail']="Saldýrý detaylarý";
$language['attack']="Parameters used for code injection attempts";
$language['attack_sql']="Parameters used for sql injection attempts";
$language['bad_site']="File/script the hacker attempted to inject";
$language['bad_sql']="SQL query the hacker attempted to inject";
$language['bad_url']="Talep Adresi";
$language['hacker']="Saldýrgan";
$language['date_hacking']="Zaman";
$language['unknown']="Bilinmiyor";
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
    "tr" => "Türkiye",
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