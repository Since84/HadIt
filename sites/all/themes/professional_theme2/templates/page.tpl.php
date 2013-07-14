<?php
/**
 * @file
 * Default theme implementation to display a single Drupal page.
 *
 * Available variables:
 *
 * General utility variables:
 * - $base_path: The base URL path of the Drupal installation. At the very
 *   least, this will always default to /.
 * - $directory: The directory the template is located in, e.g. modules/system
 *   or themes/garland.
 * - $is_front: TRUE if the current page is the front page.
 * - $logged_in: TRUE if the user is registered and signed in.
 * - $is_admin: TRUE if the user has permission to main-menu administration pages.
 *
 * Site identity:
 * - $front_page: The URL of the front page. Use this instead of $base_path,
 *   when linking to the front page. This includes the language domain or
 *   prefix.
 * - $logo: The path to the logo image, as defined in theme configuration.
 * - $site_name: The name of the site, empty when display has been disabled
 *   in theme settings.
 * - $site_slogan: The slogan of the site, empty when display has been disabled
 *   in theme settings.
 *
 * Navigation:
 * - $main_menu (array): An array containing the Main menu links for the
 *   site, if they have been configured.
 * - $secondary_menu (array): An array containing the Secondary menu links for
 *   the site, if they have been configured.
 * - $breadcrumb: The breadcrumb trail for the current page.
 *
 * Page content (in order of occurrence in the default page.tpl.php):
 * - $title_prefix (array): An array containing additional output populated by
 *   modules, intended to be displayed in front of the main title tag that
 *   appears in the template.
 * - $title: The page title, for use in the actual HTML content.
 * - $title_suffix (array): An array containing additional output populated by
 *   modules, intended to be displayed after the main title tag that appears in
 *   the template.
 * - $messages: HTML for status and error messages. Should be displayed
 *   prominently.
 * - $tabs (array): Tabs linking to any sub-pages beneath the current page
 *   (e.g., the view and edit tabs when displaying a node).
 * - $action_links (array): Actions local to the page, such as 'Add menu' on the
 *   menu administration interface.
 * - $feed_icons: A string of all feed icons for the current page.
 * - $node: The node object, if there is an automatically-loaded node
 *   associated with the page, and the node ID is the second argument
 *   in the page's path (e.g. node/12345 and node/12345/revisions, but not
 *   comment/reply/12345).
 *
 * Regions:
 * - $page['help']: Dynamic help text, mostly for admin pages.
 * - $page['content']: The main content of the current page.
 * - $page['sidebar_first']: Items for the first sidebar.
 * - $page['sidebar_second']: Items for the second sidebar.
 * - $page['header']: Items for the header region.
 * - $page['footer']: Items for the footer region.
 *
 * @see template_preprocess()
 * @see template_preprocess_page()
 * @see template_process()
 */
?>

