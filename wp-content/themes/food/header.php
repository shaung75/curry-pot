<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
      <head profile="http://gmpg.org/xfn/11">

      <title><?php bloginfo('name'); ?><?php wp_title(); ?></title>

      <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />	
      <meta name="generator" content="WordPress <?php bloginfo('version'); ?>" /> <!-- leave this for stats please -->

      <!--[if IE 6]><link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/elements/css/ie6.css" /><![endif]--> 
      <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" type="text/css" media="screen" />
      
      <link rel="alternate" type="application/rss+xml" title="RSS 2.0" href="<?php bloginfo('rss2_url'); ?>" />
      <link rel="alternate" type="text/xml" title="RSS .92" href="<?php bloginfo('rss_url'); ?>" />
      <link rel="alternate" type="application/atom+xml" title="Atom 0.3" href="<?php bloginfo('atom_url'); ?>" />
      <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
      
      <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
      <script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/elements/js/custom.js"></script> 
      
      <?php wp_get_archives('type=monthly&format=link'); ?>
      <?php //comments_popup_script(); // off by default ?>
      <?php wp_head(); ?>
      
</head>

<body>

<div id="top-bg"></div>

<div id="wrapper-outer" class="clearfix">

      <div id="pans"></div>
      <div class="png"><div id="tea-towel"></div></div>

      <!-- Wrapper Inner -->
      <div id="wrapper-inner" class="clearfix">
      
            <div id="top-nav">
                  <ul class="clearfix">
                        <li><a href="<?php bloginfo('home'); ?>">Home</a></li>
                        <?php wp_list_pages('title_li='); ?>
                        <li><a href="<?php bloginfo('home'); ?>/blog">Blog</a></li>
                  </ul>
            </div>
            
            <div id="header">
                  <h1><a href="<?php bloginfo('url'); ?>"><?php bloginfo('name'); ?></a></h1>
            </div>
            
            <div id="search">
                  <form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
                        <input type="text" value="" name="s" id="s" size="15" />
                        <input type="submit" id="searchsubmit" value="" />
                  </form>
            </div>