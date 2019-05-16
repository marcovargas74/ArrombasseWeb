=== Shorten2List ===
Contributors: ipublicis
Donate link: http://smsh.me/7kit
Tags: maillists, ping, bit.ly, tr.im, su.pr, yourls, sm00sh
Requires at least: 2.8
Tested up to: 2.9.2
Stable tag: 1.0

Sends <strong>status</strong> updates to selected maillists everytime you publish a post, using your own domain or others for shortened permalinks.

== Description ==

Sends <strong>status</strong> updates to to selected maillists everytime you publish a post. Using <a href="http://bit.ly">Bit.ly</a>, <a href="http://tr.im">Tr.im</a>, <a href="http://yourls.org">YOURLS</a>, <a href="http://su.pr">Su.pr</a>, <a href="http://smsh.me">sm00sh</a> or even your own domain for shortened permalinks (accounts on some of these services required). So this way you can send blog updates with short excerpts to many maillists at once.

If you find it useful, please consider to make a <a href="http://smsh.me/7kit">donation</a> to Shorten2List's author (any amount will be appreciated).

More info:

* Check out the other [Wordpress plugins](http://wordpress.org/extend/plugins/profile/ipublicis) by the same author.
* Also at [iPublicis4Wordpress](http://box.net/iPublicis4Wordpress).

= Features =

* <strong>Avoids to send again when editing</strong> previously sent post or even when editing an old post not sent before.
* Option to choose each authors lists for new post notifications.
* Option to choose between <strong>Bit.ly, Tr.im, YOURLS, Su.pr, Sm00sh or even you own domain</strong> for shortened permalinks.
* Option to turn off notification or shortener service. Now <strong>you can use Shorten2List only for notification</strong> if your domain is already short enough for you, <strong>or use only to get shortened urls for your posts.</strong>
* <strong>Stores created shortened permalink</strong> in a post meta field (used for template integration). Share this with Shorten2Ping so no duplicate shortening.
* <strong>Using <code>rel="shorturl"</code></strong> as proposed at http://wiki.snaplog.com/short_url, creating auto-discovery link tag for short url on single post page header.
* You can use a <strong>template tag for showing visitors the short URL</strong> (using the same rel attribute as above for the shortened permalink).
* <strong>Locale support</strong>. Now available in English and Portuguese. See translation section for more info.
* <strong>Simple</strong>, fast, and useful :)

= Requirements =

* PHP 5.x with CURL and JSON enabled (maybe works too in PHP4, but not tested and not supported by me).
* PHP Mail (it uses just the common mail functions Wordpress already uses).
* WordPress 2.8.x or higher (maybe would work on older WP, but not tested and not supported by me).
* Required your own account for the third party services that you want to use.
* Not tested and not supported on IIS servers.

= Translations =

If you want to make a translation for your language, use the Shorten2List.pot included and (if you want) send me the files to dev@ipublicis.com for including it into the plugin package, you'll be credited, of course (NOTE: No sponsored translations allowed).

Credits for present translations:

* Portuguese translation made by myself :) 
    	
== Installation ==

* Extract the zip file and just drop the contents in the <code>wp-content/plugins/</code> directory of your WordPress installation (or install it directly from your dashboard) and then activate the Plugin from Plugins page.
* After that go to options page 'Shorten2List' and fill the required information for your accounts, and customize the message template if you want.
* Now you're ready, the plugin will notify Ping.fm or Twitter (at your choice) everytime you publish a new post (and Ping.fm will do the same to every site that you configured there, if you use this service).
  
== Frequently Asked Questions ==

= Will this plugin works in WordPress older than 2.7.x? =

Maybe, but use it at your own risk. I'll not support anyone using outdated WP (or outdated PHP). At the moment of writing this I&#8217;m running this plugin on <strong>WordPress 2.9 and PHP 5.x</strong> and works fine, and was running without problems on <strong>WP 2.8.x and 2.7.x</strong> too. If you run anything below <strong>WP 2.7 and PHP 5.x</strong>, please update for your own good! (and dont ask me for support).

= Why you did this plugin? =

I wanted a <strong>(single) simple</strong> plugin to notify my the maillists we subscribe about our new posts.

= Are you planning to add more features? =

At first only a few little improvements maybe. But if someone suggest a nice feature, and if I have time enough maybe I'll add it.
But it's not my priority. I want to keep it simple.

= I want to show the short permalink to my visitors. How can I do this? =

Simply put <code><?php short_permalink(); ?></code> in your theme where you want to show short permalink. You can add the parameter 'linktext', <code><?php short_permalink('linktext'); ?></code> and it will use the short permalink as text for the link too. Or if you have advanced knowledge of WordPress
theme coding, you can get the <code>'short_url'</code> post meta directly and showing it as you like.

== Changelog ==

= 1.0 =

* Initial release.

Originally based on Shorten2Ping 1.3 by Samuel Aguilera.

Bit.ly function by David Walsh & Jason Lengstorf.