<div id="wrapper">
  <div class="google-search-header"></div>
  <div class="header-wrap">
    <header id="header" role="banner">
    <div class="header" role="banner">  
    	<!--
  <div class="title">
  	    <h1 id="site-title"><a href="<?php print $front_page; ?>" title="<?php print t('Home'); ?>"><?php print $site_name; ?></a></h1>
  	    <div id="site-description"><?php print $site_slogan; ?></div>
    	</div>
  -->
      <div class="header-image">
  <!--     	js header goes here -->
      <img id="logo" src="/sites/all/themes/professional_theme2/images/logo/haditlogo2007_dark.png" />
      <span class='hadit-quote'>
        "Leave No One Behind </br>
            Not on a Jungle Trail </br>
        Not on a Desert Trail </br>
            Not on a Paper Trail"  </br>
        <span class="tbird-left">- TBird</span>
      </span>
      <img class="soldier-img" src="/sites/all/themes/professional_theme2/images/banner_02.png" />
      </div>
      <div class="clear"></div>
    </div>
    <nav id="menu-top-nav">
        <div class="menu-navigation-container">
      <?php 
        if (module_exists('i18n_menu')) {
          $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'top-nav'));
        } else {
          $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'top-nav'));
        }
        /* Disable Main menu if unchecked */
        if ($main_menu == TRUE):
          print drupal_render($main_menu_tree);
        endif;
        ?>
      </div>
    </nav>
    <nav id="main-menu"  role="navigation">
      <a class="nav-toggle" href="#"><?php print t("Navigation"); ?></a>
      <div class="menu-navigation-container">
      <?php 
      if (module_exists('i18n_menu')) {
        $main_menu_tree = i18n_menu_translated_tree(variable_get('menu_main_links_source', 'main-menu'));
      } else {
        $main_menu_tree = menu_tree(variable_get('menu_main_links_source', 'main-menu'));
      }
      /* Disable Main menu if unchecked */
      if ($main_menu == TRUE):
        print drupal_render($main_menu_tree);
      endif;
      ?>
      </div>
      <div class="clear"></div>
    </nav><!-- end main-menu -->
    </header>
  </div>
  
  <div id="container">
  <div class="google-ad">
      <script type="text/javascript">
        google_ad_client = "pub-7326217334650925";
        /* 728x90 VABenefitsBannerWhite */
        google_ad_slot = "4810407252";
        google_ad_width = 728;
        google_ad_height = 90;
      </script>
        <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
  
   <?php if ($page['header']): ?>
   <div id="head">
    <?php print render($page['header']); ?>
   </div>
   <div class="clear"></div>
   <?php endif; ?>

    <div class="content-wrap">

      <?php if ($page['sidebar_first']): ?>
        <div id="sidebar-first" class="sidebar" role="complementary">
          <?php print render($page['sidebar_first']); ?>
        </div>  <!-- /#sidebar-first -->
      <?php endif; ?>

      <div id="content" class="page-content">
        <?php if (theme_get_setting('breadcrumbs', 'professional_theme')): ?><div id="breadcrumbs"><?php if ($breadcrumb): print $breadcrumb; endif;?></div><?php endif; ?>
        <section id="post-content" role="main">
          <?php print $messages; ?>
          <?php if ($page['content_top']): ?><div id="content_top"><?php print render($page['content_top']); ?></div><?php endif; ?>
          <?php print render($title_prefix); ?>
          <?php if ($title): ?><h1 class="page-title"><?php print $title; ?></h1><?php endif; ?>
          <?php print render($title_suffix); ?>
          <?php if (!empty($tabs['#primary'])): ?><div class="tabs-wrapper"><?php print render($tabs); ?></div><?php endif; ?>
          <?php print render($page['help']); ?>
          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
          <?php print render($page['content']); ?>
        </section> <!-- /#main -->
      </div>
  


    <?php if ($page['sidebar_second']): ?>
      <div id="sidebar-second" class="sidebar" role="complementary">
        <?php print render($page['sidebar_second']); ?>
      </div>  <!-- /#sidebar-first -->
    <?php endif; ?>

    </div>
  
  <div class="clear"></div>
   
  </div> 
<div class="footer">
    <div class="google-ad">
      <script type="text/javascript">
        google_ad_client = "pub-7326217334650925";
        /* 728x90 VABenefitsBannerWhite */
        google_ad_slot = "4904903389";
        google_ad_width = 728;
        google_ad_height = 90;
      </script>
        <script type="text/javascript"
    src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
    </div>
</div>  
<script type="text/javascript"
src="http://pagead2.googlesyndication.com/pagead/show_ads.js"></script>
   
  </div>
  <script src="/Scripts/swfobject_modified.js" type="text/javascript"></script>


<!-- 
<script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-905059-1']);
  _gaq.push(['_setDomainName', 'hadit.com']);
  _gaq.push(['_setAllowLinker', true]);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'stats.g.doubleclick.net/dc.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
-->
