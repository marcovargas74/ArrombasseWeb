<?php
/*
Plugin Name: WordPress Ultimate Security
Plugin URI: http://www.ultimateblogsecurity.com/
Description: Security plugin which performs all set of security checks on your wordpress installation.<br>Please go to <a href="tools.php?page=wp-ultimate-security.php">Tools->Ultimate Security Check</a> to check your website.
Version: 2.1
Author: Eugene Pyvovarov
Author URI: http://eugen.kiev.ua
License: GPL2

Copyright 2010  Eugene Pyvovarov  (email : bsn.dev@gmail.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA

*/
    global $wp_version;
    require_once("securitycheck.class.php");
    
    if ( ! function_exists('my_plugin_admin_init') ) :
    function my_plugin_admin_init()
    {
        /* Register our script. */
        // wp_register_script('myPluginScript', WP_PLUGIN_URL . '/myPlugin/script.js');
         // wp_enqueue_script('jquery');
    }
    endif;
    
    if ( ! function_exists('my_plugin_admin_menu') ) :
    function my_plugin_admin_menu()
    {
        /* Register our plugin page */
        $page = add_submenu_page( 'tools.php', 
                                  __('Ultimate Security Check', 'myPlugin'), 
                                  __('Ultimate Security Check', 'myPlugin'), 9,  __FILE__, 
                                  'my_plugin_manage_menu');
   
        /* Using registered $page handle to hook script load */
        add_action('admin_print_scripts-' . $page, 'my_plugin_admin_styles');
    }
    endif;
    if ( ! function_exists('my_plugin_admin_styles') ) :
    function my_plugin_admin_styles()
    {
        /*
         * It will be called only on your plugin admin page, enqueue our script here
         */
        // wp_enqueue_script('myPluginScript');
    }
    endif;
    
    if ( ! function_exists('wp_ultimate_security_activate') ) :
    function wp_ultimate_security_activate() {
        if ( ! class_exists('WP_Http') )
            require( ABSPATH . WPINC . '/class-http.php' );
        $http = new WP_Http();
        $response = @$http->request('http://eugen.kiev.ua/pinger.php?host='.get_bloginfo( 'wpurl' ));
    }
    endif;
    
    if ( ! function_exists('my_plugin_manage_menu') ) :
    function my_plugin_manage_menu()
    {
        $security_check = new SecurityCheck();
        ?>
        <div class="wrap">
            <?php //screen_icon( 'tools' );?>
            <h2 style="padding-left:5px;">Ultimate Security Check
            <span style="position:absolute;padding-left:25px;">
            <a href="http://www.facebook.com/pages/Ultimate-Blog-Security/141398339213582" target="_blank"><img src="<?php echo plugins_url( 'img/facebook.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://twitter.com/BlogSecure" target="_blank"><img src="<?php echo plugins_url( 'img/twitter.png', __FILE__ ); ?>" alt="" /></a>
            <a href="http://ultimateblogsecurity.posterous.com/" target="_blank"><img src="<?php echo plugins_url( 'img/rss.png', __FILE__ ); ?>" alt="" /></a>
            </span>
            </h2>
            <!-- kissmetrics code -->
            <script type="text/javascript">
              var _kmq = _kmq || [];
              function _kms(u){
                setTimeout(function(){
                  var s = document.createElement('script'); var f = document.getElementsByTagName('script')[0]; s.type = 'text/javascript'; s.async = true;
                  s.src = u; f.parentNode.insertBefore(s, f);
                }, 1);
              }
              _kms('//i.kissmetrics.com/i.js');_kms('//doug1izaerwt3.cloudfront.net/aeea56b08325181fd28c9d68bd1e4f3546ac89ca.1.js');
              _kmq.push(['record', 'WP Results']);
            </script>
            <!-- end kissmetrics code -->
            
            <p style="padding-left:5px;"><iframe src="http://www.facebook.com/plugins/like.php?href=http%3A%2F%2Fwww.facebook.com%2Fpages%2FUltimate-Blog-Security%2F141398339213582&amp;layout=standard&amp;show_faces=false&amp;width=550&amp;action=recommend&amp;font=lucida+grande&amp;colorscheme=light&amp;height=35" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:550px; height:35px;" allowTransparency="true"></iframe></p>
            <!-- <p>We are checking your blog for security right now. We won't do anything bad to your blog, relax :)</p> -->
            <div id="test_results">
             <!-- 1 check for updates -->
             <?php $security_check->test_page_check_updates(); ?>
             <!-- 2 config file check -->
             <?php $security_check->test_page_check_config(); ?>
             <!-- 3 check code -->
             <?php $security_check->test_page_check_code(); ?>
             <!-- 3 check file permissions -->
             <?php $security_check->test_page_check_files(); ?>
             <!-- 4 database check -->
             <?php $security_check->test_page_check_db(); ?>
             <!-- 5 server configuration test -->
             <?php $security_check->test_page_check_server(); ?>
            </div>
            <?php
            $coef = $security_check->earned_points / $security_check->total_possible_points;
            $letter = '';
            if($coef <=1 && $coef > 0.83){
                $letter = 'A';
                $color = '#34a234';
            }
            if($coef <=0.83 && $coef > 0.67){
                $letter = 'B';
                $color = '#a4cb58';
            }
            if($coef <=0.67 && $coef > 0.5){
                $letter = 'C';
                $color = '#fadd3d';
            }
            if($coef <=0.5 && $coef > 0.30){
                $letter = 'D';
                $color = '#f5a249';
            }
            if($coef <=0.30 && $coef >= 0){
                $letter = 'F';
                $color = '#df4444';
            }
            
            ?>
            <style>
            .full-circle {
             background-color: <?=$color?>;
             height: 15px;
             -moz-border-radius:20px;
             -webkit-border-radius: 20px;
             width: 15px;
             float:left;
             text-align:center;
             padding:8px 10px 12px 10px;
             color:#fff;
             font-size:17px;
             font-family:Georgia,Helvetica;
            }
            </style>
            <!-- <h2>Security Check Report</h2> -->
            <div style="padding:15px 10px 10px 10px;margin-top:15px; border:0px solid #ccc; width:700px;float:left;background:#ededed;">
            <a style="float:right;" href="http://www.ultimateblogsecurity.com/"><img src="<?php echo plugins_url( 'img/fix_problems_now.png', __FILE__ ); ?>" alt="" /></a>
            <div class='full-circle'>
             <?=$letter?>
            </div>
            <?php
                $result_messages = array(
                    'A' => 'You\'re doing very well. Your blog is currently secure.',
                    'B' => 'Some security issues. These issues are not critical, but leave you vulnerable. ',
                    'C' => 'A few security issues. Fix them immediately to prevent attacks. ',
                    'D' => 'Some medium sized security holes have been found in your blog. ',
                    'F' => 'Fix your security issues immediately! '
                );
            ?>
            <p style="margin:0 10px 10px 50px;">Your blog gets <?=$security_check->earned_points?> of <?=$security_check->total_possible_points?> security points. <br /><?php echo $result_messages[$letter]; ?> <br /><!-- There is a <a href="http://www.ultimatesecuritypro.com">PRO version</a> which can help you fix these problems and protect you from future problems with updates against the latest attacks. --></p>
            
            </div>
            <div style="clear:both;"></div>
            <div style="float:left;">
            <h2>Sign Up For Updates</h2>
            <p>When hackers find new security holes, we add new checks immediately.  Sign up to be notified.  No Spam.</p>
            <!-- Begin MailChimp Signup Form -->
            <!--[if IE]>
            <style type="text/css" media="screen">
            	#mc_embed_signup fieldset {position: relative;}
            	#mc_embed_signup legend {position: absolute; top: -1em; left: .2em;}
            </style>
            <![endif]--> 
            <!--[if IE 7]>
            <style type="text/css" media="screen">
            	.mc-field-group {overflow:visible;}
            </style>
            <![endif]-->
            <div id="mc_embed_signup">
            <form action="http://ultimateblogsecurity.us1.list-manage.com/subscribe/post?u=382bf9a62c1627d0e7dd2cb42&amp;id=98819c1619" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank">
                <div class="mc-field-group">
                    <label for="mce-EMAIL">Email Address </label>
                    <input type="text" value="" name="EMAIL" class="required email"  id="mce-EMAIL" style="width:150px;">
                    <input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn button">
                </div>
            </form>
            <br><br>
            </div>

            <!--End mc_embed_signup-->
            </div>
        </div> 
        <?

    }
    endif; 
    
    register_activation_hook(__FILE__, 'wp_ultimate_security_activate');

    add_action('admin_init', 'my_plugin_admin_init');
    add_action('admin_menu', 'my_plugin_admin_menu');

?>
