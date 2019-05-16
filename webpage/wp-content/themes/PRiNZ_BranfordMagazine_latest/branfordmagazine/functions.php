<?php
// Prepare for localization
load_theme_textdomain ('branfordmagazine');


//Widgetized sidebar
if ( function_exists('register_sidebar') )
register_sidebar(array('name'=>'Regular Sidebar',
'before_widget' => '<div class="sidebar_widget">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
register_sidebar(array('name'=>'Featured Page Textwidgets',
'before_widget' => '<div class="sidebar_widget">',
'after_widget' => '</div>',
'before_title' => '<h3>',
'after_title' => '</h3>',
));
?>